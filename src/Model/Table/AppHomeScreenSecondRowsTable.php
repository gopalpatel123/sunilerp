<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AppHomeScreenSecondRows Model
 *
 * @property \App\Model\Table\AppHomeScreenSecondsTable|\Cake\ORM\Association\BelongsTo $AppHomeScreenSeconds
 * @property \App\Model\Table\StockGroupsTable|\Cake\ORM\Association\BelongsTo $StockGroups
 *
 * @method \App\Model\Entity\AppHomeScreenSecondRow get($primaryKey, $options = [])
 * @method \App\Model\Entity\AppHomeScreenSecondRow newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AppHomeScreenSecondRow[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AppHomeScreenSecondRow|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppHomeScreenSecondRow patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AppHomeScreenSecondRow[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AppHomeScreenSecondRow findOrCreate($search, callable $callback = null, $options = [])
 */
class AppHomeScreenSecondRowsTable extends Table
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

        $this->setTable('app_home_screen_second_rows');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('AppHomeScreenSeconds', [
            'foreignKey' => 'app_home_screen_second_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('StockGroups', [
            'foreignKey' => 'stock_group_id',
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

       /*  $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('image', 'create')
            ->notEmpty('image');

        $validator
            ->requirePresence('link_name', 'create')
            ->notEmpty('link_name'); */

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
        $rules->add($rules->existsIn(['app_home_screen_second_id'], 'AppHomeScreenSeconds'));
        //$rules->add($rules->existsIn(['stock_group_id'], 'StockGroups'));

        return $rules;
    }
}
