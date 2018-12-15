<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AppOrderDetails Controller
 *
 * @property \App\Model\Table\AppOrderDetailsTable $AppOrderDetails
 *
 * @method \App\Model\Entity\AppOrderDetail[] paginate($object = null, array $settings = [])
 */
class AppOrderDetailsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['AppOrders', 'Items', 'GstFigures']
        ];
        $appOrderDetails = $this->paginate($this->AppOrderDetails);

        $this->set(compact('appOrderDetails'));
        $this->set('_serialize', ['appOrderDetails']);
    }

    /**
     * View method
     *
     * @param string|null $id App Order Detail id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $appOrderDetail = $this->AppOrderDetails->get($id, [
            'contain' => ['AppOrders', 'Items', 'GstFigures']
        ]);

        $this->set('appOrderDetail', $appOrderDetail);
        $this->set('_serialize', ['appOrderDetail']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $appOrderDetail = $this->AppOrderDetails->newEntity();
        if ($this->request->is('post')) {
            $appOrderDetail = $this->AppOrderDetails->patchEntity($appOrderDetail, $this->request->getData());
            if ($this->AppOrderDetails->save($appOrderDetail)) {
                $this->Flash->success(__('The app order detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The app order detail could not be saved. Please, try again.'));
        }
        $appOrders = $this->AppOrderDetails->AppOrders->find('list', ['limit' => 200]);
        $items = $this->AppOrderDetails->Items->find('list', ['limit' => 200]);
        $gstFigures = $this->AppOrderDetails->GstFigures->find('list', ['limit' => 200]);
        $this->set(compact('appOrderDetail', 'appOrders', 'items', 'gstFigures'));
        $this->set('_serialize', ['appOrderDetail']);
    }

    /**
     * Edit method
     *
     * @param string|null $id App Order Detail id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $appOrderDetail = $this->AppOrderDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appOrderDetail = $this->AppOrderDetails->patchEntity($appOrderDetail, $this->request->getData());
            if ($this->AppOrderDetails->save($appOrderDetail)) {
                $this->Flash->success(__('The app order detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The app order detail could not be saved. Please, try again.'));
        }
        $appOrders = $this->AppOrderDetails->AppOrders->find('list', ['limit' => 200]);
        $items = $this->AppOrderDetails->Items->find('list', ['limit' => 200]);
        $gstFigures = $this->AppOrderDetails->GstFigures->find('list', ['limit' => 200]);
        $this->set(compact('appOrderDetail', 'appOrders', 'items', 'gstFigures'));
        $this->set('_serialize', ['appOrderDetail']);
    }

    /**
     * Delete method
     *
     * @param string|null $id App Order Detail id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $appOrderDetail = $this->AppOrderDetails->get($id);
        if ($this->AppOrderDetails->delete($appOrderDetail)) {
            $this->Flash->success(__('The app order detail has been deleted.'));
        } else {
            $this->Flash->error(__('The app order detail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
