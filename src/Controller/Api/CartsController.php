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
 * Carts Controller
 *
 * @property \App\Model\Table\CartsTable $Carts
 *
 * @method \App\Model\Entity\Cart[] paginate($object = null, array $settings = [])
 */
class CartsController extends AppController
{
	public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['addtoCart','removeCart']);
    }
	
	public function addtoCart(){
			$app_customer_id=@$this->request->query['app_customer_id'];
			$item_id=@$this->request->query['item_id'];
			$quantity=@$this->request->query['quantity'];
			if(!empty($app_customer_id) and !empty($item_id)){
				
				$Items=$this->Carts->Items->get($item_id);
				$sales_rate=$Items->sales_rate;
				$Cartsdatas=$this->Carts->find()->where(['Carts.app_customer_id'=>$app_customer_id,'Carts.item_id'=>$item_id])->toArray();
				if(empty($Cartsdatas)){
					
					 $cart = $this->Carts->newEntity();
					 $cart->app_customer_id=$app_customer_id;
					 $cart->item_id=$item_id;
					 $cart->quantity=1;
					 $cart->rate=$sales_rate;
					 $cart->amount=$sales_rate;
					 $cart->cart_count=1;
					 $this->Carts->save($cart);
					 
					 $success = true;
					 $message="Item Added Successfully";
					
				}else{
					if(!empty($quantity)){
						$amount=$quantity*$sales_rate;
						foreach($Cartsdatas as $Cartsdata){
							$cart_id=$Cartsdata->id;
							$Cartsupdate=$this->Carts->get($cart_id);
							$Cartsupdate->rate=$sales_rate;
							$Cartsupdate->amount=$amount;
							$Cartsupdate->quantity=$quantity;
							$Cartsupdate->cart_count=$quantity;
							$this->Carts->save($Cartsupdate);
					
						}
						$success = true;
					    $message="Item Added Successfully";
					}else{
						$success = false;
					    $message="Empty quantity";
					}
					
						
				}
				
			}else{
				
				$success = false;
				$message = 'empty customer_id or item_id';
				
			}
		
			$this->set(compact(['success','message']));
			$this->set('_serialize', ['success','message']);
	}
	
	
	public function removeCart(){
		
		$app_customer_id=@$this->request->query['app_customer_id'];
		$item_id=@$this->request->query['item_id'];
		if(!empty($app_customer_id) and !empty($item_id)){
			$Cartscount=$this->Carts->find()->where(['Carts.app_customer_id'=>$app_customer_id,'Carts.item_id'=>$item_id])->count();
			if($Cartscount>0){
				$Cartsdatas=$this->Carts->find()->where(['Carts.app_customer_id'=>$app_customer_id,'Carts.item_id'=>$item_id])->first();
				$this->Carts->delete($Cartsdatas);
			}
			$success = true;
			$message="Item Remove Successfully";
		}else{
			
			$success = false;
			$message = 'empty customer_id or item_id';
		}
		
		$this->set(compact(['success','message']));
		$this->set('_serialize', ['success','message']);
	}
   
}
