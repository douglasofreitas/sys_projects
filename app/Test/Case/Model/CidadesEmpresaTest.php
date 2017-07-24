<?php
App::uses('CidadesEmpresa', 'Model');

/**
 * CidadesEmpresa Test Case
 *
 */
class CidadesEmpresaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cidades_empresa',
		'app.estado',
		'app.empresa'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CidadesEmpresa = ClassRegistry::init('CidadesEmpresa');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CidadesEmpresa);

		parent::tearDown();
	}

}
