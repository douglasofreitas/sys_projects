<?php
/**
 * HorarioFixture
 *
 */
class HorarioFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'empresa_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'sistema' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4),
		'ativo' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_horarios_users1' => array('column' => 'user_id', 'unique' => 0),
			'fk_horarios_empresas1' => array('column' => 'empresa_id', 'unique' => 0)
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
			'empresa_id' => 1,
			'sistema' => 1,
			'ativo' => 1,
			'created' => '2012-07-29 21:06:55',
			'modified' => '2012-07-29 21:06:55'
		),
	);

}
