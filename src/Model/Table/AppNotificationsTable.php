<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AppNotifications Model
 *
 * @property \App\Model\Table\ItemsTable|\Cake\ORM\Association\BelongsTo $Items
 * @property \App\Model\Table\AppWishListsTable|\Cake\ORM\Association\BelongsTo $AppWishLists
 * @property \App\Model\Table\StockGroupsTable|\Cake\ORM\Association\BelongsTo $StockGroups
 * @property \App\Model\Table\AppNotificationCustomersTable|\Cake\ORM\Association\HasMany $AppNotificationCustomers
 *
 * @method \App\Model\Entity\AppNotification get($primaryKey, $options = [])
 * @method \App\Model\Entity\AppNotification newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AppNotification[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AppNotification|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppNotification patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AppNotification[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AppNotification findOrCreate($search, callable $callback = null, $options = [])
 */
class AppNotificationsTable extends Table
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

        $this->setTable('app_notifications');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Items', [
            'foreignKey' => 'item_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('AppWishLists', [
            'foreignKey' => 'app_wish_list_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('StockGroups', [
            'foreignKey' => 'stock_group_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('AppNotificationCustomers', [
            'foreignKey' => 'app_notification_id'
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
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->requirePresence('message', 'create')
            ->notEmpty('message');

        $validator
            ->requirePresence('image_app', 'create')
            ->notEmpty('image_app');

        $validator
            ->requirePresence('app_link', 'create')
            ->notEmpty('app_link');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('screen_type', 'create')
            ->notEmpty('screen_type');

        $validator
            ->integer('created_by')
            ->requirePresence('created_by', 'create')
            ->notEmpty('created_by');

        $validator
            ->dateTime('created_on')
            ->requirePresence('created_on', 'create')
            ->notEmpty('created_on');

        $validator
            ->integer('edited_by')
            ->requirePresence('edited_by', 'create')
            ->notEmpty('edited_by');

        $validator
            ->dateTime('edited_on')
            ->requirePresence('edited_on', 'create')
            ->notEmpty('edited_on');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->requirePresence('notification_type', 'create')
            ->notEmpty('notification_type');

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
        $rules->add($rules->existsIn(['item_id'], 'Items'));
        $rules->add($rules->existsIn(['app_wish_list_id'], 'AppWishLists'));
        $rules->add($rules->existsIn(['stock_group_id'], 'StockGroups'));

        return $rules;
    }
}
