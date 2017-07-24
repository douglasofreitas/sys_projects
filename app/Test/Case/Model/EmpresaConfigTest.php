<?php
App::uses('EmpresaConfig', 'Model');

/**
 * EmpresaConfig Test Case
 *
 */
class EmpresaConfigTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.empresa_config',
		'app.empresa'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EmpresaConfig = ClassRegistry::init('EmpresaConfig');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EmpresaConfig);

		parent::tearDown();
	}

}
