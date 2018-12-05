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
		$menu=[];$others=[];
         if(sizeof($AppMenusDatas) > 0){     
			foreach($AppMenusDatas as $appmenu){ 
			
				$childrenDatas = $this->AppMenus->StockGroups
							->find('children',['for'=>$appmenu['stock_group_id']])
							->find('threaded')->where(['is_status'=>'app']);
				
				
				if($appmenu->title_content == "Menu"){
					$menu[] = $appmenu;
					unset($appmenu->parent_stock_group);
					$appmenu->child_categories = $childrenDatas;
				}else if($appmenu->title_content == "Others"){
					$others[] = $appmenu;
					unset($appmenu->parent_stock_group);
				}
			}
    		
			$AppMenus=['header_name'=>'Menu','title'=>$menu];
			$AppMenus=['header_name'=>'Menu','title'=>$others];
			$AppMenus[] = array_push($AppMenus,$AppMenus);
			$success = true;   $message = 'Menus Data Found Successfully';  
    	}else{    
    		$success = false;   $message = 'No data';  
    	}
    	
    	$this->set(['success' => $success,'message'=>$message,'AppMenus'=>$AppMenus,'_serialize' => ['success','message','AppMenus']]); 
    }
}
