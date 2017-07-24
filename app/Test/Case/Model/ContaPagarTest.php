<?php
App::uses('ContaPagar', 'Model');

/**
 * ContaPagar Test Case
 *
 */
class ContaPagarTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.conta_pagar',
		'app.fornecedor',
		'app.conta_status',
		'app.empresas_meiopagamento',
		'app.user',
		'app.caixa',
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
		$this->ContaPagar = ClassRegistry::init('ContaPagar');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ContaPagar);

		parent::tearDown();
	}

}
