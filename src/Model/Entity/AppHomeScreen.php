<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AppHomeScreen Entity
 *
 * @property int $id
 * @property string $title
 * @property string $layout
 * @property string $section_show
 * @property int $preference
 * @property int $stock_group_id
 * @property int $sub_category_id
 * @property string $screen_type
 * @property string $model_name
 * @property string $image
 * @property string $link_name
 * @property string $sub_title
 *
 * @property \App\Model\Entity\StockGroup $stock_group
 * @property \App\Model\Entity\AppBrand $app_brand
 * @property \App\Model\Entity\AppBanner $app_banner
 * @property \App\Model\Entity\AppHomeScreenSecond $app_home_screen_second
 */
class AppHomeScreen extends Entity
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
