<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AppWishList Entity
 *
 * @property int $id
 * @property int $app_customer_id
 * @property \Cake\I18n\FrozenTime $created_on
 * @property int $status
 *
 * @property \App\Model\Entity\AppCustomer $app_customer
 * @property \App\Model\Entity\AppNotification[] $app_notifications
 * @property \App\Model\Entity\AppWishListItem[] $app_wish_list_items
 */
class AppWishList extends Entity
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