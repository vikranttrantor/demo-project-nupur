<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Userdetails Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Userdetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\Userdetail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Userdetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Userdetail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Userdetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Userdetail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Userdetail findOrCreate($search, callable $callback = null, $options = [])
 */
class UserdetailsTable extends Table
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

        $this->setTable('userdetails');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
         // $this->belongsTo('Courses', [
         //     'foreignKey' => 'course_id',
         //     'joinType' => 'INNER'
         // ]);
        $this->belongsTo('Courses', [
            'foreignKey' => 'course_id',
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
            ->integer('roll')
            ->requirePresence('roll', 'create')
            ->notEmpty('roll');

        $validator
            ->scalar('address')
            ->maxLength('address', 255)
            ->requirePresence('address', 'create')
            ->notEmpty('address');

        /*$validator
            ->integer('course')
            ->requirePresence('course', 'create')
            ->notEmpty('course');*/

        $validator
            ->integer('duration')
            ->requirePresence('duration', 'create')
            ->notEmpty('duration');

        $validator
            ->integer('totalFee')
            ->requirePresence('totalFee', 'create')
            ->notEmpty('totalFee');

        $validator
            ->integer('feePaid');
           

        $validator
            ->scalar('image')
            ->maxLength('image', 255);
           // ->requirePresence('image', 'create')
            //->notEmpty('image');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
