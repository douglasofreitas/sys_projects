<?php
/**
 * InteracaoFixture
 *
 */
class InteracaoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'codigo' => array('type' => 'integer', 'null' => true, 'default' => null),
		'chamado_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'descricao' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'oculto' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4),
		'status_chamado_atual' => array('type' => 'integer', 'null' => true, 'default' => null),
		'status_chamado_novo' => array('type' => 'integer', 'null' => true, 'default' => null),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_interacaos_chamados1' => array('column' => 'chamado_id', 'unique' => 0),
			'fk_interacaos_users1' => array('column' => 'user_id', 'unique' => 0)
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
			'chamado_id' => 1,
			'descricao' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'oculto' => 1,
			'status_chamado_atual' => 1,
			'status_chamado_novo' => 1,
			'user_id' => 1,
			'created' => '2012-07-25 23:34:27',
			'modified' => '2012-07-25 23:34:27'
		),
	);

}
