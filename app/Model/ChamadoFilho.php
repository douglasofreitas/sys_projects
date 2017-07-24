<?php
App::uses('AppModel', 'Model');
/**
 * ChamadoFilho Model
 *
 * @property ChamadoPai $ChamadoPai
 * @property ChamadoFilho $ChamadoFilho
 * @property ChamadoFilho $ChamadoFilho
 */
class ChamadoFilho extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'chamado_pai_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'chamado_filho_id' => array(
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
		'ChamadoPai' => array(
			'className' => 'ChamadoPai',
			'foreignKey' => 'chamado_pai_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ChamadoFilho' => array(
			'className' => 'ChamadoFilho',
			'foreignKey' => 'chamado_filho_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'ChamadoFilho' => array(
			'className' => 'ChamadoFilho',
			'foreignKey' => 'chamado_filho_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
