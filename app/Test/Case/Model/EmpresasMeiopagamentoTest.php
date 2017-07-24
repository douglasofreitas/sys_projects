<?php
App::uses('EmpresasMeiopagamento', 'Model');

/**
 * EmpresasMeiopagamento Test Case
 *
 */
class EmpresasMeiopagamentoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.empresas_meiopagamento',
		'app.empresa',
		'app.empresa_status',
		'app.caixa',
		'app.conta_pagar',
		'app.fornecedor',
		'app.conta_status',
		'app.conta_receber',
		'app.orcamento',
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
		'app.meio_pagamento'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EmpresasMeiopagamento = ClassRegistry::init('EmpresasMeiopagamento');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EmpresasMeiopagamento);

		parent::tearDown();
	}

}
