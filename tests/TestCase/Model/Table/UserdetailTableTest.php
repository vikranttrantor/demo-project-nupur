<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserdetailTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserdetailTable Test Case
 */
class UserdetailTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserdetailTable
     */
    public $Userdetail;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.userdetail',
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
        $config = TableRegistry::exists('Userdetail') ? [] : ['className' => UserdetailTable::class];
        $this->Userdetail = TableRegistry::get('Userdetail', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Userdetail);

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
