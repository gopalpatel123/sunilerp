<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AppOrderDetails Model
 *
 * @property \App\Model\Table\AppOrdersTable|\Cake\ORM\Association\BelongsTo $AppOrders
 * @property \App\Model\Table\ItemsTable|\Cake\ORM\Association\BelongsTo $Items
 * @property \App\Model\Table\GstFiguresTable|\Cake\ORM\Association\BelongsTo $GstFigures
 *
 * @method \App\Model\Entity\AppOrderDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\AppOrderDetail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AppOrderDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AppOrderDetail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppOrderDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AppOrderDetail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AppOrderDetail findOrCreate($search, callable $callback = null, $options = [])
 */
class AppOrderDetailsTable extends Table
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

        $this->setTable('app_order_details');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('AppOrders', [
            'foreignKey' => 'app_order_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Items', [
            'foreignKey' => 'item_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('GstFigures', [
            'foreignKey' => 'gst_figure_id',
            'joinType' => 'INNER'
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
            ->decimal('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmpty('quantity');

        $validator
            ->decimal('rate')
            ->requirePresence('rate', 'create')
            ->notEmpty('rate');

        $validator
            ->decimal('amount')
            ->requirePresence('amount', 'create')
            ->notEmpty('amount');

      /*   $validator
            ->decimal('discount_percent')
            ->requirePresence('discount_percent', 'create')
            ->notEmpty('discount_percent');

        $validator
            ->decimal('discount_amount')
            ->requirePresence('discount_amount', 'create')
            ->notEmpty('discount_amount');

        $validator
            ->decimal('promo_percent')
            ->requirePresence('promo_percent', 'create')
            ->notEmpty('promo_percent');

        $validator
            ->decimal('promo_amount')
            ->requirePresence('promo_amount', 'create')
            ->notEmpty('promo_amount');

        $validator
            ->decimal('taxable_value')
            ->requirePresence('taxable_value', 'create')
            ->notEmpty('taxable_value');

        $validator
            ->decimal('gst_percentage')
            ->requirePresence('gst_percentage', 'create')
            ->notEmpty('gst_percentage');

        $validator
            ->decimal('gst_value')
            ->requirePresence('gst_value', 'create')
            ->notEmpty('gst_value');

        $validator
            ->decimal('net_amount')
            ->requirePresence('net_amount', 'create')
            ->notEmpty('net_amount');

        $validator
            ->requirePresence('is_item_cancel', 'create')
            ->notEmpty('is_item_cancel'); */

        $validator
            ->requirePresence('item_status', 'create')
            ->notEmpty('item_status');

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
        $rules->add($rules->existsIn(['app_order_id'], 'AppOrders'));
        $rules->add($rules->existsIn(['item_id'], 'Items'));
        $rules->add($rules->existsIn(['gst_figure_id'], 'GstFigures'));

        return $rules;
    }
}
