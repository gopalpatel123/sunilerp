<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AppHomeScreenRow Entity
 *
 * @property int $id
 * @property string $name
 * @property int $app_home_screen_id
 * @property int $stock_group_id
 * @property string $image
 * @property string $link_name
 *
 * @property \App\Model\Entity\AppHomeScreen $app_home_screen
 * @property \App\Model\Entity\StockGroup $stock_group
 */
class AppHomeScreenRow extends Entity
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
