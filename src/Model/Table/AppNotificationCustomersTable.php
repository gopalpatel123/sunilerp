<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AppNotificationCustomers Model
 *
 * @property \App\Model\Table\AppNotificationsTable|\Cake\ORM\Association\BelongsTo $AppNotifications
 * @property \App\Model\Table\AppCustomersTable|\Cake\ORM\Association\BelongsTo $AppCustomers
 *
 * @method \App\Model\Entity\AppNotificationCustomer get($primaryKey, $options = [])
 * @method \App\Model\Entity\AppNotificationCustomer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AppNotificationCustomer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AppNotificationCustomer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppNotificationCustomer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AppNotificationCustomer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AppNotificationCustomer findOrCreate($search, callable $callback = null, $options = [])
 */
class AppNotificationCustomersTable extends Table
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

        $this->setTable('app_notification_customers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('AppNotifications', [
            'foreignKey' => 'app_notification_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('AppCustomers', [
            'foreignKey' => 'app_customer_id',
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
            ->integer('sent')
            ->requirePresence('sent', 'create')
            ->notEmpty('sent');

        $validator
            ->dateTime('send_on')
            ->requirePresence('send_on', 'create')
            ->notEmpty('send_on');

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
        $rules->add($rules->existsIn(['app_notification_id'], 'AppNotifications'));
        $rules->add($rules->existsIn(['app_customer_id'], 'AppCustomers'));

        return $rules;
    }
}
