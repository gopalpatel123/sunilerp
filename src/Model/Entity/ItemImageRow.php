<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ItemImageRow Entity
 *
 * @property int $id
 * @property int $item_id
 * @property string $image_url
 * @property string $status
 *
 * @property \App\Model\Entity\Item $item
 */
class ItemImageRow extends Entity
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
