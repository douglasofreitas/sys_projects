<?php
App::uses('AppModel', 'Model');
/**
 * ProjetoStatus Model
 *
 * @property Projeto $Projeto
 */
class ProjetoStatus extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Projeto' => array(
			'className' => 'Projeto',
			'foreignKey' => 'projeto_status_id',
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
        //2	Em execução
        //3	Em pausa
        //4	Concluído
        //5	Cancelado

        
         function getFormSelect($conditions = array()){
                $form_select = array();
                
		$resultado = $this->find('all', array('conditions' => $conditions, 'recursive' => '-1'));
		
		foreach($resultado as $item){
			$form_select[$item['ProjetoStatus']['id']] = $item['ProjetoStatus']['nome'];
		}
		
		return $form_select;
	}
}
