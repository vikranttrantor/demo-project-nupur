<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserfeesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserfeesTable Test Case
 */
class UserfeesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserfeesTable
     */
    public $Userfees;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.userfees',
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
        $config = TableRegistry::exists('Userfees') ? [] : ['className' => UserfeesTable::class];
        $this->Userfees = TableRegistry::get('Userfees', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Userfees);

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
