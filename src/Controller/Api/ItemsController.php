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
			$price_range_start=@$this->request->query['price_range_start'];
			$price_range_end=@$this->request->query['price_range_end'];
			
			
			$shadeWhere=[];$sizeWhere=[];$discountWhere=[];$app_brandWhere=[];$price_range_starts=[];
			$price_range_ends=[];
			if(!empty($shade_id)){ $shadeWhere = ['shade_id' =>$shade_id]; }
			if(!empty($size_id)){ $sizeWhere = ['size_id' =>$size_id]; }
			if(!empty($discount)){ $discountWhere = ['discount >=' =>$discount];}
			if(!empty($app_brand_id)){ $app_brandWhere = ['app_brand_id' =>$app_brand_id];}
			if(!empty($price_range_start)){ $price_range_starts = ['sales_rate >= ' =>$price_range_start];}
			if(!empty($price_range_end)){ $price_range_ends = ['sales_rate <= ' =>$price_range_end];}
			
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
				->where($price_range_ends)
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
		 
		
			$this->set(compact(['Items','success','message']));
			$this->set('_serialize', ['success','message','Items']);
	}
}
