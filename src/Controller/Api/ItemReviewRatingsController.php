<?php
namespace App\Controller\Api;
use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;
use Firebase\JWT\JWT;
use Cake\Validation\Validation;
class ItemReviewRatingsController extends AppController
{
	public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['addReviewRatings']);
    }
	
    public function addReviewRatings()
    {
		$app_customer_id=$this->request->getData('app_customer_id');
		$AppCustomersExists = $this->ItemReviewRatings->AppCustomers->exists(['id' => $app_customer_id]);
			if($AppCustomersExists){
				 $itemReviewRating = $this->ItemReviewRatings->newEntity();
				if ($this->request->is('post')) {
					$itemReviewRating = $this->ItemReviewRatings->patchEntity($itemReviewRating, $this->request->getData());
					if ($this->ItemReviewRatings->save($itemReviewRating)) {
						$success = true;
						$message = 'Item review rating added';
						$error_msg=[];
					}else{
						if($itemReviewRating->errors()){
							$error_msg = [];
							$i=0;
							foreach( $itemReviewRating->errors() as $key=>$errors){ 
								if(is_array($errors)){
									foreach($errors as $error){
										$error_msg[$i][$key]    =   $error;
									}
								}else{
									$error_msg[$i][$key]    =   $errors;
								}$i++;
							}

							if(!empty($error_msg)){
								$success = false;
								$message = "Please fix the following error(s):";

							}
						}
					}
				}	
			}else{
				$success = false;
				$message = "No Data Found";
				$error_msg=[];
			}
        $this->set(compact(['error_msg','success','message']));
		$this->set('_serialize', ['success','message','error_msg']);
    }

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
