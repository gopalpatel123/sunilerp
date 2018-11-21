<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AppHomeScreens Controller
 *
 * @property \App\Model\Table\AppHomeScreensTable $AppHomeScreens
 *
 * @method \App\Model\Entity\AppHomeScreen[] paginate($object = null, array $settings = [])
 */
class AppHomeScreensController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
		$this->viewBuilder()->layout('index_layout');
        $this->paginate = [
            'contain' => ['StockGroups']
        ];
        $appHomeScreens = $this->paginate($this->AppHomeScreens);

        $this->set(compact('appHomeScreens'));
        $this->set('_serialize', ['appHomeScreens']);
    }

    /**
     * View method
     *
     * @param string|null $id App Home Screen id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $appHomeScreen = $this->AppHomeScreens->get($id, [
            'contain' => ['StockGroups']
        ]);

        $this->set('appHomeScreen', $appHomeScreen);
        $this->set('_serialize', ['appHomeScreen']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		$this->viewBuilder()->layout('index_layout');
        $appHomeScreen = $this->AppHomeScreens->newEntity();
		$company_id=$this->Auth->User('session_company_id');
        if ($this->request->is('post')) {
            $appHomeScreen = $this->AppHomeScreens->patchEntity($appHomeScreen, $this->request->getData());
			//pr($appHomeScreen);exit;
            if ($this->AppHomeScreens->save($appHomeScreen)) {
                $this->Flash->success(__('The app home screen has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The app home screen could not be saved. Please, try again.'));
        }
		 $parentStockGroups = $this->AppHomeScreens->StockGroups->ParentStockGroups->find('list')->where(['company_id'=>$company_id,'ParentStockGroups.is_status'=>'app']);
		 
        $this->set(compact('appHomeScreen', 'parentStockGroups','appHomeScreens'));
        $this->set('_serialize', ['appHomeScreen']);
    }

    /**
     * Edit method
     *
     * @param string|null $id App Home Screen id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$this->viewBuilder()->layout('index_layout');
		$company_id=$this->Auth->User('session_company_id');
        $appHomeScreen = $this->AppHomeScreens->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appHomeScreen = $this->AppHomeScreens->patchEntity($appHomeScreen, $this->request->getData());
            if ($this->AppHomeScreens->save($appHomeScreen)) {
                $this->Flash->success(__('The app home screen has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The app home screen could not be saved. Please, try again.'));
        }
        $parentStockGroups = $this->AppHomeScreens->StockGroups->ParentStockGroups->find('list')->where(['company_id'=>$company_id,'ParentStockGroups.is_status'=>'app']);
        $this->set(compact('appHomeScreen', 'parentStockGroups'));
        $this->set('_serialize', ['appHomeScreen']);
    }

    /**
     * Delete method
     *
     * @param string|null $id App Home Screen id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $appHomeScreen = $this->AppHomeScreens->get($id);
        if ($this->AppHomeScreens->delete($appHomeScreen)) {
            $this->Flash->success(__('The app home screen has been deleted.'));
        } else {
            $this->Flash->error(__('The app home screen could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
