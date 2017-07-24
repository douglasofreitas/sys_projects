<?php
App::uses('OrcamentoArquivo', 'Model');

/**
 * OrcamentoArquivo Test Case
 *
 */
class OrcamentoArquivoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.orcamento_arquivo',
		'app.orcamento'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->OrcamentoArquivo = ClassRegistry::init('OrcamentoArquivo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OrcamentoArquivo);

		parent::tearDown();
	}

}
