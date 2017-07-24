<?php
App::uses('OrcamentoItem', 'Model');

/**
 * OrcamentoItem Test Case
 *
 */
class OrcamentoItemTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.orcamento_item',
		'app.orcamento'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->OrcamentoItem = ClassRegistry::init('OrcamentoItem');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OrcamentoItem);

		parent::tearDown();
	}

}
