<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AwsFilesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AwsFilesTable Test Case
 */
class AwsFilesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AwsFilesTable
     */
    public $AwsFiles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.aws_files',
        'app.merchants'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AwsFiles') ? [] : ['className' => AwsFilesTable::class];
        $this->AwsFiles = TableRegistry::get('AwsFiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AwsFiles);

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
