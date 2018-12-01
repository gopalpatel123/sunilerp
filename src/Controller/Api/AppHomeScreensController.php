<?php
namespace App\Controller\Api;
use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;
use Firebase\JWT\JWT;
use Cake\Validation\Validation;

/**
 * AppHomeScreens Controller
 *
 * @property \App\Model\Table\AppHomeScreensTable $AppHomeScreens
 *
 * @method \App\Model\Entity\AppHomeScreen[] paginate($object = null, array $settings = [])
 */
class AppHomeScreensController extends AppController
{

    public function getHomeScreen(){
		
		$AppHomeScreens = $this->AppHomeScreens->find()->contain(['StockGroups']);
		
		$StockGroupsMens = $this->AppHomeScreens->StockGroups->find()->where(['StockGroups.is_status'=>'app','StockGroups.name IN'=>['Men']]);
		
		
		 $StockGroupsBedSheets=[];
		foreach($StockGroupsMens as $stock){
			$childrenDataMens = $this->AppHomeScreens->StockGroups
							->find('children',['for'=>$stock->id])
							->find('threaded')->where(['is_status'=>'app']);
		}
		
		
		$StockGroupsBedSheets = $this->AppHomeScreens->StockGroups->find()->where(['StockGroups.is_status'=>'app','StockGroups.name IN'=>['BedSheets']]);
		
		
		 $childrenDataBedSheets=[];
		foreach($StockGroupsBedSheets as $stock){
			$childrenDataBedSheets = $this->AppHomeScreens->StockGroups
							->find('children',['for'=>$stock->id])
							->find('threaded')->where(['is_status'=>'app'])->limit('3');
		}
		
		
		$Brands = $this->AppHomeScreens->AppBrands->find()->where(['AppBrands.is_status'=>'app'])->limit('4');
		//pr($childrenDatas->toArray());exit; 
		$title='';
		
		 if($AppHomeScreens){     
			foreach($AppHomeScreens as $apphome){
				if($apphome->layout == 'category'){
					$AppHome[]=['title'=>$apphome->title,'layout'=>$apphome->layout,'HomeScreens'=>$apphome];
				}else if($apphome->layout == 'banner'){
					$AppHome[]=['title'=>$apphome->title,'layout'=>$apphome->layout,'HomeScreens'=>$apphome];
				}else if($apphome->layout == 'single image'){
					if($apphome->title == 'Bridal'){
						$AppHome[]=['title'=>$apphome->title,'layout'=>$apphome->layout,'HomeScreens'=>$apphome];
					}else if($apphome->title == 'Kurtis'){
						$AppHome[]=['title'=>$apphome->title,'layout'=>$apphome->layout,'HomeScreens'=>$apphome];
					}else if($apphome->title == 'Womens Bottom Wear'){
						$AppHome[]=['title'=>$apphome->title,'layout'=>$apphome->layout,'HomeScreens'=>$apphome];
					}else if($apphome->title == 'Men Clothing'){
						$AppHome[]=['title'=>$apphome->title,'layout'=>$apphome->layout,'HomeScreens'=>$apphome];
					}else if($apphome->title == 'Kids Collection'){
						$AppHome[]=['title'=>$apphome->title,'layout'=>$apphome->layout,'HomeScreens'=>$apphome];
					}
				}else if($apphome->layout == '4-image layout'){
					if($apphome->title == 'Mens'){
						$AppHome[]=['title'=>$apphome->title,'layout'=>$apphome->layout,'HomeScreens'=>$childrenDataMens];
					}
				}else if($apphome->layout == '2-image layout'){
					$AppHome[]=['title'=>$apphome->title,'layout'=>$apphome->layout,'HomeScreens'=>$apphome];
				}else if($apphome->layout == '3-image layout'){
					if($apphome->title == 'View Full Collection'){
						$AppHome[]=['title'=>$apphome->title,'layout'=>$apphome->layout,'HomeScreens'=>$childrenDataBedSheets];
					}
				}else if($apphome->layout == 'horizontal'){
					$AppHome[]=['title'=>$apphome->title,'layout'=>$apphome->layout,'HomeScreens'=>$apphome];
				}else if($apphome->layout == 'brand layout'){
					$AppHome[]=['title'=>$apphome->title,'layout'=>$apphome->layout,'HomeScreens'=>$Brands];
				}	
			}
			
    		$success = true;   $message = 'Home Screen Data Found Successfully';  
			
    	}else{    
    		$success = false;   $message = 'No data';  
    	}
    	
    	$this->set(['success' => $success,'message'=>$message,'AppHomeScreens'=>$AppHome,'_serialize' => ['success','message','AppHomeScreens']]); 
	}
}
