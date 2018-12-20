<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AppNotification Entity
 *
 * @property int $id
 * @property string $title
 * @property string $message
 * @property string $image_app
 * @property string $app_link
 * @property string $name
 * @property int $item_id
 * @property int $app_wish_list_id
 * @property int $stock_group_id
 * @property string $screen_type
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime $created_on
 * @property int $edited_by
 * @property \Cake\I18n\FrozenTime $edited_on
 * @property int $status
 * @property string $notification_type
 *
 * @property \App\Model\Entity\Item $item
 * @property \App\Model\Entity\AppWishList $app_wish_list
 * @property \App\Model\Entity\StockGroup $stock_group
 * @property \App\Model\Entity\AppNotificationCustomer[] $app_notification_customers
 */
class AppNotification extends Entity
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
