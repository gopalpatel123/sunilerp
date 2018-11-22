<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DeliveryCharges Controller
 *
 * @property \App\Model\Table\DeliveryChargesTable $DeliveryCharges
 *
 * @method \App\Model\Entity\DeliveryCharge[] paginate($object = null, array $settings = [])
 */
class DeliveryChargesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($id=null)
    {
		$this->viewBuilder()->layout('index_layout');
        $this->paginate = [
            'contain' => ['Cities']
        ];
		$search = $this->request->query('search');
        $deliveryCharges = $this->paginate($this->DeliveryCharges->find()->where([
		'OR' => [
            'DeliveryCharges.amount' => $search,
			//...
			'DeliveryCharges.charge LIKE' => '%'.$search.'%',
			//...
			'DeliveryCharges.status LIKE' => '%'.$search.'%',
			//...
			'Cities.name LIKE' => '%'.$search.'%'
		 ]]));
		$message='';
		if(!empty($id)){
			 $deliveryCharge = $this->DeliveryCharges->get($id);
			 $message='The delivery charge has been updated.';
		}else{
			$deliveryCharge = $this->DeliveryCharges->newEntity();
			$message='The delivery charge has been saved.';
		}
		
        if ($this->request->is(['post','put','patch'])) {
            $deliveryCharge = $this->DeliveryCharges->patchEntity($deliveryCharge, $this->request->getData());
			//pr($deliveryCharge);exit;
            if ($this->DeliveryCharges->save($deliveryCharge)) {
                $this->Flash->success(__($message));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The delivery charge could not be saved. Please, try again.'));
        }
        $cities = $this->DeliveryCharges->Cities->find('list', ['limit' => 200]);
        $this->set(compact('deliveryCharges','deliveryCharge','cities','id','search'));
        $this->set('_serialize', ['deliveryCharges']);
    }

    /**
     * View method
     *
     * @param string|null $id Delivery Charge id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $deliveryCharge = $this->DeliveryCharges->get($id, [
            'contain' => ['Cities', 'AppOrders']
        ]);

        $this->set('deliveryCharge', $deliveryCharge);
        $this->set('_serialize', ['deliveryCharge']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		$this->viewBuilder()->layout('index_layout');
        $deliveryCharge = $this->DeliveryCharges->newEntity();
        if ($this->request->is('post')) {
            $deliveryCharge = $this->DeliveryCharges->patchEntity($deliveryCharge, $this->request->getData());
            if ($this->DeliveryCharges->save($deliveryCharge)) {
                $this->Flash->success(__('The delivery charge has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The delivery charge could not be saved. Please, try again.'));
        }
        $cities = $this->DeliveryCharges->Cities->find('list', ['limit' => 200]);
        $this->set(compact('deliveryCharge', 'cities'));
        $this->set('_serialize', ['deliveryCharge']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Delivery Charge id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $deliveryCharge = $this->DeliveryCharges->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $deliveryCharge = $this->DeliveryCharges->patchEntity($deliveryCharge, $this->request->getData());
            if ($this->DeliveryCharges->save($deliveryCharge)) {
                $this->Flash->success(__('The delivery charge has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The delivery charge could not be saved. Please, try again.'));
        }
        $cities = $this->DeliveryCharges->Cities->find('list', ['limit' => 200]);
        $this->set(compact('deliveryCharge', 'cities'));
        $this->set('_serialize', ['deliveryCharge']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Delivery Charge id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $deliveryCharge = $this->DeliveryCharges->get($id);
        if ($this->DeliveryCharges->delete($deliveryCharge)) {
            $this->Flash->success(__('The delivery charge has been deleted.'));
        } else {
            $this->Flash->error(__('The delivery charge could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
