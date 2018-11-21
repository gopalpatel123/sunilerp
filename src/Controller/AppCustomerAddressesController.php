<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AppCustomerAddresses Controller
 *
 * @property \App\Model\Table\AppCustomerAddressesTable $AppCustomerAddresses
 *
 * @method \App\Model\Entity\AppCustomerAddress[] paginate($object = null, array $settings = [])
 */
class AppCustomerAddressesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['AppCustomers', 'States', 'Cities']
        ];
        $appCustomerAddresses = $this->paginate($this->AppCustomerAddresses);

        $this->set(compact('appCustomerAddresses'));
        $this->set('_serialize', ['appCustomerAddresses']);
    }

    /**
     * View method
     *
     * @param string|null $id App Customer Address id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $appCustomerAddress = $this->AppCustomerAddresses->get($id, [
            'contain' => ['AppCustomers', 'States', 'Cities', 'AppOrders']
        ]);

        $this->set('appCustomerAddress', $appCustomerAddress);
        $this->set('_serialize', ['appCustomerAddress']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $appCustomerAddress = $this->AppCustomerAddresses->newEntity();
        if ($this->request->is('post')) {
            $appCustomerAddress = $this->AppCustomerAddresses->patchEntity($appCustomerAddress, $this->request->getData());
            if ($this->AppCustomerAddresses->save($appCustomerAddress)) {
                $this->Flash->success(__('The app customer address has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The app customer address could not be saved. Please, try again.'));
        }
        $appCustomers = $this->AppCustomerAddresses->AppCustomers->find('list', ['limit' => 200]);
        $states = $this->AppCustomerAddresses->States->find('list', ['limit' => 200]);
        $cities = $this->AppCustomerAddresses->Cities->find('list', ['limit' => 200]);
        $this->set(compact('appCustomerAddress', 'appCustomers', 'states', 'cities'));
        $this->set('_serialize', ['appCustomerAddress']);
    }

    /**
     * Edit method
     *
     * @param string|null $id App Customer Address id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $appCustomerAddress = $this->AppCustomerAddresses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appCustomerAddress = $this->AppCustomerAddresses->patchEntity($appCustomerAddress, $this->request->getData());
            if ($this->AppCustomerAddresses->save($appCustomerAddress)) {
                $this->Flash->success(__('The app customer address has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The app customer address could not be saved. Please, try again.'));
        }
        $appCustomers = $this->AppCustomerAddresses->AppCustomers->find('list', ['limit' => 200]);
        $states = $this->AppCustomerAddresses->States->find('list', ['limit' => 200]);
        $cities = $this->AppCustomerAddresses->Cities->find('list', ['limit' => 200]);
        $this->set(compact('appCustomerAddress', 'appCustomers', 'states', 'cities'));
        $this->set('_serialize', ['appCustomerAddress']);
    }

    /**
     * Delete method
     *
     * @param string|null $id App Customer Address id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $appCustomerAddress = $this->AppCustomerAddresses->get($id);
        if ($this->AppCustomerAddresses->delete($appCustomerAddress)) {
            $this->Flash->success(__('The app customer address has been deleted.'));
        } else {
            $this->Flash->error(__('The app customer address could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
