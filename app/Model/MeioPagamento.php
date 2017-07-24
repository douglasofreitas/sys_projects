<?php
App::uses('AppModel', 'Model');
/**
 * MeioPagamento Model
 *
 * @property EmpresasMeiopagamento $EmpresasMeiopagamento
 */
class MeioPagamento extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'EmpresasMeiopagamento' => array(
			'className' => 'EmpresasMeiopagamento',
			'foreignKey' => 'meio_pagamento_id',
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
                $form_select = array();
                
		$resultado = $this->find('all', array('recursive' => 0));
		
                
		foreach($resultado as $item){
			$form_select[$item['MeioPagamento']['id']] = $item['MeioPagamento']['nome'];
		}
		
		return $form_select;
	}

}
