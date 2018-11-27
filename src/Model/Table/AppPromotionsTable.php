<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AppPromotions Model
 *
 * @property \App\Model\Table\AppPromotionDetailsTable|\Cake\ORM\Association\HasMany $AppPromotionDetails
 *
 * @method \App\Model\Entity\AppPromotion get($primaryKey, $options = [])
 * @method \App\Model\Entity\AppPromotion newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AppPromotion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AppPromotion|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppPromotion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AppPromotion[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AppPromotion findOrCreate($search, callable $callback = null, $options = [])
 */
class AppPromotionsTable extends Table
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

        $this->setTable('app_promotions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('AppPromotionDetails', [
            'foreignKey' => 'app_promotion_id',
			'saveStrategy'=>'replace'
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
            ->requirePresence('offer_name', 'create')
            ->notEmpty('offer_name');

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->dateTime('start_date')
            ->requirePresence('start_date', 'create')
            ->notEmpty('start_date');

        $validator
            ->dateTime('end_date')
            ->requirePresence('end_date', 'create')
            ->notEmpty('end_date');

        $validator
            ->dateTime('created_on')
            ->requirePresence('created_on', 'create')
            ->notEmpty('created_on');

        $validator
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        return $validator;
    }
}
