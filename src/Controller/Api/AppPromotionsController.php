<?php
namespace App\Controller\Api;
use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;
use Firebase\JWT\JWT;
use Cake\Validation\Validation;

class AppPromotionsController extends AppController
{
	public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['getPromoCodeDetails']);
    }
	
	public function getPromoCodeDetails(){
		$AppPromotions = $this->AppPromotions->find()
						->contain(['AppPromotionDetails'])
						->where(['status'=>'Active']);
		if($AppPromotions){
			$success = true;   $message = 'Promotion Data Found Successfully';
		}else{
			$success = true;   $message = 'Promotion Data Not Found';
		}
		
		$this->set(['success' => $success,'message'=>$message,'AppPromotions'=>$AppPromotions,'_serialize' => ['success','message','AppPromotions']]);
	}
}
