<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AppPromotionDetails Controller
 *
 * @property \App\Model\Table\AppPromotionDetailsTable $AppPromotionDetails
 *
 * @method \App\Model\Entity\AppPromotionDetail[] paginate($object = null, array $settings = [])
 */
class AppPromotionDetailsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['AppPromotions', 'StockGroups', 'Items', 'GetItems']
        ];
        $appPromotionDetails = $this->paginate($this->AppPromotionDetails);

        $this->set(compact('appPromotionDetails'));
        $this->set('_serialize', ['appPromotionDetails']);
    }

    /**
     * View method
     *
     * @param string|null $id App Promotion Detail id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $appPromotionDetail = $this->AppPromotionDetails->get($id, [
            'contain' => ['AppPromotions', 'StockGroups', 'Items', 'GetItems']
        ]);

        $this->set('appPromotionDetail', $appPromotionDetail);
        $this->set('_serialize', ['appPromotionDetail']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $appPromotionDetail = $this->AppPromotionDetails->newEntity();
        if ($this->request->is('post')) {
            $appPromotionDetail = $this->AppPromotionDetails->patchEntity($appPromotionDetail, $this->request->getData());
            if ($this->AppPromotionDetails->save($appPromotionDetail)) {
                $this->Flash->success(__('The app promotion detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The app promotion detail could not be saved. Please, try again.'));
        }
        $appPromotions = $this->AppPromotionDetails->AppPromotions->find('list', ['limit' => 200]);
        $stockGroups = $this->AppPromotionDetails->StockGroups->find('list', ['limit' => 200]);
        $items = $this->AppPromotionDetails->Items->find('list', ['limit' => 200]);
        $getItems = $this->AppPromotionDetails->GetItems->find('list', ['limit' => 200]);
        $this->set(compact('appPromotionDetail', 'appPromotions', 'stockGroups', 'items', 'getItems'));
        $this->set('_serialize', ['appPromotionDetail']);
    }

    /**
     * Edit method
     *
     * @param string|null $id App Promotion Detail id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $appPromotionDetail = $this->AppPromotionDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appPromotionDetail = $this->AppPromotionDetails->patchEntity($appPromotionDetail, $this->request->getData());
            if ($this->AppPromotionDetails->save($appPromotionDetail)) {
                $this->Flash->success(__('The app promotion detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The app promotion detail could not be saved. Please, try again.'));
        }
        $appPromotions = $this->AppPromotionDetails->AppPromotions->find('list', ['limit' => 200]);
        $stockGroups = $this->AppPromotionDetails->StockGroups->find('list', ['limit' => 200]);
        $items = $this->AppPromotionDetails->Items->find('list', ['limit' => 200]);
        $getItems = $this->AppPromotionDetails->GetItems->find('list', ['limit' => 200]);
        $this->set(compact('appPromotionDetail', 'appPromotions', 'stockGroups', 'items', 'getItems'));
        $this->set('_serialize', ['appPromotionDetail']);
    }

    /**
     * Delete method
     *
     * @param string|null $id App Promotion Detail id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $appPromotionDetail = $this->AppPromotionDetails->get($id);
        if ($this->AppPromotionDetails->delete($appPromotionDetail)) {
            $this->Flash->success(__('The app promotion detail has been deleted.'));
        } else {
            $this->Flash->error(__('The app promotion detail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
