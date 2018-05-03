<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;


/**
 * User Entity
 *
 * @property int $id
 * @property string $name
 * @property string $emailId
 * @property string $password
 * @property int $role
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Userdetail[] $userdetail
 */
class User extends Entity
{
    protected $_virtual = ['feestatus'];
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'emailId' => true,
        'password' => true,
        'role' => true,
        'created' => true,
        'modified' => true,
        'userdetail' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

     protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
          return (new DefaultPasswordHasher)->hash($password);
        }
    }
    
    protected function _getLabel()
    {
        return $this->_properties['name'] . ' ' . $this->_properties['emailId'];
    }
}
