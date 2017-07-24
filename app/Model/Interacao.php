<?php
App::uses('AppModel', 'Model');
/**
 * Interacao Model
 *
 * @property Chamado $Chamado
 * @property User $User
 * @property InteracaoArquivo $InteracaoArquivo
 */
class Interacao extends AppModel {

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
		'user_id' => array(
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
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
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
		'InteracaoArquivo' => array(
			'className' => 'InteracaoArquivo',
			'foreignKey' => 'interacao_id',
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
       
	
        
        function getIdByCodigo($codigo){
            $chamado = $this->find('first', array('conditions' => array('Interacao.empresa_id' => $_SESSION['Empresa']['id'], 'Interacao.codigo' => $codigo), 'fields' => 'Interacao.id', 'recursive' => '0', 'order' => 'Interacao.codigo DESC'));
            
            if(!empty($chamado['Interacao']['id']))
                return $chamado['Interacao']['id'];
            else
                return null;
        }
        
        function getCodigoByID($id){
            $resultado = $this->find('first', array('conditions' => array('Interacao.id' => $id), 'recursive' => '-1'));
            if($resultado)
                return $resultado['Interacao']['codigo'];
            else
                return null;       
        }
        
        function geraProximoCodigo(){
            $ult_numero = $this->find('first', array('conditions' => array('Interacao.empresa_id' => $_SESSION['Empresa']['id']), 'fields' => 'MAX(Interacao.codigo) AS codigo', 'recursive' => '0'));
            if(!empty($ult_numero[0]['codigo']))
                return intval($ult_numero[0]['codigo'])+1;
            else
                return 1;
        }
        

        
        public function beforeSave($options = array()) {
            if (empty($this->data['Interacao']['user_id'])) {
                $this->data['Interacao']['user_id'] = $_SESSION['User']['id'];
            }
            if (empty($this->data['Interacao']['codigo']) && empty($this->data['Interacao']['id'])) {
                $this->data['Interacao']['codigo'] = $this->geraProximoCodigo();
            }
            $this->data['Interacao']['empresa_id'] = $_SESSION['Empresa']['id'];
            if(!empty($this->data['Interacao']['codigo_chamado'])){
                $this->data['Interacao']['chamado_id'] = $this->Chamado->getIdByCodigo($this->data['Interacao']['codigo_chamado']);
            }
            
            //verifica se houve mudança de status
            if($this->data['Interacao']['status_chamado_atual'] != $this->data['Interacao']['status_chamado_novo']){
                if(!$this->Chamado->atualizaStatus($this->data['Interacao']['chamado_id'], $this->data['Interacao']['status_chamado_novo']))
                    return false;
            }
            
            return true;
        }

}
