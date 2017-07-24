<?php
App::uses('ChamadoTipo', 'Model');

/**
 * ChamadoTipo Test Case
 *
 */
class ChamadoTipoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.chamado_tipo',
		'app.chamado'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ChamadoTipo = ClassRegistry::init('ChamadoTipo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ChamadoTipo);

		parent::tearDown();
	}

}
