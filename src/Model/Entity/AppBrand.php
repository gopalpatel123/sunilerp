<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AppBrand Entity
 *
 * @property int $id
 * @property string $name
 * @property string $status
 * @property float $discount
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime $created_on
 * @property string $brand_image
 *
 * @property \App\Model\Entity\Item[] $items
 */
class AppBrand extends Entity
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
