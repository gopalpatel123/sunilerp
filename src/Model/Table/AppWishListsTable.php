<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AppWishLists Model
 *
 * @property \App\Model\Table\AppCustomersTable|\Cake\ORM\Association\BelongsTo $AppCustomers
 * @property \App\Model\Table\AppNotificationsTable|\Cake\ORM\Association\HasMany $AppNotifications
 * @property \App\Model\Table\AppWishListItemsTable|\Cake\ORM\Association\HasMany $AppWishListItems
 *
 * @method \App\Model\Entity\AppWishList get($primaryKey, $options = [])
 * @method \App\Model\Entity\AppWishList newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AppWishList[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AppWishList|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppWishList patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AppWishList[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AppWishList findOrCreate($search, callable $callback = null, $options = [])
 */
class AppWishListsTable extends Table
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

        $this->setTable('app_wish_lists');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('AppCustomers', [
            'foreignKey' => 'app_customer_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('AppNotifications', [
            'foreignKey' => 'app_wish_list_id'
        ]);
        $this->hasMany('AppWishListItems', [
            'foreignKey' => 'app_wish_list_id'
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
            ->dateTime('created_on')
            ->requirePresence('created_on', 'create')
            ->notEmpty('created_on'); */

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

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
        //$rules->add($rules->existsIn(['app_customer_id'], 'AppCustomers'));

        return $rules;
    }
}
