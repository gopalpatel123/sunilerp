<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AppBrands Model
 *
 * @property \App\Model\Table\ItemsTable|\Cake\ORM\Association\HasMany $Items
 *
 * @method \App\Model\Entity\AppBrand get($primaryKey, $options = [])
 * @method \App\Model\Entity\AppBrand newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AppBrand[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AppBrand|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppBrand patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AppBrand[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AppBrand findOrCreate($search, callable $callback = null, $options = [])
 */
class AppBrandsTable extends Table
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

        $this->setTable('app_brands');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Items', [
            'foreignKey' => 'app_brand_id'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('status', 'create')
            ->notEmpty('status');

       /*  $validator
            ->decimal('discount')
            ->requirePresence('discount', 'create')
            ->notEmpty('discount');

        $validator
            ->integer('created_by')
            ->requirePresence('created_by', 'create')
            ->notEmpty('created_by');

        $validator
            ->dateTime('created_on')
            ->requirePresence('created_on', 'create')
            ->notEmpty('created_on');
			*/

        $validator
            ->requirePresence('brand_image', 'create')
            ->notEmpty('brand_image'); 

        return $validator;
    }
}
