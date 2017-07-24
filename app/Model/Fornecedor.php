<?php
App::uses('AppModel', 'Model');
/**
 * Fornecedor Model
 *
 * @property Empresa $Empresa
 * @property User $User
 * @property Fatura $Fatura
 * @property User $User
 */
class Fornecedor extends AppModel {

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
		'Fatura' => array(
			'className' => 'Fatura',
			'foreignKey' => 'fornecedor_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
                'FornecedorsUser' => array(
			'className' => 'FornecedorsUser',
			'foreignKey' => 'fornecedor_id',
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
        
        function geraProximoCodigo(){
            $ult_numero = $this->find('first', array('conditions' => array('Fornecedor.empresa_id' => $_SESSION['Empresa']['id']), 'fields' => 'MAX(Fornecedor.codigo) AS codigo', 'recursive' => '0'));
            if(!empty($ult_numero[0]['codigo']))
                return intval($ult_numero[0]['codigo'])+1;
            else
                return 1;
        }
        
        function getIdByCodigo($codigo){
            $projeto = $this->find('first', array('conditions' => array('Fornecedor.empresa_id' => $_SESSION['Empresa']['id'], $this->alias.'.codigo' => $codigo), 'fields' => $this->alias.'.id', 'recursive' => '0'));
            
            if(!empty($projeto[$this->alias]['id']))
                return $projeto[$this->alias]['id'];
            else
                return null;
        }
        
        function getCodigoByID($id){
            $resultado = $this->find('first', array('conditions' => array($this->alias.'.id' => $id), 'recursive' => '-1'));
            if($resultado)
                return $resultado[$this->alias]['codigo'];
            else
                return null;       
        }
        

        
        public function beforeSave($options = array()) {
            if (empty($this->data[$this->alias]['user_id'])) {
                $this->data[$this->alias]['user_id'] = $_SESSION['User']['id'];
            }
            if (empty($this->data[$this->alias]['codigo']) && empty($this->data[$this->alias]['id'])) {
                $this->data[$this->alias]['codigo'] = $this->geraProximoCodigo();
            }
            $this->data[$this->alias]['empresa_id'] = $_SESSION['Empresa']['id'];
            
            return true;
        }
	
	function remove_user($codigo_fornecedor, $codigo_user){
		$fornecedor_id = $this->getIdByCodigo($codigo_fornecedor);
		$user_id = $this->User->getIdByCodigo($codigo_user);
		
		$fornecedoruser = $this->FornecedorsUser->find('first', array('conditions' => array('FornecedorsUser.fornecedor_id' => $fornecedor_id, 'FornecedorsUser.user_id' => $user_id), 'fields' => 'FornecedorsUser.id', 'recursive' => '0'));
		if(!empty($fornecedoruser['FornecedorsUser']['id'])){
			if($this->FornecedorsUser->delete($fornecedoruser['FornecedorsUser']['id'])){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	
	function associa_user($codigo_fornecedor, $codigo_user){
		$fornecedor_id = $this->getIdByCodigo($codigo_fornecedor);
		$user_id = $this->User->getIdByCodigo($codigo_user);
		
		$clienteuser = $this->FornecedorsUser->find('first', array('conditions' => array('FornecedorsUser.fornecedor_id' => $fornecedor_id, 'FornecedorsUser.user_id' => $user_id), 'fields' => 'FornecedorsUser.id', 'recursive' => '-1'));
		if(!empty($clienteuser['FornecedorsUser']['id'])){
			return true;
		}else{
			$item = array();
			$item['FornecedorsUser']['fornecedor_id'] = $fornecedor_id;
			$item['FornecedorsUser']['user_id'] = $user_id;
			if($this->FornecedorsUser->save($item))
				return true;
			else
				return false;

		}
		
	}
	
	function getAssociados($id){
		$associados = $this->FornecedorsUser->find('all', array('conditions' => 
			array('FornecedorsUser.fornecedor_id' => $id), 
			'recursive' => 1));
		return $associados;
	}
        
        public function getListaFornecedors($busca = ''){
            $resultado = $this->find('all', array('conditions' => array('Fornecedor.empresa_id' => $_SESSION['Empresa']['id'], 'Fornecedor.nome LIKE' => '%'.$busca.'%'), 'recursive' => 1));
            $lista = array();
            
            if(count($resultado));
            foreach($resultado as $item){
                $lista[] = $item['Fornecedor'];
            }
            
            return $lista;
        }
	
}
