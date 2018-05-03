<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExamountTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExamountTable Test Case
 */
class ExamountTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ExamountTable
     */
    public $Examount;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.examount',
        'app.excategories'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Examount') ? [] : ['className' => ExamountTable::class];
        $this->Examount = TableRegistry::get('Examount', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Examount);

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
