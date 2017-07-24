<?php
App::uses('Chamado', 'Model');

/**
 * Chamado Test Case
 *
 */
class ChamadoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.chamado',
		'app.projeto',
		'app.chamado_status',
		'app.chamado_tipo',
		'app.chamado_prioridade',
		'app.user',
		'app.chamado_arquivo',
		'app.interacao'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Chamado = ClassRegistry::init('Chamado');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Chamado);

		parent::tearDown();
	}

}
