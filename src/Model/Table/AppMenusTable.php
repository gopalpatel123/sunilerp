<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AppMenus Model
 *
 * @property \App\Model\Table\AppMenusTable|\Cake\ORM\Association\BelongsTo $ParentAppMenus
 * @property \App\Model\Table\AppMenusTable|\Cake\ORM\Association\HasMany $ChildAppMenus
 *
 * @method \App\Model\Entity\AppMenu get($primaryKey, $options = [])
 * @method \App\Model\Entity\AppMenu newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AppMenu[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AppMenu|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppMenu patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AppMenu[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AppMenu findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TreeBehavior
 */
class AppMenusTable extends Table
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

        $this->setTable('app_menus');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Tree');

        $this->belongsTo('ParentAppMenus', [
            'className' => 'AppMenus',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('ChildAppMenus', [
            'className' => 'AppMenus',
            'foreignKey' => 'parent_id'
        ]);
		
		 $this->belongsTo('ParentStockGroups', [
            'className' => 'StockGroups',
            'foreignKey' => 'stock_group_id'
        ]);
		
		 $this->belongsTo('StockGroups');
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
            ->requirePresence('link', 'create')
            ->notEmpty('link');

       /*  $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->requirePresence('title_content', 'create')
            ->notEmpty('title_content'); */

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
        $rules->add($rules->existsIn(['parent_id'], 'ParentAppMenus'));

        return $rules;
    }
}
