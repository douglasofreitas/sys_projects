<?php
/**
 * ChamadoFixture
 *
 */
class ChamadoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'codigo' => array('type' => 'integer', 'null' => true, 'default' => null),
		'projeto_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'chamado_status_id' => array('type' => 'integer', 'null' => false, 'default' => '1', 'key' => 'index'),
		'chamado_tipo_id' => array('type' => 'integer', 'null' => false, 'default' => '1', 'key' => 'index'),
		'chamado_prioridade_id' => array('type' => 'integer', 'null' => false, 'default' => '1', 'key' => 'index'),
		'nome' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'descricao' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'observacao_oculto' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'data_finalizacao' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'date_inicio' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'oculto' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_chamados_status_chamados1' => array('column' => 'chamado_status_id', 'unique' => 0),
			'fk_chamados_tipo_chamados1' => array('column' => 'chamado_tipo_id', 'unique' => 0),
			'fk_chamados_prioridade_chamados1' => array('column' => 'chamado_prioridade_id', 'unique' => 0),
			'fk_chamados_projetos1' => array('column' => 'projeto_id', 'unique' => 0),
			'fk_chamados_users1' => array('column' => 'user_id', 'unique' => 0)
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
			'projeto_id' => 1,
			'chamado_status_id' => 1,
			'chamado_tipo_id' => 1,
			'chamado_prioridade_id' => 1,
			'nome' => 'Lorem ipsum dolor sit amet',
			'descricao' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'observacao_oculto' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'data_finalizacao' => '2012-07-25 23:31:40',
			'date_inicio' => '2012-07-25 23:31:40',
			'oculto' => 1,
			'user_id' => 1,
			'created' => '2012-07-25 23:31:40',
			'modified' => '2012-07-25 23:31:40'
		),
	);

}
