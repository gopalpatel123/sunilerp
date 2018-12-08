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
        $this->Auth->allow(['itemlist','itemdetail','ratingList','deliverycheck']);
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
			if(!empty($shade_id)){ 
				$shade_ids=explode(',',$shade_id);
				$shadeWhere = ['shade_id IN' =>$shade_ids];
			 }
			if(!empty($size_id)){ 
				$size_ids=explode(',',$size_id);
				$sizeWhere = ['size_id IN' =>$size_ids]; 
			}
			
			if(!empty($discount)){ $discountWhere = ['discount >=' =>$discount];}
			if(!empty($app_brand_id)){ 
				$app_brand_ids=explode(',',$app_brand_id);
				$app_brandWhere = ['app_brand_id IN' =>$app_brand_ids];
			}
			if(!empty($price_range)){ $price_range_starts = ['sales_rate >= ' =>$price_range];}
			if(!empty($newest_order)){ $newest_orders = ['Items.id' =>$newest_order];}
			if(!empty($price_order)){ $price_orders = ['Items.sales_rate' =>$price_order];}
			if(!empty($discount_order)){ $discount_orders = ['Items.discount' =>$discount_order];}
			
			if(!empty($category_id) and !empty($page_no)){
				
				$Items=$this->Items->find()->where(['Items.sales_for'=>'online'])
				->orwhere(['Items.sales_for'=>'online/offline'])
				->contain(['StockGroups','AppBrands'])
				->leftJoinWith('AppBrands')
				->limit($limit)
				->where(['Items.stock_group_id'=>$category_id])
				->where($shadeWhere)
				->where($sizeWhere)
				->where($discountWhere)
				->where($app_brandWhere)
				->where($price_range_starts)
				->distinct(['shade_id'])
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
	
	public function itemdetail(){
		
		$item_code=@$this->request->query['item_code'];
		$item_id=@$this->request->query['item_id'];
		$shade_id=@$this->request->query['shade_id'];
		$app_customer_id=@$this->request->query['app_customer_id'];
		if(!empty($item_code) and !empty($item_id) and !empty($shade_id)){

		
		/// Rating Concept
			$averageRating = number_format(0,1); 
			$allpercentage =array();
			$ratingLists = $this->Items->ItemReviewRatings->find();
			$ratingLists->contain(['AppCustomers'=>function($q){ return $q->select(['name']);  } ])
			->where(['ItemReviewRatings.item_id'=>$item_id,'ItemReviewRatings.status'=>0]);
			
		if(!empty($ratingLists->toArray())){
			
			$ratingcount=sizeof($ratingLists->toArray());
			 $ratingreviewsCount = $this->Items->ItemReviewRatings->find()
			->where(['ItemReviewRatings.item_id'=>$item_id,'ItemReviewRatings.status'=>0,'ItemReviewRatings.comment !='=>''])->count();
			$rating = $this->Items->ItemReviewRatings->find();
			$rating->select(['averageRating' => $rating->func()->avg('rating')])
			->where(['ItemReviewRatings.item_id'=>$item_id,'ItemReviewRatings.status'=>0]);
				foreach ($rating as $ratingarr) {
					$averageRating = number_format($ratingarr->averageRating,1);
				}

				$star1 = $this->Items->ItemReviewRatings->find()->where(['ItemReviewRatings.item_id'=>$item_id,'ItemReviewRatings.status'=>0,'rating >='=>1,'rating <'=>1.9])->all();
				$star1count = $star1->count();
				
				$star2 = $this->Items->ItemReviewRatings->find()->where(['ItemReviewRatings.item_id'=>$item_id,'ItemReviewRatings.status'=>0,'rating >='=>2,'rating <'=>2.9])->all();
				$star2count = $star2->count();

				$star3 = $this->Items->ItemReviewRatings->find()->where(['ItemReviewRatings.item_id'=>$item_id,'ItemReviewRatings.status'=>0,'rating >='=>3,'rating <'=>3.9])->all();
				$star3count = $star3->count();

				$star4 = $this->Items->ItemReviewRatings->find()->where(['ItemReviewRatings.item_id'=>$item_id,'ItemReviewRatings.status'=>0,'rating >='=>4,'rating <'=>4.9])->all();
				$star4count = $star4->count();

				$star5 = $this->Items->ItemReviewRatings->find()->where(['ItemReviewRatings.item_id'=>$item_id,'ItemReviewRatings.status'=>0,'rating'=>5])->all();
				$star5count = $star5->count();
			
				$allpercentage[] = array("rating"=>5,"Count"=>$star5count);
				$allpercentage[] = array("rating"=>4,"Count"=>$star4count);
				$allpercentage[] = array("rating"=>3,"Count"=>$star3count);
				$allpercentage[] = array("rating"=>2,"Count"=>$star2count);
				$allpercentage[] = array("rating"=>1,"Count"=>$star1count);
				
			}
		//// End Rating
		
		// Item details 
		
			$Items=$this->Items->find()->where(['Items.id'=>$item_id])
			->contain(['AppBrands','Sizes','Shades','ItemImageRows'])
			 ->leftJoinWith('AppBrands')->first()->toArray();
			 
			$inWishList=$this->Items->AppWishListItems->find()
				->where(['AppWishListItems.item_id'=>$item_id])
				->contain(['AppWishLists'=>function($q) use($app_customer_id){
				return $q->select(['AppWishLists.app_customer_id'])->where(['app_customer_id'=>$app_customer_id]);}])->count();
				if($inWishList==1){
					$Items['inWishList']=true;
				}else{
					$Items['inWishList']=false;
				}
			 
				$size=[];
				$Itemsforshades=$this->Items->find()->where(['Items.sales_for'=>'online'])
				->orwhere(['Items.sales_for'=>'online/offline'])
				->where(['Items.item_code'=>$item_code,'shade_id'=>$shade_id])
				->contain(['Shades','Sizes'])
				->innerJoinWith('Shades')
				 ->group(['size_id']);
				if($Itemsforshades->toArray()){
					
					foreach($Itemsforshades as $Itemsforshade){
						$size[]=$Itemsforshade->size;
					}
				}
				$Items['size']=$size;
			
		/// RelatedItems code 
		
				$RelatedItems=$this->Items->find()->where(['Items.sales_for'=>'online'])
				->orwhere(['Items.sales_for'=>'online/offline'])
				->contain(['StockGroups','AppBrands'])
				->leftJoinWith('AppBrands')
				->where(['Items.stock_group_id'=>$Items['stock_group_id'],'Items.id !='=>$item_id]);
				if(!empty($RelatedItems->toArray())){
					foreach($RelatedItems as $RelatedItem){
						$itemrelate_id=$RelatedItem->id;
						$inWishList=$this->Items->AppWishListItems->find()
						->where(['AppWishListItems.item_id'=>$itemrelate_id])
						->contain(['AppWishLists'=>function($q) use($app_customer_id){
						return $q->select(['AppWishLists.app_customer_id'])->where(['app_customer_id'=>$app_customer_id]);}])->count();
						if($inWishList==1){
							$RelatedItem['inWishList']=true;
						}else{
							$RelatedItem['inWishList']=false;
						}
					}
				}
				
				
			if(!empty($Items)){
				
				$success = true;
				$message = 'data found';
			}else{
				$Items=[];
				$success = false;
				$message = 'empty data';
			}
		}else{
			$success = false;
			$message = 'empty item_code or item_id or shade_id';
		}
		
		$this->set(compact(['Items','success','message','averageRating','ratingLists','allpercentage','ratingcount','ratingreviewsCount','RelatedItems']));
		$this->set('_serialize', ['success','message','Items','averageRating','ratingLists','allpercentage','ratingcount','ratingreviewsCount','RelatedItems']);
		 
	}
	
	
	public function deliverycheck(){
		
		$city_id=@$this->request->query['city_id'];
		if(!empty($city_id)){
			$DeliveryCharges=$this->Items->DeliveryCharges->find()->where(['DeliveryCharges.id'=>$city_id,'status'=>'Active'])->toArray();
			if($DeliveryCharges){
				$success = true;
				$message = 'Data found';
			}else{
				$success = false;
				$message = 'data not found';
			}
		}else{
			$success = false;
			$message = 'empty city_id';
		}
		$this->set(compact(['success','message','DeliveryCharges']));
		$this->set('_serialize', ['success','message','DeliveryCharges']);
	}
	
   public function ratingList($item_id = null){
		$ratingcount=0;	
		$ratingreviewsCount=0;	
		$item_id=@$this->request->query['item_id'];
			if(!empty($item_id)){
					$averageRating = number_format(0,1);
					$allpercentage =array();
					$ratingLists = $this->Items->ItemReviewRatings->find();
					$ratingLists->contain(['AppCustomers'=>function($q){ return $q->select(['name']);  } ])
					->where(['ItemReviewRatings.item_id'=>$item_id,'ItemReviewRatings.status'=>0])
					->order(['ItemReviewRatings.id'=>'DESC']);
					//pr($ratingLists->toArray()); exit;
					if(!empty($ratingLists->toArray())){
						$ratingcount=sizeof($ratingLists->toArray());
						 $ratingreviewsCount = $this->Items->ItemReviewRatings->find()
						->where(['ItemReviewRatings.item_id'=>$item_id,'ItemReviewRatings.status'=>0,'ItemReviewRatings.comment !='=>''])->count();
						$rating = $this->Items->ItemReviewRatings->find();
						$rating->select(['averageRating' => $rating->func()->avg('rating')])
						->where(['ItemReviewRatings.item_id'=>$item_id,'ItemReviewRatings.status'=>0]);
							foreach ($rating as $ratingarr) {
								$averageRating = number_format($ratingarr->averageRating,1);
							}

							$star1 = $this->Items->ItemReviewRatings->find()->where(['ItemReviewRatings.item_id'=>$item_id,'ItemReviewRatings.status'=>0,'rating >='=>1,'rating <'=>1.9])->all();
							$star1count = $star1->count();
							
							$star2 = $this->Items->ItemReviewRatings->find()->where(['ItemReviewRatings.item_id'=>$item_id,'ItemReviewRatings.status'=>0,'rating >='=>2,'rating <'=>2.9])->all();
							$star2count = $star2->count();

							$star3 = $this->Items->ItemReviewRatings->find()->where(['ItemReviewRatings.item_id'=>$item_id,'ItemReviewRatings.status'=>0,'rating >='=>3,'rating <'=>3.9])->all();
							$star3count = $star3->count();

							$star4 = $this->Items->ItemReviewRatings->find()->where(['ItemReviewRatings.item_id'=>$item_id,'ItemReviewRatings.status'=>0,'rating >='=>4,'rating <'=>4.9])->all();
							$star4count = $star4->count();

							$star5 = $this->Items->ItemReviewRatings->find()->where(['ItemReviewRatings.item_id'=>$item_id,'ItemReviewRatings.status'=>0,'rating'=>5])->all();
							$star5count = $star5->count();
						
							$allpercentage[] = array("rating"=>5,"Count"=>$star5count);
							$allpercentage[] = array("rating"=>4,"Count"=>$star4count);
							$allpercentage[] = array("rating"=>3,"Count"=>$star3count);
							$allpercentage[] = array("rating"=>2,"Count"=>$star2count);
							$allpercentage[] = array("rating"=>1,"Count"=>$star1count);
							$success = true;
							$message = 'Data found';
						}else{
							$success = false;
							$message = 'Data not found';
						}	
			}else{
				$success = false;
				$message = 'empty item_id';
			}		
			  $this->set(['success' => $success,'message'=>$message,'averageRating'=>$averageRating,'ratingcount'=>$ratingcount,'ratingreviewsCount'=>$ratingreviewsCount,'ratingLists' => $ratingLists,'percentage'=>$allpercentage,'_serialize' => ['success','message','averageRating','ratingLists','percentage','ratingcount','ratingreviewsCount']]);
	}
}
