<?php
App::uses('Projeto', 'Model');

/**
 * Projeto Test Case
 *
 */
class ProjetoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.projeto',
		'app.cliente',
		'app.user',
		'app.clientes_user',
		'app.empresa',
		'app.empresa_status',
		'app.caixa',
		'app.conta_pagar',
		'app.fornecedor',
		'app.fornecedors_user',
		'app.conta_status',
		'app.conta_receber',
		'app.orcamento',
		'app.orcamento_status',
		'app.orcamento_arquivo',
		'app.orcamento_item',
		'app.empresas_meiopagamento',
		'app.meio_pagamento',
		'app.empresa_config',
		'app.empresa_layout',
		'app.orcamento_item_default',
		'app.cidade',
		'app.estado',
		'app.cidades_empresa',
		'app.empresas_user',
		'app.projeto_status',
		'app.projetos_user',
		'app.chamado',
		'app.chamado_status',
		'app.chamado_tipo',
		'app.chamado_prioridade',
		'app.chamado_arquivo',
		'app.interacao',
		'app.interacao_arquivo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Projeto = ClassRegistry::init('Projeto');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Projeto);

		parent::tearDown();
	}

}
