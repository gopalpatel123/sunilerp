<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AppOrder Entity
 *
 * @property int $id
 * @property int $app_customer_id
 * @property int $app_customer_address_id
 * @property string $customer_address_info
 * @property string $order_no
 * @property int $voucher_no
 * @property string $ccavvenue_tracking_no
 * @property string $ccavvenue_order_no
 * @property float $discount_percent
 * @property float $total_gst
 * @property float $grand_total
 * @property float $round_off
 * @property int $delivery_charge_id
 * @property string $delivery_charge_amount
 * @property string $order_type
 * @property \Cake\I18n\FrozenDate $delivery_date
 * @property string $order_status
 * @property \Cake\I18n\FrozenDate $order_date
 * @property string $payment_status
 * @property string $order_from
 * @property string $narration
 * @property \Cake\I18n\FrozenTime $packing_on
 * @property string $packing_flag
 * @property \Cake\I18n\FrozenTime $dispatch_on
 * @property string $dispatch_flag
 * @property string $is_applicable_for_cancel
 *
 * @property \App\Model\Entity\AppCustomer $app_customer
 * @property \App\Model\Entity\AppCustomerAddress $app_customer_address
 * @property \App\Model\Entity\DeliveryCharge $delivery_charge
 * @property \App\Model\Entity\AppOrderDetail[] $app_order_details
 */
class AppOrder extends Entity
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
