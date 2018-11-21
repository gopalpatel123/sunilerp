<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AppCustomerAddress Entity
 *
 * @property int $id
 * @property int $app_customer_id
 * @property string $name
 * @property string $address_type
 * @property string $mobile_no
 * @property string $address
 * @property string $area
 * @property int $state_id
 * @property int $city_id
 * @property string $country
 * @property string $pincode
 * @property string $latitude
 * @property string $longitude
 * @property int $default_address
 * @property int $is_deleted
 *
 * @property \App\Model\Entity\AppCustomer $app_customer
 * @property \App\Model\Entity\State $state
 * @property \App\Model\Entity\City $city
 * @property \App\Model\Entity\AppOrder[] $app_orders
 */
class AppCustomerAddress extends Entity
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
        '*' => true,
        'id' => false
    ];
}
