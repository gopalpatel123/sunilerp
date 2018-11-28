<?php
namespace App\Controller\Api;
use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;
use Firebase\JWT\JWT;
use Cake\Validation\Validation;

class AppBrandsController extends AppController
{

    public function getAppBrands()
    {

		$AppBrands = $this->AppBrands->find()->where(['AppBrands.status'=>'Active']);
		
         if($AppBrands){     
    		$success = true;   $message = 'Brands Data Found Successfully';   
    	}else{    
    		$success = false;   $message = 'No data';  
    	}
    	
    	$this->set(['success' => $success,'message'=>$message,'AppBrands'=>$AppBrands,'_serialize' => ['success','message','AppBrands']]); 
    }
}
