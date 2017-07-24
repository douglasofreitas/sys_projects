<?php
App::uses('AppModel', 'Model');
/**
 * EmpresasMeiopagamento Model
 *
 * @property Empresa $Empresa
 * @property MeioPagamento $MeioPagamento
 * @property Fatura $Fatura
 */
class EmpresasMeiopagamento extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'empresa_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'meio_pagamento_id' => array(
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
		'Empresa' => array(
			'className' => 'Empresa',
			'foreignKey' => 'empresa_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'MeioPagamento' => array(
			'className' => 'MeioPagamento',
			'foreignKey' => 'meio_pagamento_id',
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
		'Fatura' => array(
			'className' => 'Fatura',
			'foreignKey' => 'empresas_meiopagamento_id',
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
        
        function getFormSelect(){
                //$form_select = $this->MeioPagamento->getFormSelect();
				$form_select = array();
                $conditions = array('EmpresasMeiopagamento.empresa_id' => $_SESSION['Empresa']['id']);
                
		$resultado = $this->find('all', array('conditions' => $conditions, 'recursive' => 1));
		
		foreach($resultado as $item){
			$form_select[$item['EmpresasMeiopagamento']['id']] = $item['MeioPagamento']['nome'];
		}
		return $form_select;
	}
	function getMeiopagamentoCompleto(){
                //$form_select = $this->MeioPagamento->getFormSelect();
				$form_select = array();
                $conditions = array('EmpresasMeiopagamento.empresa_id' => $_SESSION['Empresa']['id']);
                
		$resultado = $this->find('all', array('conditions' => $conditions, 'recursive' => 1));
		
		foreach($resultado as $item){
			$form_select[$item['EmpresasMeiopagamento']['id']] = $item['MeioPagamento'];
		}
		return $form_select;
	}
	

}
