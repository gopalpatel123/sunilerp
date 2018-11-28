<?php
namespace App\Controller\Api;
use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;
use Firebase\JWT\JWT;
use Cake\Validation\Validation;

/**
 * AppCustomers Controller
 *
 * @property \App\Model\Table\AppCustomersTable $AppCustomers
 *
 * @method \App\Model\Entity\AppCustomer[] paginate($object = null, array $settings = [])
 */
class AppCustomersController extends AppController
{
	
	 public function initialize()
    {
        parent::initialize();
       // $this->Auth->allow(['add']);
    }
	
	public function send_otp(){

		$mobile=@$this->request->query['mobile'];
		$opt=0;
		if(!empty($mobile)){
				
				$VerifyOtps = $this->AppCustomers->VerifyOtps->newEntity();
				$VerifyOtps->mobile=$mobile;
				$VerifyOtps->status=0;
				$opt=(mt_rand(1111,9999));
				$VerifyOtps->otp=$opt;
				if($this->AppCustomers->VerifyOtps->save($VerifyOtps)){
					  $content="Your otp is ".$opt;
					  $this->Sms->sendSms($mobile,$content);
					  $success = true;

					$message = 'send otp successfully';
				}else{
					$success = false;
					$message = 'otp is not send';

				}
			

		}else{

			$success = false;
		    $message = 'empty mobile no';
		}
		$this->set(['success' => $success,'otp'=>$opt,'message'=>$message,'_serialize' => ['success','otp','message']]);

	}
	
	
	
	 public function login()
		{
		  
			$success = true;
			$message = "User found successfully"; 
			
			$this->set(compact(['response','success','message']));
			$this->set('_serialize', ['success','message','response']);
		}
		
		
		public function signup(){
			
			 $appCustomer = $this->AppCustomers->newEntity();
			if ($this->request->is('post')) {
				$exists_email = $this->AppCustomers->exists(['AppCustomers.email'=>$this->request->data['email']]);
				$image_url=@$this->request->data['image_url'];
				if($exists_email==0){
					$this->request->data['status']='Active';
					$this->request->data['username']=$this->request->getData('email');
					$this->request->data['mobile_verify']='Yes';
					$appCustomer = $this->AppCustomers->patchEntity($appCustomer, $this->request->getData());
					if ($this->AppCustomers->save($appCustomer)) {
						$item_error=@$image_url['error'];
						if(!empty(@$image_url['tmp_name'])){
							if(empty($item_error))
							{
								$item_ext=explode('/',$image_url['type']);
								$item_item_image='customer'.time().'.'.$item_ext[1];
								$keyname = 'Appcustomer/'.$appCustomer->id.'/'.$item_item_image;
								$this->AwsFile->putObjectFile($keyname,$image_url['tmp_name'],$image_url['type']);
								
							}
						}
						$success = true;
						$message = "The customer has been saved."; 
						$AppCustomers=$appCustomer;
					}else{
						$success = false;
						$message = "The customer could not be saved. Please, try again"; 
						$AppCustomers=[];
						
					}
				 }else{
					$success = false;
					$message="Email is already taken"; 
					$AppCustomers=[]; 
					
				 }
			}
			$this->set(compact(['AppCustomers','success','message']));
			$this->set('_serialize', ['success','message','AppCustomers']);
		
		}
}
