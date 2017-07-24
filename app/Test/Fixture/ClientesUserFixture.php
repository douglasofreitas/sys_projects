<?php
/**
 * ClientesUserFixture
 *
 */
class ClientesUserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'cliente_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'ativo' => array('type' => 'integer', 'null' => true, 'default' => '1', 'length' => 4),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_clientes_users_users1' => array('column' => 'user_id', 'unique' => 0),
			'fk_clientes_users_clientes1' => array('column' => 'cliente_id', 'unique' => 0)
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
			'user_id' => 1,
			'cliente_id' => 1,
			'ativo' => 1,
			'created' => '2012-07-25 23:32:13',
			'modified' => '2012-07-25 23:32:13'
		),
	);

}
