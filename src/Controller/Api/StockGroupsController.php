<?php
namespace App\Controller\Api;
use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;
use Firebase\JWT\JWT;
use Cake\Validation\Validation;

class StockGroupsController extends AppController
{
	public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['fetchCategoryLists']);
    }
	
	public function fetchCategoryLists(){
		$childrenDatas = $this->StockGroups->find('threaded')->where(['is_status'=>'app']);
		
		if(@sizeof($childrenDatas) > 0){
			$success = true;   $message = 'data found';  $childrenDatas=$childrenDatas;
		}else{    
    		$success = false;   $message = 'No data';  
    	}
	
		$this->set(['success' => $success,'message'=>$message,'category'=>$childrenDatas,'_serialize' => ['success','message','category']]); 
	}
}
