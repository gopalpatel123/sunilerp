<?php

namespace App\Controller\Api;
use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;
use Firebase\JWT\JWT;
use Cake\Validation\Validation;

class AppMenusController extends AppController
{
	 public function getAppMenus()
    {

		$AppMenus = $this->AppMenus->find()->where(['AppMenus.status'=>'Active'])->contain(['ParentAppMenus','ChildAppMenus'])->order(['AppMenus.id'=>'ASC']);
		
         if($AppMenus){     
    		$success = true;   $message = 'Menus Data Found Successfully';   
    	}else{    
    		$success = false;   $message = 'No data';  
    	}
    	
    	$this->set(['success' => $success,'message'=>$message,'AppMenus'=>$AppMenus,'_serialize' => ['success','message','AppMenus']]); 
    }
}
