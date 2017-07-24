<?php
App::uses('FornecedorsUser', 'Model');

/**
 * FornecedorsUser Test Case
 *
 */
class FornecedorsUserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.fornecedors_user',
		'app.user',
		'app.fornecedor',
		'app.empresa',
		'app.empresa_status',
		'app.caixa',
		'app.conta_pagar',
		'app.conta_status',
		'app.conta_receber',
		'app.orcamento',
		'app.empresas_meiopagamento',
		'app.meio_pagamento',
		'app.cliente',
		'app.clientes_user',
		'app.projeto',
		'app.empresa_config',
		'app.empresa_layout',
		'app.orcamento_item_default',
		'app.cidade',
		'app.estado',
		'app.cidades_empresa',
		'app.meiopagamento',
		'app.empresas_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FornecedorsUser = ClassRegistry::init('FornecedorsUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FornecedorsUser);

		parent::tearDown();
	}

}
