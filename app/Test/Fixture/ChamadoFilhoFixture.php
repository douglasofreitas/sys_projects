<?php
/**
 * ChamadoFilhoFixture
 *
 */
class ChamadoFilhoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'chamado_pai_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'chamado_filho_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_chamado_filhos_chamados1' => array('column' => 'chamado_pai_id', 'unique' => 0),
			'fk_chamado_filhos_chamados2' => array('column' => 'chamado_filho_id', 'unique' => 0)
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
			'chamado_pai_id' => 1,
			'chamado_filho_id' => 1,
			'created' => '2012-07-25 23:31:05',
			'modified' => '2012-07-25 23:31:05'
		),
	);

}
