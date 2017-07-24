<?php
App::uses('ChamadoStatus', 'Model');

/**
 * ChamadoStatus Test Case
 *
 */
class ChamadoStatusTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.chamado_status',
		'app.chamado'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ChamadoStatus = ClassRegistry::init('ChamadoStatus');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ChamadoStatus);

		parent::tearDown();
	}

}
