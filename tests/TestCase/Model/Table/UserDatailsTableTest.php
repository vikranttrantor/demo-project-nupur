<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserDatailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserDatailsTable Test Case
 */
class UserDatailsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserDatailsTable
     */
    public $UserDatails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.user_datails',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UserDatails') ? [] : ['className' => UserDatailsTable::class];
        $this->UserDatails = TableRegistry::get('UserDatails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserDatails);

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
