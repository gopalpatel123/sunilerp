<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AppPromotionDetail Entity
 *
 * @property int $id
 * @property int $app_promotion_id
 * @property int $stock_group_id
 * @property int $item_id
 * @property float $order_value
 * @property float $discount_in_percentage
 * @property float $discount_in_amount
 * @property float $discount_of_max_amount
 * @property string $coupon_name
 * @property string $coupon_code
 * @property float $buy_quntity
 * @property float $get_quntity
 * @property int $get_item_id
 * @property string $narration
 * @property float $cash_back
 * @property string $is_free_shipping
 *
 * @property \App\Model\Entity\AppPromotion $app_promotion
 * @property \App\Model\Entity\StockGroup $stock_group
 * @property \App\Model\Entity\Item $item
 * @property \App\Model\Entity\GetItem $get_item
 */
class AppPromotionDetail extends Entity
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
