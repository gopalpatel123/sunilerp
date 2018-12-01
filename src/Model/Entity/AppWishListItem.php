<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AppWishListItem Entity
 *
 * @property int $id
 * @property int $app_wish_list_id
 * @property int $item_id
 * @property string $item_code
 * @property int $status
 * @property \Cake\I18n\FrozenTime $created_on
 *
 * @property \App\Model\Entity\AppWishList $app_wish_list
 * @property \App\Model\Entity\Item $item
 */
class AppWishListItem extends Entity
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
