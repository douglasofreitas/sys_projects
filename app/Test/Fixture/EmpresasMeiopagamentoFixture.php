<?php
/**
 * EmpresasMeiopagamentoFixture
 *
 */
class EmpresasMeiopagamentoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'empresa_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'meio_pagamento_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'desconto' => array('type' => 'integer', 'null' => true, 'default' => null),
		'resp_1' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'resp_2' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'resp_3' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'resp_4' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'resp_5' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_empresas_meiopagamento_meio_pagamentos1' => array('column' => 'meio_pagamento_id', 'unique' => 0),
			'fk_empresas_meiopagamento_empresas1' => array('column' => 'empresa_id', 'unique' => 0)
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
			'empresa_id' => 1,
			'meio_pagamento_id' => 1,
			'desconto' => 1,
			'resp_1' => 'Lorem ipsum dolor sit amet',
			'resp_2' => 'Lorem ipsum dolor sit amet',
			'resp_3' => 'Lorem ipsum dolor sit amet',
			'resp_4' => 'Lorem ipsum dolor sit amet',
			'resp_5' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-07-25 23:33:24',
			'modified' => '2012-07-25 23:33:24'
		),
	);

}
