<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ItemReviewRatings Model
 *
 * @property \App\Model\Table\ItemsTable|\Cake\ORM\Association\BelongsTo $Items
 * @property \App\Model\Table\AppCustomersTable|\Cake\ORM\Association\BelongsTo $AppCustomers
 *
 * @method \App\Model\Entity\ItemReviewRating get($primaryKey, $options = [])
 * @method \App\Model\Entity\ItemReviewRating newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ItemReviewRating[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ItemReviewRating|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ItemReviewRating patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ItemReviewRating[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ItemReviewRating findOrCreate($search, callable $callback = null, $options = [])
 */
class ItemReviewRatingsTable extends Table
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

        $this->setTable('item_review_ratings');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Items', [
            'foreignKey' => 'item_id',
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
            ->integer('item_id')
            ->allowEmpty('item_id', 'create');	

        $validator
            ->decimal('rating')
            ->requirePresence('rating', 'create')
            ->notEmpty('rating');

        $validator
            ->requirePresence('comment', 'create')
            ->notEmpty('comment');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        /* $validator
            ->dateTime('created_on')
            ->requirePresence('created_on', 'create')
            ->notEmpty('created_on'); */

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
        $rules->add($rules->existsIn(['app_customer_id'], 'AppCustomers'));

        return $rules;
    }
}
