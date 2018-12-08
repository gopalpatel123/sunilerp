<?php
namespace App\Controller\Api;

use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;
use Firebase\JWT\JWT;
use Cake\Validation\Validation;
use Cake\Auth\DefaultPasswordHasher;

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
        $this->Auth->allow(['login','send_otp','sociallogin','signup','editProfile','verifymobile','forgetpassword']);
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
	
	public function forgetpassword(){
		$mobile=@$this->request->query['mobile'];
		$otp=@$this->request->query['otp'];
		$password=@$this->request->query['password'];
		if(!empty($mobile) and !empty($otp) and !empty($password)){
			$exists_mobile = $this->AppCustomers->exists(['AppCustomers.mobile'=>$mobile,'AppCustomers.otp'=>$otp]);
			if($exists_mobile==1){
				$AppCustomers=$this->AppCustomers->find()->where(['AppCustomers.mobile'=>$mobile,'AppCustomers.otp'=>$otp])->first();
				$AppCustomers->password=$password;
				$this->AppCustomers->save($AppCustomers);
				$success = true;
				$message = 'Successfully set password';
			}else{
				$success = false;
				$message = 'Mobile or otp is not exits';
			}
			
		}else{
			$success = false;
		    $message = 'empty mobile no or otp or password';
		}
		$this->set(['success' => $success,'message'=>$message,'_serialize' => ['success','message']]);
	}
	
	public function verifymobile(){
		
		$mobile=@$this->request->query['mobile'];
		$otp=0;
		if(!empty($mobile)){
			$exists_mobile = $this->AppCustomers->exists(['AppCustomers.mobile'=>$mobile]);
			if($exists_mobile==1){
				$otp=(mt_rand(1111,9999));
			    $AppCustomers=$this->AppCustomers->find()->where(['AppCustomers.mobile'=>$mobile])->first();
				
				$AppCustomers->otp=$otp;
				$this->AppCustomers->save($AppCustomers);
				$content="Your otp is ".$otp;
				$this->Sms->sendSms($mobile,$content);
				
				$success = true;
				$message = 'send otp successfully';
				
			}else{
				$success = false;
				$message = 'Mobile number is not exits';
			}
			
		}else{
			
			$success = false;
		    $message = 'empty mobile no';
			
		}
		$this->set(['success' => $success,'otp'=>$otp,'message'=>$message,'_serialize' => ['success','otp','message']]);
	}
	
	public function sociallogin(){
		
		$email=@$this->request->query['email'];
		$AppCustomers=(object)[];
		if(!empty($email)){
			
			$exists_email = $this->AppCustomers->exists(['AppCustomers.email'=>$email]);
			
			if($exists_email==1){
				$AppCustomers=$this->AppCustomers->find()->where(['AppCustomers.email'=>$email])->first();
				$success = true;
				$message = 'data found successfully';
			}else{
				$success = false;
				$message = 'Email is not exits';
			}
			
		}else{
			$success = false;
		    $message = 'empty email';
		}
		
			$this->set(compact(['AppCustomers','success','message']));
			$this->set('_serialize', ['success','message','AppCustomers']);
	}
	
	
	 public function login()
		{
			$username=$this->request->data['username'];
			$password=$this->request->data['password'];
			$this->Auth->config('authenticate', [
				'Form' => [
				'fields' => ['username' => 'email'],
				  'userModel' => 'AppCustomers'
				]
			]);
			$this->Auth->constructAuthenticate();
                $this->request->data['email'] = $this->request->data['username'];
                unset($this->request->data['username']);

			$AppCustomers=(object)[];
			$user = $this->Auth->identify();
			
			if(!empty($username) and !empty($password)){
				 //$user = $this->Auth->identify();
				if($user){
					$AppCustomers=$user;
					$success = true;
				    $message = "data found successfully"; 
			
				}else{
					
					$success = false;
					$message = "Invaild username or password"; 
			
				}
				
			}else{
				$success = false;
				$message = "Empty username or password"; 
			}
			
			$this->set(compact(['AppCustomers','success','message']));
			$this->set('_serialize', ['success','message','AppCustomers']);
		}
		
		
		public function signup(){
			
			 $appCustomer = $this->AppCustomers->newEntity();
			if ($this->request->is('post')) {
				$exists_email = $this->AppCustomers->exists(['AppCustomers.email'=>$this->request->data['email']]);
				$exists_mobile = $this->AppCustomers->exists(['AppCustomers.mobile'=>$this->request->data['mobile']]);
				$image_url=@$this->request->data['image_url'];
				if($exists_email==0){
					if($exists_mobile==0){
						$this->request->data['status']='Active';
						$this->request->data['username']=$this->request->getData('email');
						$this->request->data['mobile_verify']='Yes';
						$appCustomer = $this->AppCustomers->patchEntity($appCustomer, $this->request->getData());
						if($this->AppCustomers->save($appCustomer)) {
							$item_error=@$image_url['error'];
							if(!empty(@$image_url['tmp_name'])){
								if(empty($item_error))
								{
									$item_ext=explode('/',$image_url['type']);
									$item_item_image='customer'.time().'.'.$item_ext[1];
									$keyname = 'Appcustomer/'.$appCustomer->id.'/'.$item_item_image;
									$this->AwsFile->putObjectFile($keyname,$image_url['tmp_name'],$image_url['type']);
									$AppCustomersdata=$this->AppCustomers->get($appCustomer->id);
									$AppCustomersdata->image_url=$keyname;
									$this->AppCustomers->save($AppCustomersdata);
									
								}
							}
							$success = true;
							$message = "The customer has been saved."; 
							$AppCustomers=$this->AppCustomers->get($appCustomer->id);
						}else{
							$success = false;
							$message = "The customer could not be saved. Please, try again"; 
							$AppCustomers=(object)[];
							
						}
					}else{
						$success = false;
						$message="Mobile is already taken"; 
						$AppCustomers=(object)[]; 
						
					}
				 }else{
					$success = false;
					$message="Email is already taken"; 
					$AppCustomers=(object)[]; 
					
				 }
			}
			$this->set(compact(['AppCustomers','success','message']));
			$this->set('_serialize', ['success','message','AppCustomers']);
		
		}
		
		
		public function editProfile(){
			$id= $this->request->data('id');
			$AppCustomersExists = $this->AppCustomers->exists(['id' => $id]);
			if($AppCustomersExists){
				$appCustomer = $this->AppCustomers->get($id);
				$image_url_exist = $appCustomer->image_url;
				if ($this->request->is('post')) {
					$image_url=@$this->request->getData('image_url');
					if(!empty($image_url['tmp_name']))
					{
						$this->request->data['image_url']=$image_url;			 
					}
					else
					{
						if(!empty($image_url_exist))
						{
							$appCustomer->image_url=$image_url_exist;	
						}
						else
						{
							$appCustomer->image_url='';
						}
					}
					$appCustomer = $this->AppCustomers->patchEntity($appCustomer, $this->request->getData());
					$appCustomer->mobile = $appCustomer->mobile;
					$appCustomer->email = $appCustomer->email;
					if ($this->AppCustomers->save($appCustomer)) {
						
						if(!empty($image_url['tmp_name'])){
							$item_error=$image_url['error'];
							if(empty($item_error))
								{
									$item_ext=explode('/',$image_url['type']);
									$item_item_image='customer'.time().'.'.$item_ext[1];
								}
							if(empty($files['error']))
							{
								$keyname = 'Appcustomer/'.$appCustomer->id.'/'.$item_item_image;
								$this->AwsFile->putObjectFile($keyname,$image_url['tmp_name'],$image_url['type']);
								if($image_url_exist){
									$this->AwsFile->deleteObjectFile($image_url_exist);
								}
								
							}
							$query = $this->AppCustomers->query();
							$query->update()
							->set([
							'image_url' => $keyname
							])
							->where(['id' => $appCustomer->id])
							->execute();
						}
						$AppCustomers = $this->AppCustomers->get($appCustomer->id);
						$success = true;
						$message = 'profile updated';
						//$error_msg=[];
					}else{
						if($appCustomer->errors()){
							$error_msg = [];
							$i=0;
							foreach( $appCustomer->errors() as $key=>$errors){ 
								if(is_array($errors)){
									foreach($errors as $error){
										$error_msg[$i][$key]    =   $error;
									}
								}else{
									$error_msg[$i][$key]    =   $errors;
								}$i++;
							}

							if(!empty($error_msg)){
								$success = false;
								$message = $error_msg;
								
							}
						}
					
					}
				}
			}else{
				$success = false;
				$message = "No Data Found";
				//$error_msg=[];
			}
			
		$this->set(compact(['error_msg','success','message','AppCustomers']));
		$this->set('_serialize', ['success','message','error_msg','AppCustomers']);	
			
		}
		
}
