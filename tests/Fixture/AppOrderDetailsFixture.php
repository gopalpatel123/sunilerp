<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AppOrderDetailsFixture
 *
 */
class AppOrderDetailsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'app_order_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'item_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'quantity' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'rate' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'amount' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'quantity*rate'],
        'discount_percent' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'This for membership LCD DIscount Percentage'],
        'discount_amount' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'This for membership LCD DIscount Percentage amount'],
        'promo_percent' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'Applied Promotion Discount in Percentage'],
        'promo_amount' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'Applied Promotion Discount in Amount'],
        'taxable_value' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'after discount amount Taxable Value'],
        'gst_percentage' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'gst_figure_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'gst_value' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'net_amount' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'After discount add GSt on taxable then final amount'],
        'is_item_cancel' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => 'No', 'collate' => 'latin1_swedish_ci', 'comment' => 'Yes,No', 'precision' => null, 'fixed' => null],
        'item_status' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => 'Cancel,Delivered,placed,Packed,Dispatched', 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'app_order_id' => 1,
            'item_id' => 1,
            'quantity' => 1.5,
            'rate' => 1.5,
            'amount' => 1.5,
            'discount_percent' => 1.5,
            'discount_amount' => 1.5,
            'promo_percent' => 1.5,
            'promo_amount' => 1.5,
            'taxable_value' => 1.5,
            'gst_percentage' => 1.5,
            'gst_figure_id' => 1,
            'gst_value' => 1.5,
            'net_amount' => 1.5,
            'is_item_cancel' => 'Lorem ipsum dolor sit amet',
            'item_status' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
