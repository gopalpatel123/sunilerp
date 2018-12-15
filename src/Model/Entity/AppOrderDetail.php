<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AppOrderDetail Entity
 *
 * @property int $id
 * @property int $app_order_id
 * @property int $item_id
 * @property float $quantity
 * @property float $rate
 * @property float $amount
 * @property float $discount_percent
 * @property float $discount_amount
 * @property float $promo_percent
 * @property float $promo_amount
 * @property float $taxable_value
 * @property float $gst_percentage
 * @property int $gst_figure_id
 * @property float $gst_value
 * @property float $net_amount
 * @property string $is_item_cancel
 * @property string $item_status
 *
 * @property \App\Model\Entity\AppOrder $app_order
 * @property \App\Model\Entity\Item $item
 * @property \App\Model\Entity\GstFigure $gst_figure
 */
class AppOrderDetail extends Entity
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
