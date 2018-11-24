<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AppBanner Entity
 *
 * @property int $id
 * @property string $link_name
 * @property string $name
 * @property int $stock_group_id
 * @property int $item_id
 * @property string $banner_image
 * @property \Cake\I18n\FrozenTime $created_on
 * @property string $status
 *
 * @property \App\Model\Entity\StockGroup $stock_group
 * @property \App\Model\Entity\Item $item
 */
class AppBanner extends Entity
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
