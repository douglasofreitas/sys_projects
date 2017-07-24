<?php
App::uses('OrcamentoStatus', 'Model');

/**
 * OrcamentoStatus Test Case
 *
 */
class OrcamentoStatusTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.orcamento_status',
		'app.orcamento'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->OrcamentoStatus = ClassRegistry::init('OrcamentoStatus');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OrcamentoStatus);

		parent::tearDown();
	}

}
