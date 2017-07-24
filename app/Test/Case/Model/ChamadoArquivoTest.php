<?php
App::uses('ChamadoArquivo', 'Model');

/**
 * ChamadoArquivo Test Case
 *
 */
class ChamadoArquivoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.chamado_arquivo',
		'app.chamado'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ChamadoArquivo = ClassRegistry::init('ChamadoArquivo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ChamadoArquivo);

		parent::tearDown();
	}

}
