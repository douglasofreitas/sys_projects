<?php
/**
 * EmpresaConfigFixture
 *
 */
class EmpresaConfigFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'empresa_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'dias_chamado_vencimento' => array('type' => 'integer', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'mail_username' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'mail_password' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'mail_host' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'mail_tsl' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_empresa_configs_empresas1' => array('column' => 'empresa_id', 'unique' => 0)
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
			'dias_chamado_vencimento' => 1,
			'created' => '2012-07-25 23:32:49',
			'modified' => '2012-07-25 23:32:49',
			'mail_username' => 'Lorem ipsum dolor sit amet',
			'mail_password' => 'Lorem ipsum dolor sit amet',
			'mail_host' => 'Lorem ipsum dolor sit amet',
			'mail_tsl' => 1
		),
	);

}
