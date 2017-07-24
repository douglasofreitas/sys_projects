<?php
/**
 * ProjetosUserFixture
 *
 */
class ProjetosUserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'projeto_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'data_inicio' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'data_final' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'ativo' => array('type' => 'integer', 'null' => true, 'default' => '1', 'length' => 4),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_projetos_users_users1' => array('column' => 'user_id', 'unique' => 0),
			'fk_projetos_users_projetos1' => array('column' => 'projeto_id', 'unique' => 0)
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
			'projeto_id' => 1,
			'data_inicio' => '2012-07-25 23:35:56',
			'data_final' => '2012-07-25 23:35:56',
			'ativo' => 1,
			'created' => '2012-07-25 23:35:56',
			'modified' => '2012-07-25 23:35:56'
		),
	);

}
