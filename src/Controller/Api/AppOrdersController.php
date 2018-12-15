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
 * AppOrders Controller
 *
 * @property \App\Model\Table\AppOrdersTable $AppOrders
 *
 * @method \App\Model\Entity\AppOrder[] paginate($object = null, array $settings = [])
 */
class AppOrdersController extends AppController
{
	public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['placeorder','myorder','orderdetails']);
    }

	public function myorder(){
		$AppOrders=[];
		$app_customer_id=@$this->request->query['app_customer_id'];
		if(!empty($app_customer_id)){
			
			$AppOrders=$this->AppOrders->find()
			->where(['app_customer_id'=>$app_customer_id])
			->contain(['AppOrderDetails'=>['Items'=>['AppBrands']]])
			->order(['id'=>'DESC']);
			
			if($AppOrders->toArray()){
				foreach($AppOrders as $AppOrder){
					$AppOrder->item_count=sizeof($AppOrder->app_order_details);
					$AppOrder->app_order_details=$AppOrder->app_order_details[0];
					
				}
				$success = true;
			    $message="Data found Successfully";
			}else{
				$success = false;
				$message = 'Data not found';
			}
			
		}else{
			
			$success = false;
			$message = 'empty customer_id';
		}
		$this->set(compact(['success','message','AppOrders']));
		$this->set('_serialize', ['success','message','AppOrders']);
	}
	
	public function orderdetails(){
		$AppOrders=(object)[];
		$order_id=@$this->request->query['order_id'];
		if(!empty($order_id)){
			$AppOrdersCount=$this->AppOrders->find()->where(['id'=>$order_id])->count();
			if($AppOrdersCount>0){
				$AppOrders=$this->AppOrders->get($order_id,['contain'=>['AppCustomerAddresses'=>['Cities','States'],'AppOrderDetails'=>['Items'=>['AppBrands','Sizes','Shades','Companies']]]]);
				$success = true;
				$message="Data found Successfully";
			}else{
				$success = false;
				$message="Data not found";
			}
		}else{
			
			$success = false;
			$message = 'empty order_id';
		}
		
		$this->set(compact(['success','message','AppOrders']));
		$this->set('_serialize', ['success','message','AppOrders']);
	}
	
   public function placeorder()
    {
		 if ($this->request->is('post')) {
				$app_customer_id=$this->request->data['app_customer_id'];
				$app_customer_address_id=$this->request->data['app_customer_address_id'];
				$AppCustomerAddresses=$this->AppOrders->AppCustomerAddresses->get($app_customer_address_id);
				$this->request->data['order_status']='placed';
				$this->request->data['customer_address_info']=$AppCustomerAddresses->address;
				$Cartsdatas=$this->AppOrders->Carts->find()
				->where(['app_customer_id'=>$app_customer_id])
				->contain(['Items'=>['FirstGstFigures','SecondGstFigures']]);
				
				$Cartsgroups=$this->AppOrders->Carts->find()->where(['app_customer_id'=>$app_customer_id])->group('company_id');
				foreach($Cartsdatas as $cartdata){
					$fetchCartdatas[$cartdata->company_id][]=$cartdata;
				}
				
				$fetch_Commanorder=$this->AppOrders->find()->select(['common_order_no'])->order(['common_order_no' => 'DESC'])->limit(1)->toArray();
					if(!empty($fetch_Commanorder)){
						$common_order_no=$fetch_Commanorder[0]['common_order_no']+1;
					}else{
						$common_order_no=1;
					}  
				
				
				foreach($Cartsgroups as $Cartsgroup_id){
					
					$fetch_AppOrders=$this->AppOrders->find()->select(['order_no'])->order(['order_no' => 'DESC'])->limit(1)->toArray();
					if(!empty($fetch_AppOrders)){
						$order_no=$fetch_AppOrders[0]['order_no']+1;
					}else{
						$order_no=1;
					}  
					$this->request->data['order_no']=$order_no;
					$this->request->data['delivery_charge_amount']='Free';
					$this->request->data['voucher_no']=$order_no;
					$this->request->data['common_order_no']=$common_order_no;
					$this->request->data['company_id']=$Cartsgroup_id->company_id;
					$this->request->data['order_date']=date("Y-m-d");
					$this->request->data['delivery_date']= date('Y-m-d',strtotime("+5 days"));
					
					$appOrder = $this->AppOrders->newEntity();
       				$appOrder = $this->AppOrders->patchEntity($appOrder, $this->request->getData());
					
						if($this->AppOrders->save($appOrder)) {
						
							$total_gst=0;$total_amount=0;
							foreach($fetchCartdatas[$Cartsgroup_id->company_id] as $fetchCartdata){
								
									$AppOrderDetails=$this->AppOrders->AppOrderDetails->newEntity();
									$AppOrderDetails->app_order_id=$appOrder->id;
									$AppOrderDetails->item_id=$fetchCartdata->item_id;
									$AppOrderDetails->quantity=$fetchCartdata->quantity;
									$AppOrderDetails->rate=$fetchCartdata->rate;
									$AppOrderDetails->amount=$fetchCartdata->amount;
									$AppOrderDetails->item_status='placed';
									$AppOrderDetails->net_amount=$fetchCartdata->amount;
									
									$kind_of_gst=$fetchCartdata->item->kind_of_gst;
									if($kind_of_gst=='fix'){
										$tax_percentage=$fetchCartdata->item->FirstGstFigures->tax_percentage;
										 $gstupon=100+$tax_percentage;
										 $gst_values=$tax_percentage*$fetchCartdata->amount/$gstupon;
										 $gst_divide= round($gst_values/2,2);
										 $gst_value=$gst_divide*2;
										
										 $AppOrderDetails->gst_value=$gst_value;
										 $AppOrderDetails->gst_percentage=$tax_percentage;
										 $AppOrderDetails->gst_figure_id=$fetchCartdata->item->first_gst_figure_id;
										 $AppOrderDetails->taxable_value=$fetchCartdata->amount-$gst_value;
										 $total_gst+=$gst_value;
										 $total_amount+=$fetchCartdata->amount;
									
									}elseif($kind_of_gst=='fluid'){
										
										if($fetchCartdata->amount<1050){
											 $tax_percentage=$fetchCartdata->item->FirstGstFigures->tax_percentage;
											 $gstupon=100+$tax_percentage;
											 $gst_values=$tax_percentage*$fetchCartdata->amount/$gstupon;
											 $gst_divide= round($gst_values/2,2);
											 $gst_value=$gst_divide*2;
											
											 $AppOrderDetails->gst_value=$gst_value;
											 $AppOrderDetails->gst_percentage=$tax_percentage;
											 $AppOrderDetails->gst_figure_id=$fetchCartdata->item->first_gst_figure_id;
											 $AppOrderDetails->taxable_value=$fetchCartdata->amount-$gst_value;
											 $total_gst+=$gst_value;
											 $total_amount+=$fetchCartdata->amount;

										}elseif($fetchCartdata->amount>=1050){
											$tax_percentage=$fetchCartdata->item->SecondGstFigures->tax_percentage;
											$gstupon=100+$tax_percentage;
											 $gst_values=$tax_percentage*$fetchCartdata->amount/$gstupon;
											 $gst_divide= round($gst_values/2,2);
											 $gst_value=$gst_divide*2;
											
											 $AppOrderDetails->gst_value=$gst_value;
											 $AppOrderDetails->gst_percentage=$tax_percentage;
											 $AppOrderDetails->gst_figure_id=$fetchCartdata->item->second_gst_figure_id;
											 $AppOrderDetails->taxable_value=$fetchCartdata->amount-$gst_value;
											 $total_gst+=$gst_value;
											 $total_amount+=$fetchCartdata->amount;
										}
										
									}
									
									$this->AppOrders->AppOrderDetails->save($AppOrderDetails);
									
									
								}
								
								$round_offs=explode('.',$total_amount);
								$round_off=$total_amount-$round_offs[0];
								$query = $this->AppOrders->query();
								$query->update()
								->set(['total_gst'=>$total_gst,'grand_total'=>$total_amount,'round_off'=>$round_off])
								->where(['id'=>$appOrder->id])->execute();	
								
								
								
								
						}
					
					
				}
				
				
		 }
			$success = true;
			$message="Order placed Successfully";
			$this->set(compact(['success','message']));
			$this->set('_serialize', ['success','message']);
		
        /* $appOrder = $this->AppOrders->newEntity();
       
            $appOrder = $this->AppOrders->patchEntity($appOrder, $this->request->getData());
            if ($this->AppOrders->save($appOrder)) {
                $this->Flash->success(__('The app order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The app order could not be saved. Please, try again.'));
        }
        $appCustomers = $this->AppOrders->AppCustomers->find('list', ['limit' => 200]);
        $appCustomerAddresses = $this->AppOrders->AppCustomerAddresses->find('list', ['limit' => 200]);
        $deliveryCharges = $this->AppOrders->DeliveryCharges->find('list', ['limit' => 200]);
        $this->set(compact('appOrder', 'appCustomers', 'appCustomerAddresses', 'deliveryCharges'));
        $this->set('_serialize', ['appOrder']); */
    }

}
