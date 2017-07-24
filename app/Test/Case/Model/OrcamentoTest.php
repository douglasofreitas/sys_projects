<?php
App::uses('Orcamento', 'Model');

/**
 * Orcamento Test Case
 *
 */
class OrcamentoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.orcamento',
		'app.orcamento_status',
		'app.projeto',
		'app.user',
		'app.empresa',
		'app.empresa_status',
		'app.caixa',
		'app.conta_pagar',
		'app.fornecedor',
		'app.fornecedors_user',
		'app.conta_status',
		'app.conta_receber',
		'app.empresas_meiopagamento',
		'app.meio_pagamento',
		'app.cliente',
		'app.clientes_user',
		'app.empresa_config',
		'app.empresa_layout',
		'app.orcamento_item_default',
		'app.cidade',
		'app.estado',
		'app.cidades_empresa',
		'app.empresas_user',
		'app.orcamento_arquivo',
		'app.orcamento_item'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Orcamento = ClassRegistry::init('Orcamento');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Orcamento);

		parent::tearDown();
	}

}
