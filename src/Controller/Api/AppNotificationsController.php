<?php
namespace App\Controller\Api;
use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;
use Firebase\JWT\JWT;
use Cake\Validation\Validation;


/**
 * AppNotifications Controller
 *
 * @property \App\Model\Table\AppNotificationsTable $AppNotifications
 *
 * @method \App\Model\Entity\AppNotification[] paginate($object = null, array $settings = [])
 */
class AppNotificationsController extends AppController
{
	public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['notificationList']);
    }
  
		
	public function notificationList()
		{
			
			 $customer_id = @$this->request->query['app_customer_id'];
			 $cust_noti_arr = [];
			 $alertNotificationList = [];
			 $offerNotificationList =[];
			 $cust_wise_noti_arr = [];
				
				$notificationDatas = $this->AppNotifications->find()->where(['expiry_date >=' => date('Y-m-d')])->toArray();
						
						/* $customerNotificationDatas = $this->AppNotifications->AppNotificationCustomers->find()
						->contain(['AppNotifications'=>function($q) use($city_id){
							return $q->where(['city_id'=>$city_id]);
						}]);
						

						if(!empty($customerNotificationDatas))
						{
							foreach($customerNotificationDatas as $customerNotificationData)
							{
								$cust_noti_arr[] = $customerNotificationData->app_notification;
							}
						}
						
						
						$mainArray = array_diff($notificationDatas,$cust_noti_arr); */

/* 						$customerWiseNotificationDatas = $this->AppNotifications->AppNotificationCustomers->find()
						->contain(['AppNotifications'])->where(['app_customer_id' =>$customer_id]);


						if(!empty($customerWiseNotificationDatas))
						{
							foreach($customerWiseNotificationDatas as $customerWiseNotificationData)
							{
								$cust_wise_noti_arr[] = $customerWiseNotificationData->app_notification;
							}
						} */
						
						$allNotifications = $notificationDatas;
						
/* 						if(!empty($allNotifications))
						{
							foreach($allNotifications as $allNotification)
							{
								if($allNotification->notification_type == 'Alert')
								{
									$alertNotificationList[] = $allNotification;
								}
								else if($allNotification->notification_type == 'Offer')
								{
									$offerNotificationList[]= $allNotification;
								}
							}
						} */
						
						if(empty($allNotifications)){
							$success = false;
							$message = 'No Data Found';					 
						}else {
							$success = true;
							$message = 'Data Found Successfully';
						}
					
					 
			$this->set(['success' => $success,'message'=>$message,'allNotifications'=>$allNotifications,'_serialize' => ['success','message','allNotifications']]); 
			 
	}
}
