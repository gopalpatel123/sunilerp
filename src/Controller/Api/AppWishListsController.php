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
 * AppWishLists Controller
 *
 * @property \App\Model\Table\AppWishListsTable $AppWishLists
 *
 * @method \App\Model\Entity\AppWishList[] paginate($object = null, array $settings = [])
 */
class AppWishListsController extends AppController
{
	public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['add','index']);
    }
  
    public function add()
    {
        $appWishList = $this->AppWishLists->newEntity();
		
        if ($this->request->is('post')) {
			$this->request->data['status']=0;
			$item_id=$this->request->getData('item_id');
            $item_code=$this->request->getData('item_code');
            $app_customer_id=$this->request->getData('app_customer_id');
            $appWishList = $this->AppWishLists->patchEntity($appWishList, $this->request->getData());
			
			$exists = $this->AppWishLists->exists(['AppWishLists.app_customer_id'=>$appWishList->app_customer_id]);
			if($exists==0){
				if($this->AppWishLists->save($appWishList)) {
					$AppWishListItems = $this->AppWishLists->AppWishListItems->newEntity();
					$AppWishListItems->app_wish_list_id=$appWishList->id;
					$AppWishListItems->item_id=$item_id;
					$AppWishListItems->item_code=$item_code;
					$AppWishListItems->status=0;
					$this->AppWishLists->AppWishListItems->save($AppWishListItems);
					$success = true;
					$message = 'Item added to wish list';
				   
				}else{
					
					$success = false;
					$message = 'not successfully added';
				}
			}else{
					$AppWishLists=$this->AppWishLists->find()->where(['app_customer_id'=>$app_customer_id])->first();
					$AppWishListItems = $this->AppWishLists->AppWishListItems->newEntity();
					$AppWishListItems->app_wish_list_id=$AppWishLists->id;
					$AppWishListItems->item_id=$item_id;
					$AppWishListItems->item_code=$item_code;
					$AppWishListItems->status=0;
					$this->AppWishLists->AppWishListItems->save($AppWishListItems);
					
				$success = true;
				$message = 'Item added to wish list';
			}
            $this->set(compact(['Items','success','message']));
			$this->set('_serialize', ['success','message','Items']);
        }
      
    }

      public function index()
		{
			
			$app_customer_id=@$this->request->query['app_customer_id'];
			if(!empty($app_customer_id)){
				$success = false;
				$message = 'not successfully added';
			}else{
				$success = false;
				$message = 'not successfully added';
			}
			
		}
}
