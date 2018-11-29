<?php
namespace App\Controller\Api;

use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;
use Firebase\JWT\JWT;
use Cake\Validation\Validation;
use Cake\Auth\DefaultPasswordHasher;
use Cake\View\Helper\BarcodeHelper;
/**
 * Items Controller
 *
 * @property \App\Model\Table\ItemsTable $Items
 *
 * @method \App\Model\Entity\Item[] paginate($object = null, array $settings = [])
 */
class ItemsController extends AppController
{

	public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['itemlist']);
    }
	public function itemlist(){
			$limit=10;
			$category_id=@$this->request->query['category_id'];
			$page_no=@$this->request->query['page_no'];
			if(!empty($category_id) and !empty($page_no)){
				
				$Items=$this->Items->find()->where(['Items.sales_for'=>'online'])
				->orwhere(['Items.sales_for'=>'online/offline'])
				->contain(['StockGroups'])
				->limit($limit)
				->where(['Items.stock_group_id'=>$category_id])
				->page($page_no);
				if($Items->toArray()){
					
					$success = true;
					$message = 'data found';
				
				}else{
					$success = false;
					$message = 'data not found';
				
				}
				
			}else{
				
				$success = false;
				$message = 'empty category_id or page_no';
				
			}
		 
		
			$this->set(compact(['Items','success','message']));
			$this->set('_serialize', ['success','message','Items']);
	}
}
