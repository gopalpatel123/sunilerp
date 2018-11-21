<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AppCustomersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AppCustomersTable Test Case
 */
class AppCustomersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AppCustomersTable
     */
    public $AppCustomers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.app_customers',
        'app.app_customer_addresses',
        'app.app_notification_customers',
        'app.app_orders',
        'app.app_wish_lists',
        'app.carts',
        'app.item_review_ratings'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AppCustomers') ? [] : ['className' => AppCustomersTable::class];
        $this->AppCustomers = TableRegistry::get('AppCustomers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AppCustomers);

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
