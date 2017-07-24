<?php
App::uses('AppModel', 'Model');
/**
 * Projeto Model
 *
 * @property Cliente $Cliente
 * @property ProjetoStatus $ProjetoStatus
 * @property User $User
 * @property Empresa $Empresa
 * @property Chamado $Chamado
 * @property Orcamento $Orcamento
 * @property User $User
 */
class Perfil extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'UserPerfil' => array(
			'className' => 'UserPerfil',
			'foreignKey' => 'perfil_id',
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


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		
	);

}
