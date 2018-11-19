<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ItemLedgers Controller
 *
 * @property \App\Model\Table\ItemLedgersTable $ItemLedgers
 *
 * @method \App\Model\Entity\ItemLedger[] paginate($object = null, array $settings = [])
 */
class ItemLedgersController extends AppController
{



    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->viewBuilder()->layout('index_layout');
		$company_id=$this->Auth->User('session_company_id');
		$this->paginate = [
            'contain' => ['Items']
        ];
        $itemLedgers = $this->paginate($this->ItemLedgers->find()->where(['ItemLedgers.company_id'=>$company_id]));

        $this->set(compact('itemLedgers'));
        $this->set('_serialize', ['itemLedgers']);
    }

    /**
     * View method
     *
     * @param string|null $id Item Ledger id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $itemLedger = $this->ItemLedgers->get($id, [
            'contain' => ['Items']
        ]);

        $this->set('itemLedger', $itemLedger);
        $this->set('_serialize', ['itemLedger']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('index_layout');
		$company_id=$this->Auth->User('session_company_id');
		$itemLedger = $this->ItemLedgers->newEntity();
        if ($this->request->is('post')) {
            $itemLedger = $this->ItemLedgers->patchEntity($itemLedger, $this->request->getData());
            if ($this->ItemLedgers->save($itemLedger)) {
                $this->Flash->success(__('The item ledger has been saved.'));

                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The item ledger could not be saved. Please, try again.'));
        }
        $items = $this->ItemLedgers->Items->find('list')->where(['company_id'=>$company_id]);
        $this->set(compact('itemLedger', 'items'));
        $this->set('_serialize', ['itemLedger']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Item Ledger id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('index_layout');
		$company_id=$this->Auth->User('session_company_id');
		$itemLedger = $this->ItemLedgers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $itemLedger = $this->ItemLedgers->patchEntity($itemLedger, $this->request->getData());
            if ($this->ItemLedgers->save($itemLedger)) {
                $this->Flash->success(__('The item ledger has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The item ledger could not be saved. Please, try again.'));
        }
        $items = $this->ItemLedgers->Items->find('list')->where(['company_id'=>$company_id]);
        $this->set(compact('itemLedger', 'items'));
        $this->set('_serialize', ['itemLedger']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Item Ledger id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $itemLedger = $this->ItemLedgers->get($id);
        if ($this->ItemLedgers->delete($itemLedger)) {
            $this->Flash->success(__('The item ledger has been deleted.'));
        } else {
            $this->Flash->error(__('The item ledger could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	public function salesReturnReport()
    {
        $this->viewBuilder()->layout('index_layout');
		$status=$this->request->query('status'); 
		if(!empty($status)){ 
			$this->viewBuilder()->layout('excel_layout');	
		}else{ 
			$this->viewBuilder()->layout('index_layout');
		}
		
		$company_id=$this->Auth->User('session_company_id');
		$url=$this->request->here();
		$url=parse_url($url,PHP_URL_QUERY);
        $itemLedgers =$this->ItemLedgers->find()->where(['ItemLedgers.company_id'=>$company_id,'ItemLedgers.sale_return_id >' =>0])
		->contain(['Items','SaleReturns'=>['PartyLedgers']]);
		//pr($itemLedgers->toArray());
		//exit;
        $this->set(compact('itemLedgers','status','url'));
        $this->set('_serialize', ['itemLedgers']);
    }
	
	public function FetchData($item_id=null){
		$company_id=$this->Auth->User('session_company_id');
		$session_location_id =$this->Auth->User('session_location_id');
		$ItemLedgersData=$this->ItemLedgers->find()->where(['ItemLedgers.company_id'=>$company_id,'ItemLedgers.item_id'=>$item_id,'ItemLedgers.location_id'=>$session_location_id]);
		$this->set(compact('ItemLedgersData'));
        $this->set('_serialize', ['ItemLedgersData']);
		
	}
	public function stockReport()
    {
        $this->viewBuilder()->layout('index_layout');
		$status=$this->request->query('status'); 
		$total=$this->request->query('total'); 
		if(!empty($status)){ 
			$this->viewBuilder()->layout('excel_layout');	
		}else{ 
			$this->viewBuilder()->layout('index_layout');
		}
		$company_id=$this->Auth->User('session_company_id');
		$session_location_id =$this->Auth->User('session_location_id');
		$stock_group_id = $this->request->query('stock_group_id');
		$stock_sub_group_id = $this->request->query('stock_subgroup_id');
		
		$first_time="Yes";
		
		$where=[];
		if(!empty($stock_group_id)){
			$first_time="No";
			$Groups[]=$stock_group_id;
		$stockGroups = $this->ItemLedgers->Items->StockGroups->find('children', ['for' => $stock_group_id]);
		foreach($stockGroups as $stockGroup){
			$Groups[]=$stockGroup->id;
		}
		//pr($stockGroup->toArray()); exit;
		$where['Items.stock_group_id In']=$Groups;
		}
		if(empty($total)){ 
			$total='All';
			
		}
		if(!empty($stock_sub_group_id)){
			$first_time="No";
			$where['Items.stock_group_id']=$stock_sub_group_id;
		}
		$to_date   = $this->request->query('to_date');
		if(!empty($to_date)){  
			$first_time="No";
			$to_date   = date("Y-m-d",strtotime($to_date));
		}
		else{
			$to_date   = date("Y-m-d");
		}
		
		
		$url=$this->request->here();
		$url=parse_url($url,PHP_URL_QUERY);
		//$x=['6176','6177','6173','6172','6174','6178','6179','6180','6025'];
		if($first_time=="No"){ 
			$Items=$this->ItemLedgers->Items->find()->contain(['Shades','Sizes','StockGroups'=>['ParentStockGroups']])->where($where)->where(['Items.company_id'=>$company_id ,'Items.created_on <='=>$to_date]); 
			//pr($Items->toArray());exit;
			$remaining=[];$unit_rate=[];$stock=[];
			foreach($Items as $Item){
				$dataexist=$this->ItemLedgers->exists(['ItemLedgers.item_id'=>$Item->id,'ItemLedgers.location_id'=>$session_location_id ]);
				if($dataexist==1){ 
					
					/* $ItemLedgersIn=$this->ItemLedgers->find()
					->select(['item_id','rate','quantity'=>$this->ItemLedgers->find()->func()->sum('ItemLedgers.quantity')])
					->group(['ItemLedgers.item_id'])
					->where(['ItemLedgers.company_id'=>$company_id,'ItemLedgers.location_id'=>$session_location_id,'ItemLedgers.transaction_date <='=>$to_date,'ItemLedgers.item_id'=>$Item->id,'ItemLedgers.status'=>'in'])->first();
					
					$ItemLedgersQty=$this->ItemLedgers->find()
					->select(['item_id','quantity'=>$this->ItemLedgers->find()->func()->sum('ItemLedgers.quantity')])
					->group(['ItemLedgers.item_id'])
					->where(['ItemLedgers.company_id'=>$company_id,'ItemLedgers.location_id'=>$session_location_id,'ItemLedgers.transaction_date <='=>$to_date,'ItemLedgers.item_id'=>$Item->id,'ItemLedgers.status'=>'out'])->first();
					//pr($session_location_id);
					//pr($ItemLedgersIn);
					//pr($ItemLedgersQty); exit;
					$closingValue=0;
					$rate=0;
					$due=@$ItemLedgersIn->quantity-@$ItemLedgersQty->quantity; */
					
					$purchaseRate=$this->ItemLedgers->find()->where(['ItemLedgers.company_id'=>$company_id,'ItemLedgers.transaction_date <='=>$to_date,'ItemLedgers.item_id'=>$Item->id,'ItemLedgers.status'=>'in','ItemLedgers.grn_id >'=>0])->first();
					//pr($purchaseRate->rate); exit;
					
					$queryIn=$this->ItemLedgers->find()->where(['ItemLedgers.company_id'=>$company_id,'ItemLedgers.location_id'=>$session_location_id,'ItemLedgers.transaction_date <='=>$to_date,'ItemLedgers.item_id'=>$Item->id,'ItemLedgers.status'=>'in']);
					$queryIn->select(['item_id','totalIn' => $queryIn->func()->sum('ItemLedgers.quantity')])->group('ItemLedgers.item_id');
					
					$queryOut=$this->ItemLedgers->find()->where(['ItemLedgers.company_id'=>$company_id,'ItemLedgers.location_id'=>$session_location_id,'ItemLedgers.transaction_date <='=>$to_date,'ItemLedgers.item_id'=>$Item->id,'ItemLedgers.status'=>'out']);
					$queryOut->select(['item_id','totalOut' => $queryOut->func()->sum('ItemLedgers.quantity')])->group('ItemLedgers.item_id');
					
					$due=(@$queryIn->toArray()[0]->totalIn-@$queryOut->toArray()[0]->totalOut);
					
					if($total=='Zero' && @$due == 0){ 
						$remaining[$Item->id]=round(@$ItemLedgersIn->quantity-@$ItemLedgersQty->quantity,2);
						$unit_rate[$Item->id]=	0;
					}else if($total=='Positive' && @$due > 0){
						$remaining[$Item->id]=round(@$queryIn->toArray()[0]->totalIn-@$queryOut->toArray()[0]->totalOut,2);
						$unit_rate[$Item->id]=	@$purchaseRate->rate;
					}else if($total=='All'){ 
						$remaining[$Item->id]=round(@$queryIn->toArray()[0]->totalIn-@$queryOut->toArray()[0]->totalOut,2);
						$unit_rate[$Item->id]=	@$purchaseRate->rate;
					}
					
					
				//	pr($remaining); 
				}	
			} 
		}
		//pr($remaining); exit;
		$companies=$this->ItemLedgers->Companies->find()->contain(['States'])->where(['Companies.id'=>$company_id])->first();
	
		$stockGroups = $this->ItemLedgers->Items->StockGroups->find('list')->where(['StockGroups.company_id'=>$company_id,'StockGroups.parent_id IS NULL']);
		$stockSubgroups=$this->ItemLedgers->Items->StockGroups->find('list')->where(['StockGroups.company_id'=>$company_id]);
        $this->set(compact('companies','status','url','stockGroups','unit_rate','remaining','Items','stockGroups','to_date','stockSubgroups','stock_sub_group_id','stock_group_id','total','first_time'));
        $this->set('_serialize', ['itemLedgers']);
    }
	
	public function itemStockFinish()
    {
        $this->viewBuilder()->layout('index_layout');
		$status=$this->request->query('status'); 
		$total=$this->request->query('total'); 
		if(!empty($status)){ 
			$this->viewBuilder()->layout('excel_layout');	
		}else{ 
			$this->viewBuilder()->layout('index_layout');
		}
		$company_id=$this->Auth->User('session_company_id');
		$session_location_id =$this->Auth->User('session_location_id');
		$stock_group_id = $this->request->query('stock_group_id');
		$stock_sub_group_id = $this->request->query('stock_subgroup_id');
		
		$first_time="Yes";
		
		$where=[];
		if(!empty($stock_group_id)){
			$first_time="No";
			$Groups[]=$stock_group_id;
		$stockGroups = $this->ItemLedgers->Items->StockGroups->find('children', ['for' => $stock_group_id]);
		foreach($stockGroups as $stockGroup){
			$Groups[]=$stockGroup->id;
		}
		//pr($stockGroup->toArray()); exit;
		$where['Items.stock_group_id In']=$Groups;
		}
		if(empty($total)){ 
			$total='All';
			
		}
		
		$to_date   = date("Y-m-d");
		
		
		
		
		//$x=['6176','6177','6173','6172','6174','6178','6179','6180','6025'];
		
			$Items=$this->ItemLedgers->Items->find()->where(['Items.company_id'=>$company_id ,'Items.created_on <='=>$to_date]); 
			
			$remaining=[];$unit_rate=[];$stock=[];
			foreach($Items as $Item){
				$dataexist=$this->ItemLedgers->exists(['ItemLedgers.item_id'=>$Item->id,'ItemLedgers.location_id'=>$session_location_id,'item_stock_finish'=>'No']);
				if($dataexist==1){ 
					
					$queryIn=$this->ItemLedgers->find()->where(['ItemLedgers.company_id'=>$company_id,'ItemLedgers.location_id'=>$session_location_id,'ItemLedgers.transaction_date <='=>$to_date,'ItemLedgers.item_id'=>$Item->id,'ItemLedgers.status'=>'in']);
					$queryIn->select(['item_id','totalIn' => $queryIn->func()->sum('ItemLedgers.quantity')])->group('ItemLedgers.item_id');
					
					$queryOut=$this->ItemLedgers->find()->where(['ItemLedgers.company_id'=>$company_id,'ItemLedgers.location_id'=>$session_location_id,'ItemLedgers.transaction_date <='=>$to_date,'ItemLedgers.item_id'=>$Item->id,'ItemLedgers.status'=>'out']);
					$queryOut->select(['item_id','totalOut' => $queryOut->func()->sum('ItemLedgers.quantity')])->group('ItemLedgers.item_id');
					
					$due=(@$queryIn->toArray()[0]->totalIn-@$queryOut->toArray()[0]->totalOut);
					if($due <= 0){
						$query7 = $this->ItemLedgers->query();
						$query7->update()
						->set(['item_stock_finish' => 'Yes'])
						->where(['ItemLedgers.company_id'=>$company_id,'ItemLedgers.location_id'=>$session_location_id,'ItemLedgers.transaction_date <='=>$to_date,'ItemLedgers.item_id'=>$Item->id])
						->execute();
						
					}
				}	
			} 
		
		exit;
    }
	
		

}
