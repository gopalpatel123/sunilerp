<?php

namespace App\Controller\Api;
use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;
use Firebase\JWT\JWT;
use Cake\Validation\Validation;

class AppMenusController extends AppController
{
	public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['getAppMenus']);
    }
	 public function getAppMenus()
    {

		$AppMenusDatas = $this->AppMenus->find()->where(['AppMenus.status'=>'Active'])
						->contain(['ParentStockGroups'=>function($q){
							return $q->where(['is_status'=>'app']);
						}])->order(['AppMenus.id'=>'ASC']);
		
         if(sizeof($AppMenusDatas) > 0){     
			foreach($AppMenusDatas as $appmenu){ 
			
				$childrenDatas = $this->AppMenus->StockGroups
							->find('children',['for'=>$appmenu['stock_group_id']])
							->find('threaded')->where(['is_status'=>'app']);
				
				$appmenu->parent_stock_group->child_categories = $childrenDatas;
				
				$AppMenus[]=['header_name'=>'Menu','title'=>$appmenu];
			}
    		$success = true;   $message = 'Menus Data Found Successfully';  
			
    	}else{    
    		$success = false;   $message = 'No data';  
    	}
    	
    	$this->set(['success' => $success,'message'=>$message,'AppMenus'=>$AppMenus,'_serialize' => ['success','message','AppMenus']]); 
    }
}
