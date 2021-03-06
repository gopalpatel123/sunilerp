<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AppPromotionDetailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AppPromotionDetailsTable Test Case
 */
class AppPromotionDetailsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AppPromotionDetailsTable
     */
    public $AppPromotionDetails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.app_promotion_details',
        'app.app_promotions',
        'app.stock_groups',
        'app.companies',
        'app.states',
        'app.company_users',
        'app.users',
        'app.financial_years',
        'app.user_rights',
        'app.pages',
        'app.locations',
        'app.grns',
        'app.supplier_ledgers',
        'app.accounting_groups',
        'app.nature_of_groups',
        'app.ledgers',
        'app.suppliers',
        'app.cities',
        'app.customers',
        'app.reference_details',
        'app.receipts',
        'app.receipt_rows',
        'app.ref_receipts',
        'app.accounting_entries',
        'app.purchase_vouchers',
        'app.purchase_voucher_rows',
        'app.ref_purchase_vouchers',
        'app.purchase_invoices',
        'app.purchase_ledgers',
        'app.gst_figures',
        'app.items',
        'app.units',
        'app.item_ledgers',
        'app.stock_journals',
        'app.inwards',
        'app.outwards',
        'app.sale_returns',
        'app.sales_invoices',
        'app.sales_invoice_rows',
        'app.output_cgst_ledgers',
        'app.output_sgst_ledgers',
        'app.output_igst_ledgers',
        'app.sales_invoice_row_datas',
        'app.party_ledgers',
        'app.sales_ledgers',
        'app.sale_return_rows',
        'app.locations',
        'app.intra_location_stock_transfer_vouchers',
        'app.intra_location_stock_transfer_voucher_rows',
        'app.transfer_from_locations',
        'app.transfer_to_locations',
        'app.sizes',
        'app.shades',
        'app.first_gst_figures',
        'app.second_gst_figures',
        'app.app_brands',
        'app.purchase_invoice_rows',
        'app.purchase_returns',
        'app.purchase_return_rows',
        'app.sales_invoices_data',
        'app.sales_vouchers',
        'app.sales_voucher_rows',
        'app.ref_sales_vouchers',
        'app.journal_vouchers',
        'app.journal_voucher_rows',
        'app.ref_journal_vouchers',
        'app.contra_vouchers',
        'app.contra_voucher_rows',
        'app.payments',
        'app.payment_rows',
        'app.ref_payments',
        'app.credit_notes',
        'app.credit_note_rows',
        'app.ref_credit_notes',
        'app.debit_notes',
        'app.debit_note_rows',
        'app.ref_debit_notes',
        'app.grn_rows',
        'app.second_tamp_grn_records',
        'app.first_tamp_grn_records',
        'app.get_items'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AppPromotionDetails') ? [] : ['className' => AppPromotionDetailsTable::class];
        $this->AppPromotionDetails = TableRegistry::get('AppPromotionDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AppPromotionDetails);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
