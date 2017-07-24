<?php
App::uses('ClientesUser', 'Model');

/**
 * ClientesUser Test Case
 *
 */
class ClientesUserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.clientes_user',
		'app.user',
		'app.cliente',
		'app.empresa',
		'app.projeto'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ClientesUser = ClassRegistry::init('ClientesUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ClientesUser);

		parent::tearDown();
	}

}
