<?php
App::uses('MeioPagamento', 'Model');

/**
 * MeioPagamento Test Case
 *
 */
class MeioPagamentoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.meio_pagamento',
		'app.empresas_meiopagamento',
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
		'app.cliente',
		'app.clientes_user',
		'app.projeto',
		'app.empresa_config',
		'app.empresa_layout',
		'app.orcamento_item_default',
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
		$this->MeioPagamento = ClassRegistry::init('MeioPagamento');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MeioPagamento);

		parent::tearDown();
	}

}
