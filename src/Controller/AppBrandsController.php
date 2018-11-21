<?php
namespace App\Controller;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use App\Controller\AppController;

/**
 * AppBrands Controller
 *
 * @property \App\Model\Table\AppBrandsTable $AppBrands
 *
 * @method \App\Model\Entity\AppBrand[] paginate($object = null, array $settings = [])
 */
class AppBrandsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
		$this->viewBuilder()->layout('index_layout');
		$company_id=$this->Auth->User('session_company_id');
		
        $appBrands = $this->paginate($this->AppBrands);

        $this->set(compact('appBrands'));
        $this->set('_serialize', ['appBrands']);
    }

    /**
     * View method
     *
     * @param string|null $id App Brand id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $appBrand = $this->AppBrands->get($id, [
            'contain' => ['Items']
        ]);

        $this->set('appBrand', $appBrand);
        $this->set('_serialize', ['appBrand']);
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
        $appBrand = $this->AppBrands->newEntity();
        if ($this->request->is('post')) {
			$this->request->data['created_by']=$user_id;
		    $brand_image=$this->request->getData('brand_image');
			
            $appBrand = $this->AppBrands->patchEntity($appBrand, $this->request->getData());
				if($this->AppBrands->save($appBrand)) {
					if(!empty($brand_image['tmp_name'])){
					$extt=explode('/',$brand_image['type']);
					$ext=$extt[1];
					$setNewFileName = rand(1, 100000);
					$fullpath= WWW_ROOT."img".DS."brand".DS.$appBrand->id;
					$path = "/img/brand/".$appBrand->id."/".$setNewFileName .'.'.$ext;
					$res1 = is_dir($fullpath);
					if($res1 != 1) {
						new Folder($fullpath, true, 0777);
					}
						move_uploaded_file($brand_image['tmp_name'],$fullpath.DS.$setNewFileName .'.'. $ext);
					$query = $this->AppBrands->query();
					$query->update()
					->set([
						'brand_image' => $path
						])
					->where(['id' => $appBrand->id])
					->execute();
				}
                $this->Flash->success(__('The app brand has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The app brand could not be saved. Please, try again.'));
        }
        $this->set(compact('appBrand'));
        $this->set('_serialize', ['appBrand']);
    }

    /**
     * Edit method
     *
     * @param string|null $id App Brand id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$this->viewBuilder()->layout('index_layout');
		$company_id=$this->Auth->User('session_company_id');
		
        $appBrand = $this->AppBrands->get($id, [
            'contain' => []
        ]);
		$old_brand_image=$appBrand->brand_image;
        if ($this->request->is(['patch', 'post', 'put'])) {
			$brand_image=$this->request->getData('brand_image');
			$this->request->data['brand_image']=$old_brand_image;
            $appBrand = $this->AppBrands->patchEntity($appBrand, $this->request->getData());
            if ($this->AppBrands->save($appBrand)) {
				
				if(!empty($brand_image['tmp_name'])){
					$extt=explode('/',$brand_image['type']);
					$ext=$extt[1];
					$setNewFileName = rand(1, 100000);
					$fullpath= WWW_ROOT."img".DS."brand".DS.$appBrand->id;
					$path = "/img/brand/".$appBrand->id."/".$setNewFileName .'.'.$ext;
					$res1 = is_dir($fullpath);
					if($res1 != 1) {
						new Folder($fullpath, true, 0777);
					}
						move_uploaded_file($brand_image['tmp_name'],$fullpath.DS.$setNewFileName .'.'. $ext);
					$query = $this->AppBrands->query();
					$query->update()
					->set([
						'brand_image' => $path
						])
					->where(['id' => $appBrand->id])
					->execute();
				}
				
				
                $this->Flash->success(__('The app brand has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The app brand could not be saved. Please, try again.'));
        }
        $this->set(compact('appBrand'));
        $this->set('_serialize', ['appBrand']);
    }

    /**
     * Delete method
     *
     * @param string|null $id App Brand id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $appBrand = $this->AppBrands->get($id);
        if ($this->AppBrands->delete($appBrand)) {
            $this->Flash->success(__('The app brand has been deleted.'));
        } else {
            $this->Flash->error(__('The app brand could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
