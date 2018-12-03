<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ItemReviewRating Entity
 *
 * @property int $id
 * @property int $item_id
 * @property int $app_customer_id
 * @property float $rating
 * @property string $comment
 * @property int $status
 * @property \Cake\I18n\FrozenTime $created_on
 *
 * @property \App\Model\Entity\Item $item
 * @property \App\Model\Entity\AppCustomer $app_customer
 */
class ItemReviewRating extends Entity
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
