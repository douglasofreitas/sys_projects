<?php
App::uses('Interacao', 'Model');

/**
 * Interacao Test Case
 *
 */
class InteracaoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.interacao',
		'app.chamado',
		'app.projeto',
		'app.chamado_status',
		'app.chamado_tipo',
		'app.chamado_prioridade',
		'app.user',
		'app.chamado_arquivo',
		'app.interacao_arquivo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Interacao = ClassRegistry::init('Interacao');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Interacao);

		parent::tearDown();
	}

}
