<?php
App::uses('Caixa', 'Model');

/**
 * Caixa Test Case
 *
 */
class CaixaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.caixa',
		'app.conta_pagar',
		'app.conta_receber',
		'app.empresa'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Caixa = ClassRegistry::init('Caixa');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Caixa);

		parent::tearDown();
	}

}
