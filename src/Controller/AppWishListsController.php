<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AppWishLists Controller
 *
 * @property \App\Model\Table\AppWishListsTable $AppWishLists
 *
 * @method \App\Model\Entity\AppWishList[] paginate($object = null, array $settings = [])
 */
class AppWishListsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['AppCustomers']
        ];
        $appWishLists = $this->paginate($this->AppWishLists);

        $this->set(compact('appWishLists'));
        $this->set('_serialize', ['appWishLists']);
    }

    /**
     * View method
     *
     * @param string|null $id App Wish List id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $appWishList = $this->AppWishLists->get($id, [
            'contain' => ['AppCustomers', 'AppNotifications']
        ]);

        $this->set('appWishList', $appWishList);
        $this->set('_serialize', ['appWishList']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $appWishList = $this->AppWishLists->newEntity();
        if ($this->request->is('post')) {
            $appWishList = $this->AppWishLists->patchEntity($appWishList, $this->request->getData());
            if ($this->AppWishLists->save($appWishList)) {
                $this->Flash->success(__('The app wish list has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The app wish list could not be saved. Please, try again.'));
        }
        $appCustomers = $this->AppWishLists->AppCustomers->find('list', ['limit' => 200]);
        $this->set(compact('appWishList', 'appCustomers'));
        $this->set('_serialize', ['appWishList']);
    }

    /**
     * Edit method
     *
     * @param string|null $id App Wish List id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $appWishList = $this->AppWishLists->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appWishList = $this->AppWishLists->patchEntity($appWishList, $this->request->getData());
            if ($this->AppWishLists->save($appWishList)) {
                $this->Flash->success(__('The app wish list has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The app wish list could not be saved. Please, try again.'));
        }
        $appCustomers = $this->AppWishLists->AppCustomers->find('list', ['limit' => 200]);
        $this->set(compact('appWishList', 'appCustomers'));
        $this->set('_serialize', ['appWishList']);
    }

    /**
     * Delete method
     *
     * @param string|null $id App Wish List id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $appWishList = $this->AppWishLists->get($id);
        if ($this->AppWishLists->delete($appWishList)) {
            $this->Flash->success(__('The app wish list has been deleted.'));
        } else {
            $this->Flash->error(__('The app wish list could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
