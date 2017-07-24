<?php
App::uses('AppModel', 'Model');
/**
 * EmpresaStatus Model
 *
 * @property Empresa $Empresa
 */
class EmpresaStatus extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Empresa' => array(
			'className' => 'Empresa',
			'foreignKey' => 'empresa_status_id',
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
