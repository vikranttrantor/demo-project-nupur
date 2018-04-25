<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Userdetail Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $roll
 * @property string $address
 * @property string $course
 * @property int $duration
 * @property int $totalFee
 * @property int $feePaid
 * @property string $image
 *
 * @property \App\Model\Entity\User $user
 */
class Userdetail extends Entity
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
        'user_id' => true,
        'roll' => true,
        'address' => true,
        'course' => true,
        'duration' => true,
        'totalFee' => true,
        'feePaid' => true,
        'image' => true,
        'user' => true
    ];
}
