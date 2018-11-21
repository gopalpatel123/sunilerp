<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AppCustomers Controller
 *
 * @property \App\Model\Table\AppCustomersTable $AppCustomers
 *
 * @method \App\Model\Entity\AppCustomer[] paginate($object = null, array $settings = [])
 */
class AppCustomersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $appCustomers = $this->paginate($this->AppCustomers);

        $this->set(compact('appCustomers'));
        $this->set('_serialize', ['appCustomers']);
    }

    /**
     * View method
     *
     * @param string|null $id App Customer id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $appCustomer = $this->AppCustomers->get($id, [
            'contain' => ['AppCustomerAddresses', 'AppNotificationCustomers', 'AppOrders', 'AppWishLists', 'Carts', 'ItemReviewRatings']
        ]);

        $this->set('appCustomer', $appCustomer);
        $this->set('_serialize', ['appCustomer']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $appCustomer = $this->AppCustomers->newEntity();
        if ($this->request->is('post')) {
            $appCustomer = $this->AppCustomers->patchEntity($appCustomer, $this->request->getData());
            if ($this->AppCustomers->save($appCustomer)) {
                $this->Flash->success(__('The app customer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The app customer could not be saved. Please, try again.'));
        }
        $this->set(compact('appCustomer'));
        $this->set('_serialize', ['appCustomer']);
    }

    /**
     * Edit method
     *
     * @param string|null $id App Customer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $appCustomer = $this->AppCustomers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appCustomer = $this->AppCustomers->patchEntity($appCustomer, $this->request->getData());
            if ($this->AppCustomers->save($appCustomer)) {
                $this->Flash->success(__('The app customer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The app customer could not be saved. Please, try again.'));
        }
        $this->set(compact('appCustomer'));
        $this->set('_serialize', ['appCustomer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id App Customer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $appCustomer = $this->AppCustomers->get($id);
        if ($this->AppCustomers->delete($appCustomer)) {
            $this->Flash->success(__('The app customer has been deleted.'));
        } else {
            $this->Flash->error(__('The app customer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
