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
 */
class Projeto extends AppModel {
        var $order = array('Projeto.nome ASC');
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'cliente_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'projeto_status_id' => array(
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
		'Cliente' => array(
			'className' => 'Cliente',
			'foreignKey' => 'cliente_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ProjetoStatus' => array(
			'className' => 'ProjetoStatus',
			'foreignKey' => 'projeto_status_id',
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
		),
		'Empresa' => array(
			'className' => 'Empresa',
			'foreignKey' => 'empresa_id',
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
		'Chamado' => array(
			'className' => 'Chamado',
			'foreignKey' => 'projeto_id',
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
		'Orcamento' => array(
			'className' => 'Orcamento',
			'foreignKey' => 'projeto_id',
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
		'Fatura' => array(
			'className' => 'Fatura',
			'foreignKey' => 'projeto_id',
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
		'ProjetosUser' => array(
			'className' => 'ProjetosUser',
			'foreignKey' => 'projeto_id',
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
            $ult_numero = $this->find('first', array('conditions' => array('Projeto.empresa_id' => $_SESSION['Empresa']['id']), 'fields' => 'MAX(Projeto.codigo) AS codigo', 'recursive' => '0'));
            if(!empty($ult_numero[0]['codigo']))
                return intval($ult_numero[0]['codigo'])+1;
            else
                return 1;
        }
        
        function getIdByCodigo($codigo){
            $projeto = $this->find('first', array('conditions' => array('Projeto.empresa_id' => $_SESSION['Empresa']['id'], $this->alias.'.codigo' => $codigo), 'fields' => $this->alias.'.id', 'recursive' => '0'));
            
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
            if (!empty($this->data['Projeto']['data_inicio_desenvolvimento_form'])) {
                $this->data['Projeto']['data_inicio_desenvolvimento'] = $this->dateFormatBeforeSave($this->data['Projeto']['data_inicio_desenvolvimento_form']);
            }
            if (!empty($this->data['Projeto']['data_fim_desenvolvimento_form'])) {
                $this->data['Projeto']['data_fim_desenvolvimento'] = $this->dateFormatBeforeSave($this->data['Projeto']['data_fim_desenvolvimento_form']);
            }
            if (empty($this->data['Projeto']['user_id'])) {
                $this->data['Projeto']['user_id'] = $_SESSION['User']['id'];
            }
            if (empty($this->data['Projeto']['empresa_id'])) {
                $this->data['Projeto']['empresa_id'] = $_SESSION['Empresa']['id'];
            }
            if (empty($this->data['Projeto']['codigo']) && empty($this->data['Projeto']['id'])) {
                $this->data['Projeto']['codigo'] = $this->geraProximoCodigo();
            }
            if(!empty($this->data['Projeto']['codigo_cliente'])){
                $this->data['Projeto']['cliente_id'] = $this->Cliente->getIDbyCodigo($this->data['Projeto']['codigo_cliente']);
            }
            return true;
        }
        
    function getFormSelect($conditions = array(), $empresa_id = null){
        $form_select = array();



        if(!empty($empresa_id))
            $conditions[$this->alias.'.empresa_id'] = $empresa_id;
        else
            $conditions[$this->alias.'.empresa_id'] = $_SESSION['Empresa']['id'];

		$resultado = $this->find('all', array('conditions' => $conditions, 'recursive' => '-1'));
		
		foreach($resultado as $item){
			$form_select[$item[$this->alias]['codigo']] = $item[$this->alias]['nome'];
		}
		
		return $form_select;
	}

    function getFormSelectByUser($user_id){
        $form_select = array();
        $conditions = array();

        $conditions['Projeto.id'] = $this->getProjetosAssociados($user_id);

        if(!empty($empresa_id))
            $conditions[$this->alias.'.empresa_id'] = $empresa_id;
        else
            $conditions[$this->alias.'.empresa_id'] = $_SESSION['Empresa']['id'];

        $resultado = $this->find('all', array('conditions' => $conditions, 'recursive' => '-1'));

        foreach($resultado as $item){
            $form_select[$item[$this->alias]['codigo']] = $item[$this->alias]['nome'];
        }

        return $form_select;
    }
	
	function remove_user($codigo_projeto, $codigo_user){
		$projeto_id = $this->getIdByCodigo($codigo_projeto);
		$user_id = $this->User->getIdByCodigo($codigo_user);
		
		$projetouser = $this->ProjetosUser->find('first', array('conditions' => array('ProjetosUser.projeto_id' => $projeto_id, 'ProjetosUser.user_id' => $user_id), 'fields' => 'ProjetosUser.id', 'recursive' => '-1'));
		if(!empty($projetouser['ProjetosUser']['id'])){
			if($this->ProjetosUser->delete($projetouser['ProjetosUser']['id'])){
                            return true;
			}else{
                            return false;
			}
		}else{
			return false;
		}
	}
	
	function associa_user($codigo_projeto, $codigo_user){
            $projeto_id = $this->getIdByCodigo($codigo_projeto);
            $user_id = $this->User->getIdByCodigo($codigo_user);
            
            $projetouser = $this->ProjetosUser->find('first', array('conditions' => array('ProjetosUser.projeto_id' => $projeto_id, 'ProjetosUser.user_id' => $user_id), 'fields' => 'ProjetosUser.id', 'recursive' => '-1'));
            if(!empty($projetouser['ProjetosUser']['id'])){
                return true;
            }else{
                $item = array();
                $item['ProjetosUser']['projeto_id'] = $projeto_id;
                $item['ProjetosUser']['user_id'] = $user_id;
                $item['ProjetosUser']['data_inicio'] = date('Y-m-d');
                if($this->ProjetosUser->save($item))
                    return true;
                else
                    return false;    
            }
	}
	
	function remove_orcamento($codigo_projeto, $codigo_orcamento){
		$projeto_id = $this->getIdByCodigo($codigo_projeto);
		$orcamento_id = $this->Orcamento->getIdByCodigo($codigo_orcamento);
		
		$orcamento = array();
		$orcamento['Orcamento']['id'] = $orcamento_id;
		$orcamento['Orcamento']['projeto_id'] = '';
		if($this->Orcamento->save($orcamento)){
			return true;
		}else{
			return false;
		}
	}
	
	function associa_orcamento($codigo_projeto, $codigo_orcamento){
		$projeto_id = $this->getIdByCodigo($codigo_projeto);
		$orcamento_id = $this->Orcamento->getIdByCodigo($codigo_orcamento);
	
		$orcamento = array();
		$orcamento['Orcamento']['id'] = $orcamento_id;
		$orcamento['Orcamento']['projeto_id'] = $projeto_id;
		if($this->Orcamento->save($orcamento)){
			return true;
		}else{
			return false;
		}
	}
	
	function getAssociados($id){
		$associados = $this->ProjetosUser->find('all', array('conditions' => 
			array('ProjetosUser.projeto_id' => $id), 
			'recursive' => 1));
		return $associados;
	}
	
    function getOrcamentos($id){
		$orcamentos = $this->Orcamento->find('all', array('conditions' => 
			array('Orcamento.projeto_id' => $id), 
			'recursive' => 1));
		return $orcamentos;
	}
        
    public function getListaProjetos($busca = ''){
        $resultado = $this->find('all', array('conditions' => array('Projeto.empresa_id' => $_SESSION['Empresa']['id'], 'Projeto.nome LIKE' => '%'.$busca.'%'), 'recursive' => 1));
        $lista = array();

        if(count($resultado));
        foreach($resultado as $item){
            $lista[] = $item['Projeto'];
        }

        return $lista;
    }

    public function getProjetosAssociados($user_id){
        $resultado = $this->ProjetosUser->find('all', array('conditions' => array('ProjetosUser.user_id' => $user_id), 'recursive' => -1));

        $lista = array();

        if(count($resultado));
        foreach($resultado as $item){
            $lista[] = $item['ProjetosUser']['projeto_id'];
        }
        return $lista;
    }

    public function isProjetoAssociado($id, $user_id){
        $resultado = $this->ProjetosUser->find('all', array('conditions' => array('ProjetosUser.projeto_id' => $id, 'ProjetosUser.user_id' => $user_id), 'recursive' => -1));

        if($resultado)
            return true;
        else
            return false;

    }



        
	
}
