<?php
/**
 * OrcamentoFixture
 *
 */
class OrcamentoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'codigo' => array('type' => 'integer', 'null' => true, 'default' => null),
		'orcamento_status_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'projeto_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'nome' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'descricao' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'observacao' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'data_aprovacao' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'data_inicio' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'data_fim' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'empresa_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_orcamentos_status_orcamentos1' => array('column' => 'orcamento_status_id', 'unique' => 0),
			'fk_orcamentos_projetos1' => array('column' => 'projeto_id', 'unique' => 0),
			'fk_orcamentos_users1' => array('column' => 'user_id', 'unique' => 0),
			'fk_orcamentos_empresas1' => array('column' => 'empresa_id', 'unique' => 0)
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
			'orcamento_status_id' => 1,
			'projeto_id' => 1,
			'nome' => 'Lorem ipsum dolor sit amet',
			'descricao' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'observacao' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'data_aprovacao' => '2012-07-25 23:35:32',
			'data_inicio' => '2012-07-25 23:35:32',
			'data_fim' => '2012-07-25 23:35:32',
			'user_id' => 1,
			'empresa_id' => 1,
			'created' => '2012-07-25 23:35:32',
			'modified' => '2012-07-25 23:35:32'
		),
	);

}
