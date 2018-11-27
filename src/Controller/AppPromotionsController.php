<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AppPromotions Controller
 *
 * @property \App\Model\Table\AppPromotionsTable $AppPromotions
 *
 * @method \App\Model\Entity\AppPromotion[] paginate($object = null, array $settings = [])
 */
class AppPromotionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
		$this->viewBuilder()->layout('index_layout');
		$search=$this->request->query('search');
        $appPromotions = $this->paginate($this->AppPromotions->find()->contain(['AppPromotionDetails'])->where([
		'OR' => [
            'AppPromotions.offer_name LIKE' => '%'.$search.'%',
			//...
			 'AppPromotions.status LIKE' => '%'.$search.'%',	
			
		 ]]));

        $this->set(compact('appPromotions','search'));
        $this->set('_serialize', ['appPromotions']);
    }

    /**
     * View method
     *
     * @param string|null $id App Promotion id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
		$this->viewBuilder()->layout('index_layout');
        $appPromotion = $this->AppPromotions->get($id, [
            'contain' => ['AppPromotionDetails'=>['StockGroups','Items']]
        ]);

        $this->set('appPromotion', $appPromotion);
        $this->set('_serialize', ['appPromotion']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		$this->viewBuilder()->layout('index_layout');
		$company_id  = $this->Auth->User('session_company_id');
		$location_id = $this->Auth->User('session_location_id');
        $appPromotion = $this->AppPromotions->newEntity();
        if ($this->request->is('post')) {
            $appPromotion = $this->AppPromotions->patchEntity($appPromotion, $this->request->getData());
			$appPromotion->start_date = date('Y-m-d',strtotime($appPromotion->from));
			$appPromotion->end_date = date('Y-m-d',strtotime($appPromotion->to));
			$appPromotion->created_on = date('Y-m-d');
			//pr($this->request->getData());exit;
            if ($this->AppPromotions->save($appPromotion)) {
                $this->Flash->success(__('The app promotion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The app promotion could not be saved. Please, try again.'));
        }
		
		 $stockGroups = $this->AppPromotions->AppPromotionDetails->StockGroups->find()->where(['company_id'=>$company_id,'StockGroups.is_status'=>'app']);
		
		$options=[];
		$totSize=0;
		foreach($stockGroups as $stockgroup){
			$stockgroupsIds = $this->AppPromotions->AppPromotionDetails->StockGroups
							->find('children', ['for' => $stockgroup->id])
							->find('all');
			$totSize=(sizeof($stockgroupsIds->toArray()));
			if($totSize==0){
				$options[]=['text'=>$stockgroup->name,'value'=>$stockgroup->id];
			}
			
		}
		
		 $Items = $this->AppPromotions->AppPromotionDetails->Items->find('list')->where(['company_id'=>$company_id,'Items.sales_for IN'=>['online','online/offline']]);
		
        $this->set(compact('appPromotion','options','Items'));
        $this->set('_serialize', ['appPromotion']);
    }

    /**
     * Edit method
     *
     * @param string|null $id App Promotion id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $appPromotion = $this->AppPromotions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appPromotion = $this->AppPromotions->patchEntity($appPromotion, $this->request->getData());
            if ($this->AppPromotions->save($appPromotion)) {
                $this->Flash->success(__('The app promotion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The app promotion could not be saved. Please, try again.'));
        }
        $this->set(compact('appPromotion'));
        $this->set('_serialize', ['appPromotion']);
    }

    /**
     * Delete method
     *
     * @param string|null $id App Promotion id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $appPromotion = $this->AppPromotions->get($id);
        if ($this->AppPromotions->delete($appPromotion)) {
            $this->Flash->success(__('The app promotion has been deleted.'));
        } else {
            $this->Flash->error(__('The app promotion could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
