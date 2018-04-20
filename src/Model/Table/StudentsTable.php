<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Students Model
 *
 * @method \App\Model\Entity\Student get($primaryKey, $options = [])
 * @method \App\Model\Entity\Student newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Student[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Student|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Student patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Student[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Student findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StudentsTable extends Table
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

        $this->setTable('students');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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

        $validator
            ->scalar('emailId')
            ->maxLength('emailId', 255)
            ->requirePresence('emailId', 'create')
            ->notEmpty('emailId')
            ->add('emailId', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->scalar('address')
            ->requirePresence('address', 'create')
            ->notEmpty('address');

        $validator
            ->scalar('rollno')
            ->maxLength('rollno', 255)
            ->requirePresence('rollno', 'create')
            ->notEmpty('rollno')
            ->add('rollno', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('courseName')
            ->maxLength('courseName', 255)
            ->requirePresence('courseName', 'create')
            ->notEmpty('courseName');

        $validator
            ->scalar('duration')
            ->maxLength('duration', 255)
            ->requirePresence('duration', 'create')
            ->notEmpty('duration');

        $validator
            ->scalar('totalCourseFee')
            ->maxLength('totalCourseFee', 255)
            ->requirePresence('totalCourseFee', 'create')
            ->notEmpty('totalCourseFee');

        $validator
            ->scalar('feePaid')
            ->maxLength('feePaid', 255)
            ->requirePresence('feePaid', 'create')
            ->notEmpty('feePaid');

        $validator
            ->scalar('image')
            ->maxLength('image', 255)
            ->requirePresence('image', 'create')
            ->notEmpty('image');

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
        $rules->add($rules->isUnique(['emailId']));
        $rules->add($rules->isUnique(['rollno']));

        return $rules;
    }
}
