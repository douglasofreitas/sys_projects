<?php
/**
 * CaixaFixture
 *
 */
class CaixaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'codigo' => array('type' => 'integer', 'null' => true, 'default' => null),
		'conta_pagar_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'conta_receber_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'empresa_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'nome' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'descricao' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'valor_entrada' => array('type' => 'float', 'null' => true, 'default' => null),
		'valor_saida' => array('type' => 'float', 'null' => true, 'default' => null),
		'saldo' => array('type' => 'float', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_caixas_conta_pagars1' => array('column' => 'conta_pagar_id', 'unique' => 0),
			'fk_caixas_conta_recebers1' => array('column' => 'conta_receber_id', 'unique' => 0),
			'fk_caixas_empresas1' => array('column' => 'empresa_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'codigo' => 1,
			'conta_pagar_id' => 1,
			'conta_receber_id' => 1,
			'empresa_id' => 1,
			'nome' => 'Lorem ipsum dolor sit amet',
			'descricao' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'valor_entrada' => 1,
			'valor_saida' => 1,
			'saldo' => 1,
			'created' => '2012-07-25 23:30:46',
			'modified' => '2012-07-25 23:30:46'
		),
	);

}
