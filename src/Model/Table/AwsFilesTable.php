<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AwsFiles Model
 *
 * @property \App\Model\Table\MerchantsTable|\Cake\ORM\Association\BelongsTo $Merchants
 *
 * @method \App\Model\Entity\AwsFile get($primaryKey, $options = [])
 * @method \App\Model\Entity\AwsFile newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AwsFile[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AwsFile|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AwsFile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AwsFile[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AwsFile findOrCreate($search, callable $callback = null, $options = [])
 */
class AwsFilesTable extends Table
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

        $this->setTable('aws_files');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Merchants', [
            'foreignKey' => 'merchant_id',
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
            ->requirePresence('bucket_name', 'create')
            ->notEmpty('bucket_name');

        $validator
            ->requirePresence('access_key', 'create')
            ->notEmpty('access_key');

        $validator
            ->requirePresence('secret_access_key', 'create')
            ->notEmpty('secret_access_key');

        $validator
            ->requirePresence('cdn_path', 'create')
            ->notEmpty('cdn_path');

        $validator
            ->requirePresence('working_key', 'create')
            ->notEmpty('working_key');

        $validator
            ->requirePresence('access_code', 'create')
            ->notEmpty('access_code');

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
        $rules->add($rules->existsIn(['merchant_id'], 'Merchants'));

        return $rules;
    }
}
