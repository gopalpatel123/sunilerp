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

	public function listAddresses(){
	  
	}
	
    public function addCustomerAddresses()
    {
        $appCustomerAddress = $this->AppCustomerAddresses->newEntity();
        if ($this->request->is('post')) {
			$app_customer_id=$this->request->getData('app_customer_id');
            $appCustomerAddress = $this->AppCustomerAddresses->patchEntity($appCustomerAddress, $this->request->getData());
			
			if($this->AppCustomerAddresses->save($appCustomerAddress)) {
				$success = true;
				$message = 'Item added to wish list';
			   
			}else{
				
				$success = false;
				$message = 'not successfully added';
			}
            $this->set(compact(['Items','success','message']));
			$this->set('_serialize', ['success','message','Items']);
        }
        
    }
	
	public function getStates(){ echo "sdfsdfsd";exit;
		$this->loadModel('States');
		$States = $this->States->find();
		if($States){     
    		$success = true;   $message = 'States Data Found Successfully';   
    	}else{    
    		$success = false;   $message = 'No data';  
    	}
    	
    	$this->set(['success' => $success,'message'=>$message,'States'=>$States,'_serialize' => ['success','message','States']]); 
	}
}
