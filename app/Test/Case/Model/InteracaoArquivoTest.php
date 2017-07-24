<?php
App::uses('InteracaoArquivo', 'Model');

/**
 * InteracaoArquivo Test Case
 *
 */
class InteracaoArquivoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.interacao_arquivo',
		'app.interacao'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->InteracaoArquivo = ClassRegistry::init('InteracaoArquivo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->InteracaoArquivo);

		parent::tearDown();
	}

}
