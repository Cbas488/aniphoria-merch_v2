<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CategoriaTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CategoriaTable Test Case
 */
class CategoriaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CategoriaTable
     */
    protected $Categoria;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Categoria',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Categoria') ? [] : ['className' => CategoriaTable::class];
        $this->Categoria = $this->getTableLocator()->get('Categoria', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Categoria);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
