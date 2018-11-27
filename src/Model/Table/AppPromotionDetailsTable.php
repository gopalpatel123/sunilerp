<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AppPromotionDetails Model
 *
 * @property \App\Model\Table\AppPromotionsTable|\Cake\ORM\Association\BelongsTo $AppPromotions
 * @property \App\Model\Table\StockGroupsTable|\Cake\ORM\Association\BelongsTo $StockGroups
 * @property \App\Model\Table\ItemsTable|\Cake\ORM\Association\BelongsTo $Items
 * @property \App\Model\Table\GetItemsTable|\Cake\ORM\Association\BelongsTo $GetItems
 *
 * @method \App\Model\Entity\AppPromotionDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\AppPromotionDetail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AppPromotionDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AppPromotionDetail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppPromotionDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AppPromotionDetail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AppPromotionDetail findOrCreate($search, callable $callback = null, $options = [])
 */
class AppPromotionDetailsTable extends Table
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

        $this->setTable('app_promotion_details');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('AppPromotions', [
            'foreignKey' => 'app_promotion_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('StockGroups', [
            'foreignKey' => 'stock_group_id'
        ]);
        $this->belongsTo('Items', [
            'foreignKey' => 'item_id'
        ]);
        $this->belongsTo('GetItems', [
            'foreignKey' => 'get_item_id'
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

       /*  $validator
            ->decimal('order_value')
            ->allowEmpty('order_value');

        $validator
            ->decimal('discount_in_percentage')
            ->allowEmpty('discount_in_percentage');

        $validator
            ->decimal('discount_in_amount')
            ->allowEmpty('discount_in_amount');

        $validator
            ->decimal('discount_of_max_amount')
            ->allowEmpty('discount_of_max_amount');

        $validator
            ->requirePresence('coupon_name', 'create')
            ->notEmpty('coupon_name');

        $validator
            ->requirePresence('coupon_code', 'create')
            ->notEmpty('coupon_code');

        $validator
            ->decimal('buy_quntity')
            ->allowEmpty('buy_quntity');

        $validator
            ->decimal('get_quntity')
            ->allowEmpty('get_quntity');

        $validator
            ->requirePresence('narration', 'create')
            ->notEmpty('narration');

        $validator
            ->decimal('cash_back')
            ->allowEmpty('cash_back');

        $validator
            ->requirePresence('is_free_shipping', 'create')
            ->notEmpty('is_free_shipping'); */

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
        $rules->add($rules->existsIn(['app_promotion_id'], 'AppPromotions'));
        $rules->add($rules->existsIn(['stock_group_id'], 'StockGroups'));
        $rules->add($rules->existsIn(['item_id'], 'Items'));
      //  $rules->add($rules->existsIn(['get_item_id'], 'GetItems'));

        return $rules;
    }
}
