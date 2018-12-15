<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AppOrders Model
 *
 * @property \App\Model\Table\AppCustomersTable|\Cake\ORM\Association\BelongsTo $AppCustomers
 * @property \App\Model\Table\AppCustomerAddressesTable|\Cake\ORM\Association\BelongsTo $AppCustomerAddresses
 * @property \App\Model\Table\DeliveryChargesTable|\Cake\ORM\Association\BelongsTo $DeliveryCharges
 * @property \App\Model\Table\AppOrderDetailsTable|\Cake\ORM\Association\HasMany $AppOrderDetails
 *
 * @method \App\Model\Entity\AppOrder get($primaryKey, $options = [])
 * @method \App\Model\Entity\AppOrder newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AppOrder[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AppOrder|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppOrder patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AppOrder[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AppOrder findOrCreate($search, callable $callback = null, $options = [])
 */
class AppOrdersTable extends Table
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

        $this->setTable('app_orders');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
		
		$this->belongsTo('Carts');
		
        $this->belongsTo('AppCustomers', [
            'foreignKey' => 'app_customer_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('AppCustomerAddresses', [
            'foreignKey' => 'app_customer_address_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('DeliveryCharges', [
            'foreignKey' => 'delivery_charge_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('AppOrderDetails', [
            'foreignKey' => 'app_order_id'
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
            ->requirePresence('customer_address_info', 'create')
            ->notEmpty('customer_address_info');

        $validator
            ->requirePresence('order_no', 'create')
            ->notEmpty('order_no');

        $validator
            ->integer('voucher_no')
            ->requirePresence('voucher_no', 'create')
            ->notEmpty('voucher_no');

       

      /*   
	  
	   $validator
            ->requirePresence('ccavvenue_tracking_no', 'create')
            ->notEmpty('ccavvenue_tracking_no');
	  
	  $validator
            ->requirePresence('ccavvenue_order_no', 'create')
            ->notEmpty('ccavvenue_order_no');

        $validator
            ->decimal('discount_percent')
            ->requirePresence('discount_percent', 'create')
            ->notEmpty('discount_percent');

        $validator
            ->decimal('total_gst')
            ->requirePresence('total_gst', 'create')
            ->notEmpty('total_gst');

        $validator
            ->decimal('grand_total')
            ->requirePresence('grand_total', 'create')
            ->notEmpty('grand_total');

        $validator
            ->decimal('round_off')
            ->requirePresence('round_off', 'create')
            ->notEmpty('round_off');

        $validator
            ->requirePresence('delivery_charge_amount', 'create')
            ->notEmpty('delivery_charge_amount');
 */
        $validator
            ->requirePresence('order_type', 'create')
            ->notEmpty('order_type');

        $validator
            ->date('delivery_date')
            ->requirePresence('delivery_date', 'create')
            ->notEmpty('delivery_date');

        $validator
            ->requirePresence('order_status', 'create')
            ->notEmpty('order_status');

        $validator
            ->date('order_date')
            ->requirePresence('order_date', 'create')
            ->notEmpty('order_date');

       

        $validator
            ->requirePresence('order_from', 'create')
            ->notEmpty('order_from');

       /* 
		 $validator
            ->requirePresence('payment_status', 'create')
            ->notEmpty('payment_status');

	   $validator
            ->requirePresence('narration', 'create')
            ->notEmpty('narration');

        $validator
            ->dateTime('packing_on')
            ->requirePresence('packing_on', 'create')
            ->notEmpty('packing_on');

        $validator
            ->requirePresence('packing_flag', 'create')
            ->notEmpty('packing_flag');

        $validator
            ->dateTime('dispatch_on')
            ->requirePresence('dispatch_on', 'create')
            ->notEmpty('dispatch_on');

        $validator
            ->requirePresence('dispatch_flag', 'create')
            ->notEmpty('dispatch_flag');

        $validator
            ->requirePresence('is_applicable_for_cancel', 'create')
            ->notEmpty('is_applicable_for_cancel'); */

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
        $rules->add($rules->existsIn(['app_customer_address_id'], 'AppCustomerAddresses'));
        $rules->add($rules->existsIn(['delivery_charge_id'], 'DeliveryCharges'));

        return $rules;
    }
}
