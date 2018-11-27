<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AppPromotionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AppPromotionsTable Test Case
 */
class AppPromotionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AppPromotionsTable
     */
    public $AppPromotions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.app_promotions',
        'app.app_promotion_details'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AppPromotions') ? [] : ['className' => AppPromotionsTable::class];
        $this->AppPromotions = TableRegistry::get('AppPromotions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AppPromotions);

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
}
