<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Excategories Model
 *
 * @property \App\Model\Table\ExamountTable|\Cake\ORM\Association\HasMany $Examount
 *
 * @method \App\Model\Entity\Excategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\Excategory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Excategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Excategory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Excategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Excategory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Excategory findOrCreate($search, callable $callback = null, $options = [])
 */
class ExcategoriesTable extends Table
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

        $this->setTable('excategories');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Examount', [
            'foreignKey' => 'excategory_id'
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        return $validator;
    }
}
