<?php
App::uses('ChamadoPrioridade', 'Model');

/**
 * ChamadoPrioridade Test Case
 *
 */
class ChamadoPrioridadeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.chamado_prioridade',
		'app.chamado'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ChamadoPrioridade = ClassRegistry::init('ChamadoPrioridade');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ChamadoPrioridade);

		parent::tearDown();
	}

}
