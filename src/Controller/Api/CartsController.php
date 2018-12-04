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
        $this->Auth->allow(['addtoCart','removeCart','cartList']);
    }
	
	public function cartlistAdd($cart_id=null,$quantity=null){
		
		$cartcount=$this->Carts->find()->where(['Carts.id'=>$cart_id])->count();
		if($cartcount>0){
			$Cartsupdate=$this->Carts->get($cart_id);
			$Items=$this->Carts->Items->get($Cartsupdate->item_id);
			$sales_rate=$Items->sales_rate;
			$amount=$quantity*$sales_rate;
			$Cartsupdate->rate=$sales_rate;
			$Cartsupdate->amount=$amount;
			$Cartsupdate->quantity=$quantity;
			$Cartsupdate->cart_count=$quantity;
			$this->Carts->save($Cartsupdate);
		}
		
	}
	
	public function cartlistRemove($cart_id=null){
		$cartcount=$this->Carts->find()->where(['Carts.id'=>$cart_id])->count();
		if($cartcount>0){
			$Cartsupdate=$this->Carts->get($cart_id);
			$this->Carts->delete($Cartsupdate);
		}
	}
	
	public function cartList(){
		$Carts=(object)[];
		$app_customer_id=@$this->request->query['app_customer_id'];
		$Cart_id=@$this->request->query['cart_id'];
		$quantity=@$this->request->query['quantity'];
		$tag_name=@$this->request->query['tag'];
		if(!empty($app_customer_id)){
			
			$Addresscount=$this->Carts->AppCustomerAddresses->find()->where(['app_customer_id'=>$app_customer_id,'is_deleted'=>0])->count();
			if($Addresscount>0){ $Isaddress=true; }else{ $Isaddress=false;}
			
			if($tag_name=='add'){ $this->cartlistAdd($Cart_id,$quantity); }
			if($tag_name=='remove'){ $this->cartlistRemove($Cart_id); }
			
			$Cartdatas=$this->Carts->find()->where(['app_customer_id'=>$app_customer_id])->toArray();
			if($Cartdatas){
				$Carts=$Cartdatas;
				$success = true;
				$message="Data found Successfully";
			}else{
				$success = false;
				$message="Data not found";
			}
			
			
		}else{
			
			$success = false;
		    $message="Empty customer id";
			
		}
		
		$this->set(compact(['success','message','Isaddress','Carts']));
		$this->set('_serialize', ['success','message','Isaddress','Carts']);
		
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
