<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExcategoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExcategoriesTable Test Case
 */
class ExcategoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ExcategoriesTable
     */
    public $Excategories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.excategories',
        'app.examount'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Excategories') ? [] : ['className' => ExcategoriesTable::class];
        $this->Excategories = TableRegistry::get('Excategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Excategories);

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
