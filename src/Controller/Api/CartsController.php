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
        $this->Auth->allow(['addtoCart','removeCart','cartList','addtoCartproduct','cartreviewList']);
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
		$Carts=[];
		$app_customer_id=@$this->request->query['app_customer_id'];
		$Cart_id=@$this->request->query['cart_id'];
		$quantity=@$this->request->query['quantity'];
		$tag_name=@$this->request->query['tag'];
		$delivery_charge="Free";
		if(!empty($app_customer_id)){
			
			$Addresscount=$this->Carts->AppCustomerAddresses->find()->where(['app_customer_id'=>$app_customer_id,'is_deleted'=>0])->count();
			if($Addresscount>0){ 
					
				$Isaddress=true;
			}else{
				$Isaddress=false;
				}
			
			if($tag_name=='add'){ $this->cartlistAdd($Cart_id,$quantity); }
			if($tag_name=='remove'){ $this->cartlistRemove($Cart_id); }
			
			$Cartdatas=$this->Carts->find()->where(['app_customer_id'=>$app_customer_id])
			->contain(['Items'=>['AppBrands','Sizes','Shades']])->toArray();
			
				
			
			if($Cartdatas){
				$total_amount=0;
				foreach($Cartdatas as $cartnew){ 
					$total_quantity=0;
					$query = $this->Carts->Items->ItemLedgers->find();
					$query->select(['item_in'=>$query->func()->sum('quantity')])
						->where(['status'=>'in','item_id'=>$cartnew->item_id,'company_id'=>$cartnew->item->company_id]);
					$item_in = $query->first()->item_in;

					$query = $this->Carts->Items->ItemLedgers->find();
					$query->select(['item_out'=>$query->func()->sum('quantity')])
						->where(['status'=>'out','item_id'=>$cartnew->item_id,'company_id'=>$cartnew->item->company_id]);
					$item_out = $query->first()->item_out;

					$total_quantity=$item_in-$item_out; 
					if($cartnew->quantity >$total_quantity){
						$cartnew->item->outofstock='Yes';
					}else{
						$cartnew->item->outofstock='No';
					}
					$total_amount+=$cartnew->amount;
				}
				
				
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
		
		$this->set(compact(['success','message','Isaddress','total_amount','Carts','delivery_charge']));
		$this->set('_serialize', ['success','message','Isaddress','total_amount','Carts','delivery_charge']);
		
	}
	public function cartreviewList(){
		$Carts=[];
		$AppCustomerAddresses=[];
		$app_customer_id=@$this->request->query['app_customer_id'];
		$delivery_charge="Free";
		if(!empty($app_customer_id)){
			
			$Addresscount=$this->Carts->AppCustomerAddresses->find()->where(['app_customer_id'=>$app_customer_id,'is_deleted'=>0])->count();
			if($Addresscount>0){ 
				$AppCustomerAddresses=$this->Carts->AppCustomerAddresses->find()->where(['app_customer_id'=>$app_customer_id,'is_deleted'=>0])
				->contain(['Cities','States'])->first();
				$Isaddress=true;
			}else{
				$Isaddress=false;

			}
			
			
			$Cartdatas=$this->Carts->find()->where(['app_customer_id'=>$app_customer_id])->contain(['Items'=>['AppBrands','Sizes','Shades']])->toArray();
			if($Cartdatas){
				$total_amount=0;
				foreach($Cartdatas as $cartnew){
					
					$total_amount+=$cartnew->amount;
				}
				
				
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
		
		$this->set(compact(['success','message','Isaddress','total_amount','Carts','AppCustomerAddresses','delivery_charge']));
		$this->set('_serialize', ['success','message','Isaddress','total_amount','Carts','AppCustomerAddresses','delivery_charge']);
		
	}
	
	
	public function addtoCartproduct(){
		
		$app_customer_id=@$this->request->query['app_customer_id'];
		$item_code=@$this->request->query['item_code'];
		$shade_id=@$this->request->query['shade_id'];
		$size_id=@$this->request->query['size_id'];
		if(!empty($app_customer_id) and !empty($item_code) and !empty($shade_id) and !empty($size_id)){
			
			$Items=$this->Carts->Items->find()->where(['Items.item_code'=>$item_code,'Items.shade_id'=>$shade_id,'Items.size_id'=>$size_id])->first()->toArray();
			$item_id=$Items['id'];
			$sales_rate=$Items['sales_rate'];
			$company_id=$Items['company_id'];
			$Cartsdatas=$this->Carts->find()->where(['Carts.app_customer_id'=>$app_customer_id,'Carts.item_id'=>$item_id])->toArray();
			if(empty($Cartsdatas)){
				
				 $cart = $this->Carts->newEntity();
				 $cart->app_customer_id=$app_customer_id;
				 $cart->item_id=$item_id;
				 $cart->company_id=$company_id;
				 $cart->quantity=1;
				 $cart->rate=$sales_rate;
				 $cart->amount=$sales_rate;
				 $cart->cart_count=1;
				 $this->Carts->save($cart);
				  
				 $success = true;
				 $message="Item Added Successfully";
				 
			}else{
				
				 $success = true;
				 $message="Item Added Successfully";
			}
			
		}else{
			
			$success = false;
		    $message="Empty customer id or item_code or shade_id or size_id";
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
				$company_id=$Items->company_id;
				$Cartsdatas=$this->Carts->find()->where(['Carts.app_customer_id'=>$app_customer_id,'Carts.item_id'=>$item_id])->toArray();
				if(empty($Cartsdatas)){
					
					 $cart = $this->Carts->newEntity();
					 $cart->app_customer_id=$app_customer_id;
					 $cart->item_id=$item_id;
					 $cart->company_id=$company_id;
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
