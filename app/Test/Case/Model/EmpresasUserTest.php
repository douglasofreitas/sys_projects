<?php
App::uses('EmpresasUser', 'Model');

/**
 * EmpresasUser Test Case
 *
 */
class EmpresasUserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.empresas_user',
		'app.empresa',
		'app.empresa_status',
		'app.caixa',
		'app.conta_pagar',
		'app.fornecedor',
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
		'app.meiopagamento'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EmpresasUser = ClassRegistry::init('EmpresasUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EmpresasUser);

		parent::tearDown();
	}

}
