<?php
App::uses('AppModel', 'Model');
/**
 * OrcamentoArquivo Model
 *
 * @property Orcamento $Orcamento
 */
class OrcamentoArquivo extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'orcamento_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Orcamento' => array(
			'className' => 'Orcamento',
			'foreignKey' => 'orcamento_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
