<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Student Entity
 *
 * @property int $id
 * @property string $name
 * @property string $emailId
 * @property string $password
 * @property string $address
 * @property string $rollno
 * @property string $courseName
 * @property string $duration
 * @property string $totalCourseFee
 * @property string $feePaid
 * @property string $image
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Student extends Entity
{

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
        'address' => true,
        'rollno' => true,
        'courseName' => true,
        'duration' => true,
        'totalCourseFee' => true,
        'feePaid' => true,
        'image' => true,
        'created' => true,
        'modified' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
