<?php
namespace App\Test\TestCase\Controller;

use App\Controller\AppCustomersController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\AppCustomersController Test Case
 */
class AppCustomersControllerTest extends IntegrationTestCase
{

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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
