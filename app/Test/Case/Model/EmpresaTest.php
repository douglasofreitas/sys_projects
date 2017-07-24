<?php
App::uses('Empresa', 'Model');

/**
 * Empresa Test Case
 *
 */
class EmpresaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.empresa',
		'app.empresa_status',
		'app.caixa',
		'app.conta_pagar',
		'app.fornecedor',
		'app.conta_status',
		'app.conta_receber',
		'app.orcamento',
		'app.empresas_meiopagamento',
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
		'app.empresas_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Empresa = ClassRegistry::init('Empresa');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Empresa);

		parent::tearDown();
	}

}
