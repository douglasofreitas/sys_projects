<?php
App::uses('AppModel', 'Model');
/**
 * ChamadoTipo Model
 *
 * @property Chamado $Chamado
 */
class ChamadoTipo extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
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
		)
	);
    
	public $hasMany = array(
		'Chamado' => array(
			'className' => 'Chamado',
			'foreignKey' => 'chamado_tipo_id',
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

        function getFormSelect($conditions = array(), $empresa_id = null){
                $form_select = array();
                //$conditions = array();
                if(!empty($empresa_id))
                    $conditions[$this->alias.'.empresa_id'] = $empresa_id;
                else
                    $conditions[$this->alias.'.empresa_id'] = $_SESSION['Empresa']['id'];
            
		$resultado = $this->find('all', array('conditions' => $conditions, 'recursive' => '-1'));
		
		foreach($resultado as $item){
			$form_select[$item[$this->alias]['id']] = $item[$this->alias]['nome'];
		}
		
		return $form_select;
	}
        
}
