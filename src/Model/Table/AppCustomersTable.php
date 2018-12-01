<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AppCustomers Model
 *
 * @property \App\Model\Table\AppCustomerAddressesTable|\Cake\ORM\Association\HasMany $AppCustomerAddresses
 * @property \App\Model\Table\AppNotificationCustomersTable|\Cake\ORM\Association\HasMany $AppNotificationCustomers
 * @property \App\Model\Table\AppOrdersTable|\Cake\ORM\Association\HasMany $AppOrders
 * @property \App\Model\Table\AppWishListsTable|\Cake\ORM\Association\HasMany $AppWishLists
 * @property \App\Model\Table\CartsTable|\Cake\ORM\Association\HasMany $Carts
 * @property \App\Model\Table\ItemReviewRatingsTable|\Cake\ORM\Association\HasMany $ItemReviewRatings
 *
 * @method \App\Model\Entity\AppCustomer get($primaryKey, $options = [])
 * @method \App\Model\Entity\AppCustomer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AppCustomer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AppCustomer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppCustomer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AppCustomer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AppCustomer findOrCreate($search, callable $callback = null, $options = [])
 */
class AppCustomersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('app_customers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('AppCustomerAddresses', [
            'foreignKey' => 'app_customer_id'
        ]);
        $this->hasMany('AppNotificationCustomers', [
            'foreignKey' => 'app_customer_id'
        ]);
        $this->hasMany('AppOrders', [
            'foreignKey' => 'app_customer_id'
        ]);
        $this->hasMany('AppWishLists', [
            'foreignKey' => 'app_customer_id'
        ]);
        $this->hasMany('Carts', [
            'foreignKey' => 'app_customer_id'
        ]);
        $this->hasMany('ItemReviewRatings', [
            'foreignKey' => 'app_customer_id'
        ]);
		
		  $this->belongsTo('VerifyOtps');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('mobile', 'create')
            ->notEmpty('mobile');
           // ->add('mobile', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

      

        $validator
            ->requirePresence('otp', 'create')
            ->notEmpty('otp');

       /*  $validator
            ->dateTime('created_on')
            ->requirePresence('created_on', 'create')
            ->notEmpty('created_on');

        $validator
            ->requirePresence('mobile_verify', 'create')
            ->notEmpty('mobile_verify');

        $validator
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->requirePresence('image_url', 'create')
            ->notEmpty('image_url');

        $validator
            ->requirePresence('social_type', 'create')
            ->notEmpty('social_type');

        $validator
            ->requirePresence('device_token', 'create')
            ->notEmpty('device_token');

        $validator
            ->requirePresence('social_image', 'create')
            ->notEmpty('social_image');
			
	    $validator
            ->requirePresence('username', 'create')
            ->notEmpty('username');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password'); */

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));
       // $rules->add($rules->isUnique(['username']));
        //$rules->add($rules->isUnique(['mobile']));

        return $rules;
    }
	
	
}
