<?php
App::uses('ContaReceber', 'Model');

/**
 * ContaReceber Test Case
 *
 */
class ContaReceberTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.conta_receber',
		'app.orcamento',
		'app.conta_status',
		'app.empresas_meiopagamento',
		'app.user',
		'app.caixa',
		'app.conta_pagar',
		'app.fornecedor',
		'app.empresa'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ContaReceber = ClassRegistry::init('ContaReceber');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ContaReceber);

		parent::tearDown();
	}

}
