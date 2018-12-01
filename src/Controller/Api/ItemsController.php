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
			$app_customer_id=@$this->request->query['app_customer_id'];
			$app_brand_id=@$this->request->query['app_brand_id'];
			$shade_id=@$this->request->query['shade_id'];
			$size_id=@$this->request->query['size_id'];
			$discount=@$this->request->query['discount'];
			$price_range=@$this->request->query['price_range'];
			$newest_order=@$this->request->query['newest_order'];
			$price_order=@$this->request->query['price_order'];
			$discount_order=@$this->request->query['discount_order'];
			
			/// Filter Given According Category
				// Start Brand Category 
				$Itemsforbrands=$this->Items->find()->where(['Items.sales_for'=>'online'])
				->orwhere(['Items.sales_for'=>'online/offline'])
				->where(['Items.stock_group_id'=>$category_id])
				->contain(['AppBrands'])
				 ->distinct(['app_brand_id']);
				$Brand=[];
				if($Itemsforbrands->toArray()){
					
					foreach($Itemsforbrands as $Itemsforbrand){
						$Brand[]=$Itemsforbrand->app_brand;
					}
				}
				$filters[]=['Brand'=>$Brand];
				
				//// End Code
				
				/// Size 
				$size=[];
				$Itemsforsizes=$this->Items->find()->where(['Items.sales_for'=>'online'])
				->orwhere(['Items.sales_for'=>'online/offline'])
				->where(['Items.stock_group_id'=>$category_id])
				->contain(['Sizes'])
				->innerJoinWith('Sizes')
				 ->distinct(['size_id']);
				if($Itemsforsizes->toArray()){
					
					foreach($Itemsforsizes as $Itemsforsize){
						$size[]=$Itemsforsize->size;
					}
				}
				$filters[]=['Size'=>$size];
				
				//End Size
				
				/// Start Shades 
				$shade=[];
				$Itemsforshades=$this->Items->find()->where(['Items.sales_for'=>'online'])
				->orwhere(['Items.sales_for'=>'online/offline'])
				->where(['Items.stock_group_id'=>$category_id])
				->contain(['Shades'])
				->innerJoinWith('Shades')
				 ->distinct(['shade_id']);
				
				if($Itemsforshades->toArray()){
					
					foreach($Itemsforshades as $Itemsforshade){
						$shade[]=$Itemsforshade->shade;
					}
				}
				$filters[]=['Shade'=>$shade];
				
				//End Shades
				
				/// Start Discount 
				
				$discounts[]=['id'=>10,'name'=>'10 Above'];
				$discounts[]=['id'=>20,'name'=>'20 Above'];
				$discounts[]=['id'=>30,'name'=>'30 Above'];
				
				$filters[]=['Discount'=>$discounts];
				
				
				//End Discount 
				
				/// Start Price Range 
				
				$Prices[]=['id'=>1000,'name'=>'1000 Above'];
				$Prices[]=['id'=>3000,'name'=>'3000 Above'];
				$Prices[]=['id'=>5000,'name'=>'5000 Above'];
				$Prices[]=['id'=>10000,'name'=>'10000 Above'];
				
				$filters[]=['Price'=>$Prices];
				
				
				//End Price Range 
				
			
			////
			
			
			/// Sort 
			
			$sorts[]=['id'=>'DESC','name'=>'Newest'];
			$sorts[]=['id'=>'DESC','name'=>'Highest Price First'];
			$sorts[]=['id'=>'ASC','name'=>'Lowest Price First'];
			$sorts[]=['id'=>'DESC','name'=>'Discount'];
			
			$sort[]=['Sortdata'=>$sorts];
			
			//
			$newest_orders=[];$price_orders=[];$discount_orders=[];
			$shadeWhere=[];$sizeWhere=[];$discountWhere=[];$app_brandWhere=[];$price_range_starts=[];
			$price_range_ends=[];
			if(!empty($shade_id)){ $shadeWhere = ['shade_id' =>$shade_id]; }
			if(!empty($size_id)){ $sizeWhere = ['size_id' =>$size_id]; }
			if(!empty($discount)){ $discountWhere = ['discount >=' =>$discount];}
			if(!empty($app_brand_id)){ $app_brandWhere = ['app_brand_id' =>$app_brand_id];}
			if(!empty($price_range)){ $price_range_starts = ['sales_rate >= ' =>$price_range];}
			if(!empty($newest_order)){ $newest_orders = ['Items.id' =>$newest_order];}
			if(!empty($price_order)){ $price_orders = ['Items.sales_rate' =>$price_order];}
			if(!empty($discount_order)){ $discount_orders = ['Items.discount' =>$discount_order];}
			
			if(!empty($category_id) and !empty($page_no)){
				
				$Items=$this->Items->find()->where(['Items.sales_for'=>'online'])
				->orwhere(['Items.sales_for'=>'online/offline'])
				->contain(['StockGroups'])
				->limit($limit)
				->where(['Items.stock_group_id'=>$category_id])
				->where($shadeWhere)
				->where($sizeWhere)
				->where($discountWhere)
				->where($app_brandWhere)
				->where($price_range_starts)
				->order($newest_orders)
				->order($price_orders)
				->order($discount_orders)
				->page($page_no);
				
				if($Items->toArray()){
					
					foreach($Items as $item){
						$item_id=$item->id;
							$inWishList=$this->Items->AppWishListItems->find()
							->where(['AppWishListItems.item_id'=>$item_id])
							->contain(['AppWishLists'=>function($q) use($app_customer_id){
							return $q->select(['AppWishLists.app_customer_id'])->where(['app_customer_id'=>$app_customer_id]);}])->count();
						if($inWishList==1){
							$item->inWishList=true;
						}else{
							$item->inWishList=false;
						}
					}
					
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
		 
		
			$this->set(compact(['Items','success','message','filters','sort']));
			$this->set('_serialize', ['success','message','Items','filters','sort']);
	}
}
