<?php
/**
 * ContaPagarFixture
 *
 */
class ContaPagarFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'codigo' => array('type' => 'integer', 'null' => true, 'default' => null),
		'fornecedor_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'conta_status_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'empresas_meiopagamento_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'nome' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'descricao' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'valor' => array('type' => 'float', 'null' => true, 'default' => null),
		'desconto' => array('type' => 'integer', 'null' => true, 'default' => null),
		'data_vencimento' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'data_pagamento' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'observacao' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_faturas_status_faturas1' => array('column' => 'conta_status_id', 'unique' => 0),
			'fk_conta_pagars_empresas_meiopagamento1' => array('column' => 'empresas_meiopagamento_id', 'unique' => 0),
			'fk_conta_pagars_fornecedors1' => array('column' => 'fornecedor_id', 'unique' => 0)
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
			'fornecedor_id' => 1,
			'conta_status_id' => 1,
			'empresas_meiopagamento_id' => 1,
			'nome' => 'Lorem ipsum dolor sit amet',
			'descricao' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'valor' => 1,
			'desconto' => 1,
			'data_vencimento' => '2012-07-25 23:32:21',
			'data_pagamento' => '2012-07-25 23:32:21',
			'observacao' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'user_id' => 1,
			'created' => '2012-07-25 23:32:21',
			'modified' => '2012-07-25 23:32:21'
		),
	);

}
