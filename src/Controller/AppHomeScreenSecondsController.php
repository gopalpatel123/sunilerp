<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AppHomeScreenSeconds Controller
 *
 * @property \App\Model\Table\AppHomeScreenSecondsTable $AppHomeScreenSeconds
 *
 * @method \App\Model\Entity\AppHomeScreenSecond[] paginate($object = null, array $settings = [])
 */
class AppHomeScreenSecondsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['StockGroups']
        ];
        $appHomeScreenSeconds = $this->paginate($this->AppHomeScreenSeconds);

        $this->set(compact('appHomeScreenSeconds'));
        $this->set('_serialize', ['appHomeScreenSeconds']);
    }

    /**
     * View method
     *
     * @param string|null $id App Home Screen Second id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $appHomeScreenSecond = $this->AppHomeScreenSeconds->get($id, [
            'contain' => ['StockGroups', 'SubCategories']
        ]);

        $this->set('appHomeScreenSecond', $appHomeScreenSecond);
        $this->set('_serialize', ['appHomeScreenSecond']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		$this->viewBuilder()->layout('index_layout');
        $appHomeScreen = $this->AppHomeScreenSeconds->newEntity();
		$company_id=$this->Auth->User('session_company_id');
        if ($this->request->is('post')) {
            $appHomeScreen = $this->AppHomeScreenSeconds->patchEntity($appHomeScreen, $this->request->getData());
			
			$link_names=$this->request->getData('link_name');
			$names=$this->request->getData('name');
			$stock_groups=$this->request->getData('stock_group_name');
			$multiple_images=$this->request->getData('multiple_image');
			$image=$this->request->getData('image');
			
			
            if ($this->AppHomeScreenSeconds->save($appHomeScreen)) {
				
				  $i=0;
				   if(!empty($multiple_images[0]['name'])){
					   foreach($multiple_images as $dataimage){
							$AppHomeScreenRows = $this->AppHomeScreenSeconds->AppHomeScreenSecondRows->newEntity();
							$name=$names[$i];
							$link_name=$link_names[$i];
							$stock_group=$stock_groups[$i];
							$multiple_image=$multiple_images[$i];
							
							$item_error=$multiple_image['error'];
							if(empty($item_error))
							{
								$item_ext=explode('/',$multiple_image['type']);
								$item_item_image='homescreen'.rand().'.'.$item_ext[1];
							}

							$keyname = 'HomescreenSecond/'.$appHomeScreen->id.'/'.$item_item_image;
							$this->AwsFile->putObjectFile($keyname,$multiple_image['tmp_name'],$multiple_image['type']);

							$AppHomeScreenRows->name=$name;
							$AppHomeScreenRows->link_name=$link_name;
							$AppHomeScreenRows->stock_group_id=$stock_group;
							$AppHomeScreenRows->app_home_screen_second_id=$appHomeScreen->id;
							$AppHomeScreenRows->image=$keyname;
							$this->AppHomeScreenSeconds->AppHomeScreenSecondRows->save($AppHomeScreenRows);
						
						$i++;	
					   }
					}
					
					
					if(!empty($image['tmp_name'])){
							$item_error=$image['error'];
							if(empty($item_error))
								{
									$item_ext=explode('/',$image['type']);
									$item_item_image='homescreen'.time().'.'.$item_ext[1];
								}
					
							$keyname = 'HomescreenSecond/'.$appHomeScreen->id.'/'.$item_item_image;
							$this->AwsFile->putObjectFile($keyname,$image['tmp_name'],$image['type']);
					
						$query = $this->AppHomeScreenSeconds->query();
						$query->update()
						->set([
							'image' => $keyname
							])
						->where(['id' => $appHomeScreen->id])
						->execute();
					}
				
                $this->Flash->success(__('The app home screen second has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The app home screen second could not be saved. Please, try again.'));
        }
        $stockGroups = $this->AppHomeScreenSeconds->StockGroups->find('list')->where(['company_id'=>$company_id,'StockGroups.is_status'=>'app','parent_id IS'=>null]);
        $parentStockGroups = $this->AppHomeScreenSeconds->StockGroups->ParentStockGroups->find('list')->where(['company_id'=>$company_id,'ParentStockGroups.is_status'=>'app']);
        $this->set(compact('appHomeScreen', 'stockGroups', 'parentStockGroups'));
        $this->set('_serialize', ['appHomeScreen']);
    }

    /**
     * Edit method
     *
     * @param string|null $id App Home Screen Second id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $appHomeScreenSecond = $this->AppHomeScreenSeconds->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appHomeScreenSecond = $this->AppHomeScreenSeconds->patchEntity($appHomeScreenSecond, $this->request->getData());
            if ($this->AppHomeScreenSeconds->save($appHomeScreenSecond)) {
                $this->Flash->success(__('The app home screen second has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The app home screen second could not be saved. Please, try again.'));
        }
        $stockGroups = $this->AppHomeScreenSeconds->StockGroups->find('list', ['limit' => 200]);
        $subCategories = $this->AppHomeScreenSeconds->SubCategories->find('list', ['limit' => 200]);
        $this->set(compact('appHomeScreenSecond', 'stockGroups', 'subCategories'));
        $this->set('_serialize', ['appHomeScreenSecond']);
    }

    /**
     * Delete method
     *
     * @param string|null $id App Home Screen Second id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $appHomeScreenSecond = $this->AppHomeScreenSeconds->get($id);
        if ($this->AppHomeScreenSeconds->delete($appHomeScreenSecond)) {
            $this->Flash->success(__('The app home screen second has been deleted.'));
        } else {
            $this->Flash->error(__('The app home screen second could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
