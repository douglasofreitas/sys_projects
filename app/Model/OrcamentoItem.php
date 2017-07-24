<?php
App::uses('AppModel', 'Model');
/**
 * OrcamentoItem Model
 *
 * @property Orcamento $Orcamento
 */
class OrcamentoItem extends AppModel {

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
	
	function getIdByCodigo($codigo){
		$chamado = $this->find('first', array('conditions' => array('OrcamentoItem.empresa_id' => $_SESSION['Empresa']['id'], 'OrcamentoItem.codigo' => $codigo), 'fields' => 'OrcamentoItem.id', 'recursive' => '0', 'order' => 'OrcamentoItem.codigo DESC'));
		
		if(!empty($chamado['OrcamentoItem']['id']))
			return $chamado['OrcamentoItem']['id'];
		else
			return null;
	}
	
	function getCodigoByID($id){
		$resultado = $this->find('first', array('conditions' => array('OrcamentoItem.id' => $id), 'recursive' => '-1'));
		if($resultado)
			return $resultado['OrcamentoItem']['codigo'];
		else
			return null;       
	}
	
	function geraProximoCodigo(){
		$ult_numero = $this->find('first', array('conditions' => array('Orcamento.empresa_id' => $_SESSION['Empresa']['id']), 'fields' => 'MAX(OrcamentoItem.codigo) AS codigo', 'recursive' => '0'));
		if(!empty($ult_numero[0]['codigo']))
			return intval($ult_numero[0]['codigo'])+1;
		else
			return 1;
	}

	public function beforeSave($options = array()) {
		
		if (empty($this->data['OrcamentoItem']['codigo']) && empty($this->data['OrcamentoItem']['id'])) {
			$this->data['OrcamentoItem']['codigo'] = $this->geraProximoCodigo();
		}
		$this->data['OrcamentoItem']['empresa_id'] = $_SESSION['Empresa']['id'];
		if(!empty($this->data['OrcamentoItem']['codigo_orcamento'])){
			$this->data['OrcamentoItem']['orcamento_id'] = $this->Orcamento->getIdByCodigo($this->data['OrcamentoItem']['codigo_orcamento']);
		}
		
                if(!empty($this->data['OrcamentoItem']['valor_form'])){
			$this->data['OrcamentoItem']['valor'] = $this->valorFormatBeforeSave($this->data['OrcamentoItem']['valor_form']);
		}
        
		if(empty($this->data['OrcamentoItem']['valor_form']) || empty($this->data['OrcamentoItem']['quantidade']) || empty($this->data['OrcamentoItem']['nome']))
			return false;
		
		return true;
	}
	
	
	
}
