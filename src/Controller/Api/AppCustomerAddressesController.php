<?php
namespace App\Controller\Api;

use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;
use Firebase\JWT\JWT;
use Cake\Validation\Validation;
use Cake\Auth\DefaultPasswordHasher;

/**
 * AppCustomerAddresses Controller
 *
 * @property \App\Model\Table\AppCustomerAddressesTable $AppCustomerAddresses
 *
 * @method \App\Model\Entity\AppCustomerAddress[] paginate($object = null, array $settings = [])
 */
class AppCustomerAddressesController extends AppController
{
	public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['fetchAddresses','addCustomerAddresses','getStates','getCities','editAddresses','deleteCustomerAddress']);
    }
	
	public function fetchAddresses(){
		
	  $app_customer_id = $this->request->query('app_customer_id');
	  $AppCustomerAddressesExists = $this->AppCustomerAddresses->exists(['app_customer_id' => $app_customer_id]);
	  
	  if($AppCustomerAddressesExists){
		  $appcustomeraddresses = $this->AppCustomerAddresses->find()->where(['app_customer_id'=>$app_customer_id]);
			$success = true;
			$message = 'data found';
	  }else{
			$success = true;
			$message = 'data found';
			$appcustomeraddresses=[];
	  }
	  
		$this->set(['success' => $success,'message'=>$message,'fetchAddress'=>$appcustomeraddresses,'_serialize' => ['success','message','fetchAddress']]);
	
	}
	
    public function addCustomerAddresses()
    {
        $appCustomerAddress = $this->AppCustomerAddresses->newEntity();
        if ($this->request->is('post')) {
			$app_customer_id=$this->request->getData('app_customer_id');
            $appCustomerAddress = $this->AppCustomerAddresses->patchEntity($appCustomerAddress, $this->request->getData());
			
			if($this->AppCustomerAddresses->save($appCustomerAddress)) {
				$success = true;
				$message = 'Customer addresses added';
			    $error_msg=[];
			}else{
				
				if($appCustomerAddress->errors()){
                $error_msg = [];
				$i=0;
                foreach( $appCustomerAddress->errors() as $key=>$errors){ 
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
					$message = "Please fix the following error(s):";
                    
                }
            }
				
			}
            $this->set(compact(['error_msg','success','message']));
			$this->set('_serialize', ['success','message','error_msg']);
        }
        
    }
	
	public function editAddresses(){
		
		$id = $this->request->data('id');
		$AppCustomerAddressesExists = $this->AppCustomerAddresses->exists(['id' => $id]);
		if($AppCustomerAddressesExists){
		  $appCustomerAddress = $this->AppCustomerAddresses->get($id);
			if ($this->request->is('post')) {
				$id=$this->request->getData('id');
				$appCustomerAddress = $this->AppCustomerAddresses->patchEntity($appCustomerAddress, $this->request->getData());
				
				if($this->AppCustomerAddresses->save($appCustomerAddress)) {
					$success = true;
					$message = 'Customer addresses added';
					$error_msg=[];
				}else{
					
					if($appCustomerAddress->errors()){
					$error_msg = [];
					$i=0;
					foreach( $appCustomerAddress->errors() as $key=>$errors){ 
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
						$message = "Please fix the following error(s):";
						
					}
				}
					
				}
				
			}
		}else{
				$success = false;
				$message = "No Data Found";
				$error_msg=[];
		}
		$this->set(compact(['error_msg','success','message']));
		$this->set('_serialize', ['success','message','error_msg']);
	}
	
	public function deleteCustomerAddress(){
		$id= $this->request->data('id');
		$AppCustomerAddressesExists = $this->AppCustomerAddresses->exists(['id' => $id]);
		if($AppCustomerAddressesExists){
			$appCustomerAddress = $this->AppCustomerAddresses->get($id);
			$appCustomerAddress->is_deleted =1;
			//pr($appCustomerAddress);exit;
			if ($this->AppCustomerAddresses->save($appCustomerAddress)) {
				$success = true;
				$message = "Data Deleted";
			}
		}else{
			$success = false;
			$message = "No Data Found";
		}
		
		$this->set(compact(['error_msg','success','message']));
		$this->set('_serialize', ['success','message','error_msg']);
	}
	
	public function getStates(){ 
		$this->loadModel('States');
		$States = $this->States->find();
		if($States){     
    		$success = true;   $message = 'States Data Found Successfully';   
    	}else{    
    		$success = false;   $message = 'No data';  
    	}
    	
    	$this->set(['success' => $success,'message'=>$message,'States'=>$States,'_serialize' => ['success','message','States']]); 
	}
	
	public function getCities(){ 
		$this->loadModel('Cities');
		$Cities = $this->Cities->find();
		if($Cities){     
    		$success = true;   $message = 'Cities Data Found Successfully';   
    	}else{    
    		$success = false;   $message = 'No data';  
    	}
    	
    	$this->set(['success' => $success,'message'=>$message,'Cities'=>$Cities,'_serialize' => ['success','message','Cities']]); 
	}
}
