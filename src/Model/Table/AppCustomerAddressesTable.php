<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AppCustomerAddresses Model
 *
 * @property \App\Model\Table\AppCustomersTable|\Cake\ORM\Association\BelongsTo $AppCustomers
 * @property \App\Model\Table\StatesTable|\Cake\ORM\Association\BelongsTo $States
 * @property \App\Model\Table\CitiesTable|\Cake\ORM\Association\BelongsTo $Cities
 * @property \App\Model\Table\AppOrdersTable|\Cake\ORM\Association\HasMany $AppOrders
 *
 * @method \App\Model\Entity\AppCustomerAddress get($primaryKey, $options = [])
 * @method \App\Model\Entity\AppCustomerAddress newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AppCustomerAddress[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AppCustomerAddress|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppCustomerAddress patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AppCustomerAddress[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AppCustomerAddress findOrCreate($search, callable $callback = null, $options = [])
 */
class AppCustomerAddressesTable extends Table
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

        $this->setTable('app_customer_addresses');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('AppCustomers', [
            'foreignKey' => 'app_customer_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('States', [
            'foreignKey' => 'state_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Cities', [
            'foreignKey' => 'city_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('AppOrders', [
            'foreignKey' => 'app_customer_address_id'
        ]);
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
            ->requirePresence('address_type', 'create')
            ->notEmpty('address_type');

        $validator
            ->requirePresence('mobile_no', 'create')
            ->notEmpty('mobile_no');

        $validator
            ->requirePresence('address', 'create')
            ->notEmpty('address');

        $validator
            ->requirePresence('area', 'create')
            ->notEmpty('area');

        $validator
            ->requirePresence('country', 'create')
            ->notEmpty('country');

        $validator
            ->requirePresence('pincode', 'create')
            ->notEmpty('pincode');

        $validator
            ->requirePresence('latitude', 'create')
            ->notEmpty('latitude');

        $validator
            ->requirePresence('longitude', 'create')
            ->notEmpty('longitude');

        $validator
            ->integer('default_address')
            ->requirePresence('default_address', 'create')
            ->notEmpty('default_address');

        $validator
            ->integer('is_deleted')
            ->requirePresence('is_deleted', 'create')
            ->notEmpty('is_deleted');

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
        $rules->add($rules->existsIn(['app_customer_id'], 'AppCustomers'));
        $rules->add($rules->existsIn(['state_id'], 'States'));
        $rules->add($rules->existsIn(['city_id'], 'Cities'));

        return $rules;
    }
}
