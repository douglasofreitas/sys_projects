<?php
App::uses('OrcamentoItemDefault', 'Model');

/**
 * OrcamentoItemDefault Test Case
 *
 */
class OrcamentoItemDefaultTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.orcamento_item_default',
		'app.empresa',
		'app.empresa_status',
		'app.caixa',
		'app.conta_pagar',
		'app.fornecedor',
		'app.user',
		'app.fornecedors_user',
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
		'app.cidade',
		'app.estado',
		'app.cidades_empresa',
		'app.empresas_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->OrcamentoItemDefault = ClassRegistry::init('OrcamentoItemDefault');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OrcamentoItemDefault);

		parent::tearDown();
	}

}
