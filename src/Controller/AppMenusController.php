<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AppMenus Controller
 *
 * @property \App\Model\Table\AppMenusTable $AppMenus
 *
 * @method \App\Model\Entity\AppMenu[] paginate($object = null, array $settings = [])
 */
class AppMenusController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
		$this->viewBuilder()->layout('index_layout');
		$user_id=$this->Auth->User('id');
		
        $this->paginate = [
            'contain' => ['ParentAppMenus']
        ];
        $appMenus = $this->paginate($this->AppMenus);

        $this->set(compact('appMenus'));
        $this->set('_serialize', ['appMenus']);
    }

    /**
     * View method
     *
     * @param string|null $id App Menu id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $appMenu = $this->AppMenus->get($id, [
            'contain' => ['ParentAppMenus', 'ChildAppMenus']
        ]);

        $this->set('appMenu', $appMenu);
        $this->set('_serialize', ['appMenu']);
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
		$user_id=$this->Auth->User('id');
        $appMenu = $this->AppMenus->newEntity();
        if ($this->request->is('post')) {
			
            $appMenu = $this->AppMenus->patchEntity($appMenu, $this->request->getData());
			$menu_icon=$this->request->getData('menu_icon');
            if ($this->AppMenus->save($appMenu)) {
				if(!empty($menu_icon['tmp_name'])){
						$item_error=$menu_icon['error'];
						if(empty($item_error))
							{
								$item_ext=explode('/',$menu_icon['type']);
								$item_item_image='menuicon'.time().'.'.$item_ext[1];
							}
				
						$keyname = 'MenuIcon/'.$appMenu->id.'/'.$item_item_image;
						$this->AwsFile->putObjectFile($keyname,$menu_icon['tmp_name'],$menu_icon['type']);
				
					$query = $this->AppMenus->query();
					$query->update()
					->set([
						'menu_icon' => $keyname
						])
					->where(['id' => $appMenu->id])
					->execute();
				}
                $this->Flash->success(__('The app menu has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The app menu could not be saved. Please, try again.'));
        }
        $parentAppMenus = $this->AppMenus->ParentAppMenus->find('list', ['limit' => 200]);
        $parentStockGroups = $this->AppMenus->ParentStockGroups->find('list')->where(['company_id'=>$company_id,'ParentStockGroups.is_status'=>'app']);
        $this->set(compact('appMenu', 'parentAppMenus','parentStockGroups'));
        $this->set('_serialize', ['appMenu']);
    }

    /**
     * Edit method
     *
     * @param string|null $id App Menu id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$this->viewBuilder()->layout('index_layout');
		$company_id=$this->Auth->User('session_company_id');
        $appMenu = $this->AppMenus->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appMenu = $this->AppMenus->patchEntity($appMenu, $this->request->getData());
			$menu_icon=$this->request->getData('menu_icon');
			$menu_icon_exist=$this->request->getData('menu_icon_exist');
			
			
				if(!empty($menu_icon['tmp_name']))
				{
					$this->request->data['menu_icon']=$menu_icon;			 
				}
				else
				{
					if(!empty($this->request->data['menu_icon_exist']))
					{
						$appMenu->menu_icon=$menu_icon_exist;	
					}
					else
					{
						$appMenu->menu_icon='';
					}
				}
            if ($this->AppMenus->save($appMenu)) {
				if(!empty($menu_icon['tmp_name'])){
						$item_error=$menu_icon['error'];
						if(empty($item_error))
							{
								$item_ext=explode('/',$menu_icon['type']);
								$item_item_image='menuicon'.time().'.'.$item_ext[1];
							}
						if(empty($files['error']))
						{
							$keyname = 'MenuIcon/'.$appMenu->id.'/'.$item_item_image;
							$this->AwsFile->putObjectFile($keyname,$menu_icon['tmp_name'],$menu_icon['type']);
							if(!empty($menu_icon_exist)){
								$this->AwsFile->deleteMatchingObjects($menu_icon_exist);
							}
							
						}
					$query = $this->AppMenus->query();
					$query->update()
					->set([
						'menu_icon' => $keyname
						])
					->where(['id' => $appMenu->id])
					->execute();
				}
                $this->Flash->success(__('The app menu has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The app menu could not be saved. Please, try again.'));
        }
        $parentAppMenus = $this->AppMenus->ParentAppMenus->find('list', ['limit' => 200]);
		$parentStockGroups = $this->AppMenus->ParentStockGroups->find('list')->where(['company_id'=>$company_id,'ParentStockGroups.is_status'=>'app']);
        $this->set(compact('appMenu', 'parentAppMenus','parentStockGroups'));
        $this->set('_serialize', ['appMenu']);
    }

    /**
     * Delete method
     *
     * @param string|null $id App Menu id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $appMenu = $this->AppMenus->get($id);
        if ($this->AppMenus->delete($appMenu)) {
            $this->Flash->success(__('The app menu has been deleted.'));
        } else {
            $this->Flash->error(__('The app menu could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
