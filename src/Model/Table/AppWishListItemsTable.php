<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AppWishListItems Model
 *
 * @property \App\Model\Table\AppWishListsTable|\Cake\ORM\Association\BelongsTo $AppWishLists
 * @property \App\Model\Table\ItemsTable|\Cake\ORM\Association\BelongsTo $Items
 *
 * @method \App\Model\Entity\AppWishListItem get($primaryKey, $options = [])
 * @method \App\Model\Entity\AppWishListItem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AppWishListItem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AppWishListItem|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppWishListItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AppWishListItem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AppWishListItem findOrCreate($search, callable $callback = null, $options = [])
 */
class AppWishListItemsTable extends Table
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

        $this->setTable('app_wish_list_items');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('AppWishLists', [
            'foreignKey' => 'app_wish_list_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Items', [
            'foreignKey' => 'item_id',
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
            ->requirePresence('item_code', 'create')
            ->notEmpty('item_code');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

       /*  $validator
            ->dateTime('created_on')
            ->requirePresence('created_on', 'create')
            ->notEmpty('created_on');
 */
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
       // $rules->add($rules->existsIn(['app_wish_list_id'], 'AppWishLists'));
        //$rules->add($rules->existsIn(['item_id'], 'Items'));

        return $rules;
    }
}
