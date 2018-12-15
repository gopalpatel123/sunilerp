<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AppOrders Controller
 *
 * @property \App\Model\Table\AppOrdersTable $AppOrders
 *
 * @method \App\Model\Entity\AppOrder[] paginate($object = null, array $settings = [])
 */
class AppOrdersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['AppCustomers', 'AppCustomerAddresses', 'DeliveryCharges']
        ];
        $appOrders = $this->paginate($this->AppOrders);

        $this->set(compact('appOrders'));
        $this->set('_serialize', ['appOrders']);
    }

    /**
     * View method
     *
     * @param string|null $id App Order id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $appOrder = $this->AppOrders->get($id, [
            'contain' => ['AppCustomers', 'AppCustomerAddresses', 'DeliveryCharges', 'AppOrderDetails']
        ]);

        $this->set('appOrder', $appOrder);
        $this->set('_serialize', ['appOrder']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $appOrder = $this->AppOrders->newEntity();
        if ($this->request->is('post')) {
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
        $this->set('_serialize', ['appOrder']);
    }

    /**
     * Edit method
     *
     * @param string|null $id App Order id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $appOrder = $this->AppOrders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
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
        $this->set('_serialize', ['appOrder']);
    }

    /**
     * Delete method
     *
     * @param string|null $id App Order id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $appOrder = $this->AppOrders->get($id);
        if ($this->AppOrders->delete($appOrder)) {
            $this->Flash->success(__('The app order has been deleted.'));
        } else {
            $this->Flash->error(__('The app order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
