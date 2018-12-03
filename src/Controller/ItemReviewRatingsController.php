<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ItemReviewRatings Controller
 *
 * @property \App\Model\Table\ItemReviewRatingsTable $ItemReviewRatings
 *
 * @method \App\Model\Entity\ItemReviewRating[] paginate($object = null, array $settings = [])
 */
class ItemReviewRatingsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Items', 'AppCustomers']
        ];
        $itemReviewRatings = $this->paginate($this->ItemReviewRatings);

        $this->set(compact('itemReviewRatings'));
        $this->set('_serialize', ['itemReviewRatings']);
    }

    /**
     * View method
     *
     * @param string|null $id Item Review Rating id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $itemReviewRating = $this->ItemReviewRatings->get($id, [
            'contain' => ['Items', 'AppCustomers']
        ]);

        $this->set('itemReviewRating', $itemReviewRating);
        $this->set('_serialize', ['itemReviewRating']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $itemReviewRating = $this->ItemReviewRatings->newEntity();
        if ($this->request->is('post')) {
            $itemReviewRating = $this->ItemReviewRatings->patchEntity($itemReviewRating, $this->request->getData());
            if ($this->ItemReviewRatings->save($itemReviewRating)) {
                $this->Flash->success(__('The item review rating has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The item review rating could not be saved. Please, try again.'));
        }
        $items = $this->ItemReviewRatings->Items->find('list', ['limit' => 200]);
        $appCustomers = $this->ItemReviewRatings->AppCustomers->find('list', ['limit' => 200]);
        $this->set(compact('itemReviewRating', 'items', 'appCustomers'));
        $this->set('_serialize', ['itemReviewRating']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Item Review Rating id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $itemReviewRating = $this->ItemReviewRatings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $itemReviewRating = $this->ItemReviewRatings->patchEntity($itemReviewRating, $this->request->getData());
            if ($this->ItemReviewRatings->save($itemReviewRating)) {
                $this->Flash->success(__('The item review rating has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The item review rating could not be saved. Please, try again.'));
        }
        $items = $this->ItemReviewRatings->Items->find('list', ['limit' => 200]);
        $appCustomers = $this->ItemReviewRatings->AppCustomers->find('list', ['limit' => 200]);
        $this->set(compact('itemReviewRating', 'items', 'appCustomers'));
        $this->set('_serialize', ['itemReviewRating']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Item Review Rating id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $itemReviewRating = $this->ItemReviewRatings->get($id);
        if ($this->ItemReviewRatings->delete($itemReviewRating)) {
            $this->Flash->success(__('The item review rating has been deleted.'));
        } else {
            $this->Flash->error(__('The item review rating could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
