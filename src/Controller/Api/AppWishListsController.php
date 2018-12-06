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

	
	public function wishlistremove($app_wish_list_item_id=null){
		
		$count=$this->AppWishLists->AppWishListItems->find()->where(['id'=>$app_wish_list_item_id])->count();
		if($count>0){
			$AppWishListItems=$this->AppWishLists->AppWishListItems->get($app_wish_list_item_id);
			$this->AppWishLists->AppWishListItems->delete($AppWishListItems);
		}

	}
	
	public function movetoCart($app_customer_id=null,$app_wish_list_item_id=null,$item_id=null){
		
		$Cartsdatas=$this->AppWishLists->Carts->find()->where(['Carts.app_customer_id'=>$app_customer_id,'Carts.item_id'=>$item_id])->toArray();
		
				if(empty($Cartsdatas)){
					 $Items=$this->AppWishLists->Carts->Items->get($item_id);
					 $sales_rate=$Items->sales_rate;
					 $cart = $this->AppWishLists->Carts->newEntity();
					 $cart->app_customer_id=$app_customer_id;
					 $cart->item_id=$item_id;
					 $cart->quantity=1;
					 $cart->rate=$sales_rate;
					 $cart->amount=$sales_rate;
					 $cart->cart_count=1;
					 $this->AppWishLists->Carts->save($cart);
					 
				}
				$this->wishlistremove($app_wish_list_item_id);
	}
	
	
      public function index()
		{
			$AppWishLists=[];
			$app_customer_id=@$this->request->query['app_customer_id'];
			$app_wish_list_item_id=@$this->request->query['app_wish_list_item_id'];
			$item_id=@$this->request->query['item_id'];
			$tagname=@$this->request->query['tag'];
			
			if($tagname=='remove'){
				
				$this->wishlistremove($app_wish_list_item_id);
			}
			
			if($tagname=='movecart'){
				$this->movetoCart($app_customer_id,$app_wish_list_item_id,$item_id);
				
			}
			
			if(!empty($app_customer_id)){
				$AppWishLists=$this->AppWishLists->find()->where(['app_customer_id'=>$app_customer_id])
				->contain(['AppWishListItems'=>['Items'=>['AppBrands']]]);
				if($AppWishLists->toArray()){
					$success = true;
					$message = 'Data found';
				}else{
					$success = false;
					$message = 'Data not found';
				}
				
			}else{
				$success = false;
				$message = 'Empty Customer id';
			}
			
			 $this->set(compact(['AppWishLists','success','message']));
			 $this->set('_serialize', ['success','message','AppWishLists']);
		}
}
