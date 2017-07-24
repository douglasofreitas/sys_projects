<?php
App::uses('ChamadoFilho', 'Model');

/**
 * ChamadoFilho Test Case
 *
 */
class ChamadoFilhoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.chamado_filho',
		'app.chamado_pai'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ChamadoFilho = ClassRegistry::init('ChamadoFilho');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ChamadoFilho);

		parent::tearDown();
	}

}
