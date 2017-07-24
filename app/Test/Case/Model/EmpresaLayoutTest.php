<?php
App::uses('EmpresaLayout', 'Model');

/**
 * EmpresaLayout Test Case
 *
 */
class EmpresaLayoutTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.empresa_layout',
		'app.empresa'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EmpresaLayout = ClassRegistry::init('EmpresaLayout');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EmpresaLayout);

		parent::tearDown();
	}

}
