<?php
App::uses('AppModel', 'Model');
/**
 * OrcamentoStatus Model
 *
 * @property Orcamento $Orcamento
 */
class OrcamentoStatus extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Orcamento' => array(
			'className' => 'Orcamento',
			'foreignKey' => 'orcamento_status_id',
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
	
        //status
        //1	Criado
        //2	Análise pelo cliente
        //3	Aprovado
        //4	Rejeitado
        //5	Cancelado

        
	function getFormSelect($conditions = array()){
                $form_select = array();
                
		$resultado = $this->find('all', array('conditions' => $conditions, 'recursive' => '-1'));
		
		foreach($resultado as $item){
			$form_select[$item['OrcamentoStatus']['id']] = $item['OrcamentoStatus']['nome'];
		}
		
		return $form_select;
	}

}
