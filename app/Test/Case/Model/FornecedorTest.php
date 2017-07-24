<?php
App::uses('Fornecedor', 'Model');

/**
 * Fornecedor Test Case
 *
 */
class FornecedorTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
		'app.user',
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
		'app.empresas_user',
		'app.fornecedors_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Fornecedor = ClassRegistry::init('Fornecedor');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Fornecedor);

		parent::tearDown();
	}

}
