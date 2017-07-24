<?php
App::uses('ProjetoStatus', 'Model');

/**
 * ProjetoStatus Test Case
 *
 */
class ProjetoStatusTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.projeto_status',
		'app.projeto'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ProjetoStatus = ClassRegistry::init('ProjetoStatus');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProjetoStatus);

		parent::tearDown();
	}

}
