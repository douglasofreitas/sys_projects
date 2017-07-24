<?php
App::uses('ContaStatus', 'Model');

/**
 * ContaStatus Test Case
 *
 */
class ContaStatusTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.conta_status',
		'app.conta_pagar',
		'app.fornecedor',
		'app.empresas_meiopagamento',
		'app.user',
		'app.caixa',
		'app.conta_receber',
		'app.orcamento',
		'app.empresa'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ContaStatus = ClassRegistry::init('ContaStatus');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ContaStatus);

		parent::tearDown();
	}

}
