<?php
namespace App\Controller\Api;
use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;
use Firebase\JWT\JWT;
use Cake\Validation\Validation;

class AppBannersController extends AppController
{
    public function getAppBanners()
    {

		$AppBanners = $this->AppBanners->find()->where(['AppBanners.status'=>'Active']);
		
         if($AppBanners){     
    		$success = true;   $message = 'Banner Data Found Successfully';   
    	}else{    
    		$success = false;   $message = 'No data';  
    	}
    	
    	$this->set(['success' => $success,'message'=>$message,'AppBanners'=>$AppBanners,'_serialize' => ['success','message','AppBanners']]); 
    }
}
