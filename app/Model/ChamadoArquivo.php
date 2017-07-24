<?php
App::uses('AppModel', 'Model');
/**
 * ChamadoArquivo Model
 *
 * @property Chamado $Chamado
 */
class ChamadoArquivo extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'chamado_id' => array(
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
		'Chamado' => array(
			'className' => 'Chamado',
			'foreignKey' => 'chamado_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
