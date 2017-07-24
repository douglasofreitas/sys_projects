<?php
App::uses('EmpresaStatus', 'Model');

/**
 * EmpresaStatus Test Case
 *
 */
class EmpresaStatusTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.empresa_status',
		'app.empresa'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EmpresaStatus = ClassRegistry::init('EmpresaStatus');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EmpresaStatus);

		parent::tearDown();
	}

}
