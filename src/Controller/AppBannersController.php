<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AppBanners Controller
 *
 * @property \App\Model\Table\AppBannersTable $AppBanners
 *
 * @method \App\Model\Entity\AppBanner[] paginate($object = null, array $settings = [])
 */
class AppBannersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($id =null)
    {
		$this->viewBuilder()->layout('index_layout');
		
		$company_id  = $this->Auth->User('session_company_id');
		$location_id = $this->Auth->User('session_location_id');
		$this->request->data['company_id'] =$company_id;
		
		$search = $this->request->query('search');
		$message = '';
		if(!empty($id)){
			 $appBanner = $this->AppBanners->get($id, [
				'contain' => []
			]);
			$message = 'The app-banner has been updated.';
		}else{
			$appBanner = $this->AppBanners->newEntity();
			$message = 'The app-banner has been saved.';
		}
        $this->paginate = [
            'contain' => ['StockGroups', 'Items']
        ];
        $appBanners = $this->paginate($this->AppBanners->find()->where([
		'OR' => [
            'AppBanners.link_name LIKE' => '%'.$search.'%',
			//...
			 'AppBanners.name LIKE' => '%'.$search.'%',	
			 //...
			 'StockGroups.name LIKE' => '%'.$search.'%',
			 
			'Items.name LIKE' => '%'.$search.'%'
		 ]]));
		
		$stockGroups = $this->AppBanners->Items->StockGroups->find()->where(['company_id'=>$company_id,'StockGroups.is_status'=>'app']);
		$options=[];
		$totSize=0;
		foreach($stockGroups as $stockgroup){
			$stockgroupsIds = $this->AppBanners->Items->StockGroups
							->find('children', ['for' => $stockgroup->id])
							->find('all');
			$totSize=(sizeof($stockgroupsIds->toArray()));
			if($totSize==0){
				$options[]=['text'=>$stockgroup->name,'value'=>$stockgroup->id];
			}
			
		}
        $this->set(compact('appBanners','appBanner','options','search'));
        $this->set('_serialize', ['appBanners']);
    }

   
    public function add()
    {
		$this->viewBuilder()->layout('index_layout');
		
		$company_id  = $this->Auth->User('session_company_id');
		$location_id = $this->Auth->User('session_location_id');
        $appBanner = $this->AppBanners->newEntity();
        if ($this->request->is('post')) {
            $appBanner = $this->AppBanners->patchEntity($appBanner, $this->request->getData());
			$banner_image=$this->request->getData('banner_image');
			//pr($appBanner);exit;
            if ($this->AppBanners->save($appBanner)) {
				
				if(!empty($banner_image['tmp_name'])){
						$item_error=$banner_image['error'];
						if(empty($item_error))
							{
								$item_ext=explode('/',$banner_image['type']);
								$item_item_image='banner'.time().'.'.$item_ext[1];																																																																											
							}
				
						$keyname = 'Banner/'.$appBanner->id.'/'.$item_item_image;
						$this->AwsFile->putObjectFile($keyname,$banner_image['tmp_name'],$banner_image['type']);
				
					$query = $this->AppBanners->query();
					$query->update()
					->set([
						'banner_image' => $keyname
						])
					->where(['id' => $appBanner->id])
					->execute();
				}
				
				
                $this->Flash->success(__('The app banner has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The app banner could not be saved. Please, try again.'));
        }
        $stockGroups = $this->AppBanners->Items->StockGroups->find()->where(['company_id'=>$company_id,'StockGroups.is_status'=>'app']);
		
		$options=[];
		$totSize=0;
		foreach($stockGroups as $stockgroup){
			$stockgroupsIds = $this->AppBanners->Items->StockGroups
							->find('children', ['for' => $stockgroup->id])
							->find('all');
			$totSize=(sizeof($stockgroupsIds->toArray()));
			if($totSize==0){
				$options[]=['text'=>$stockgroup->name,'value'=>$stockgroup->id];
			}
			
		}
        $items = $this->AppBanners->Items->find('list', ['limit' => 200]);
        $this->set(compact('appBanner', 'stockGroups', 'items','options'));
        $this->set('_serialize', ['appBanner']);
    }

    /**
     * Edit method
     *
     * @param string|null $id App Banner id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$this->viewBuilder()->layout('index_layout');
		
		$company_id  = $this->Auth->User('session_company_id');
		$location_id = $this->Auth->User('session_location_id');
		
        $appBanner = $this->AppBanners->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appBanner = $this->AppBanners->patchEntity($appBanner, $this->request->getData());
			$banner_image=$this->request->getData('banner_image');
			$banner_image_exist=$this->request->getData('banner_image_exist');
			
			if(!empty($banner_image['tmp_name']))
			{
				$this->request->data['banner_image']=$banner_image;			 
			}
			else
			{
				if(!empty($this->request->data['banner_image_exist']))
				{
					$appBanner->banner_image=$banner_image_exist;	
				}
				else
				{
					$appBanner->banner_image='';
				}
			}
			
			
            if ($this->AppBanners->save($appBanner)) {
				
				if(!empty($banner_image['tmp_name'])){
						$item_error=$banner_image['error'];
						if(empty($item_error))
							{
								$item_ext=explode('/',$banner_image['type']);
								$item_item_image='banner'.time().'.'.$item_ext[1];
							}
						if(empty($files['error']))
						{
							$keyname = 'Banner/'.$appBanner->id.'/'.$item_item_image;
							$this->AwsFile->putObjectFile($keyname,$banner_image['tmp_name'],$banner_image['type']);
							$this->AwsFile->deleteObjectFile($banner_image_exist);
						}
					$query = $this->AppBanners->query();
					$query->update()
					->set([
						'banner_image' => $keyname
						])
					->where(['id' => $appBanner->id])
					->execute();
				}
                $this->Flash->success(__('The app banner has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The app banner could not be saved. Please, try again.'));
        }
         $stockGroups = $this->AppBanners->Items->StockGroups->find()->where(['company_id'=>$company_id,'StockGroups.is_status'=>'app']);
		
		$options=[];
		$totSize=0;
		foreach($stockGroups as $stockgroup){
			$stockgroupsIds = $this->AppBanners->Items->StockGroups
							->find('children', ['for' => $stockgroup->id])
							->find('all');
			$totSize=(sizeof($stockgroupsIds->toArray()));
			if($totSize==0){
				$options[]=['text'=>$stockgroup->name,'value'=>$stockgroup->id];
			}
			
		}
        
        $this->set(compact('appBanner', 'options', 'items'));
        $this->set('_serialize', ['appBanner']);
    }

    /**
     * Delete method
     *
     * @param string|null $id App Banner id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $appBanner = $this->AppBanners->get($id);
        if ($this->AppBanners->delete($appBanner)) {
            $this->Flash->success(__('The app banner has been deleted.'));
        } else {
            $this->Flash->error(__('The app banner could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
