<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Acesso $Acesso
 * @property Chamado $Chamado
 * @property Cliente $Cliente
 * @property Fatura $Fatura
 * @property Fornecedor $Fornecedor
 * @property Horario $Horario
 * @property Interacao $Interacao
 * @property Orcamento $Orcamento
 * @property Projeto $Projeto
 * @property Empresa $Empresa
 */
class User extends AppModel {

        var $order = array('User.nome ASC');
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Acesso' => array(
			'className' => 'Acesso',
			'foreignKey' => 'user_id',
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
		'Pessoa' => array(
			'className' => 'Fatura',
			'foreignKey' => 'pessoa_id',
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
		'UserPerfil' => array(
			'className' => 'UserPerfil',
			'foreignKey' => 'user_id',
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
			'foreignKey' => 'user_id',
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
		'ClientesUser' => array(
			'className' => 'ClientesUser',
			'foreignKey' => 'user_id',
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
			'foreignKey' => 'user_id',
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
        
        function getUser($id){
            $resultado = $this->find('first', array('conditions' => array($this->alias.'.id' => $id), 'recursive' => '-1'));
            if($resultado)
                return $resultado['User'];
            else
                return null; 
        }
        
	function geraProximoCodigo(){
            $ult_numero = $this->find('first', array('conditions' => array($this->alias.'.empresa_chave_url' => $_SESSION['Empresa']['chave_url']), 'fields' => 'MAX('.$this->alias.'.codigo) AS codigo', 'recursive' => '0'));
            if(!empty($ult_numero[0]['codigo']))
                return intval($ult_numero[0]['codigo'])+1;
            else
                return 1;
        }
        
        function getIdByCodigo($codigo){
            $obj = $this->find('first', array('conditions' => array('User.empresa_chave_url' => $_SESSION['Empresa']['chave_url'], 'User.codigo' => $codigo), 'recursive' => 2));
            
            if(!empty($obj[$this->alias]['id']))
                return $obj[$this->alias]['id'];
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

        
        public function beforeSave() {
            if (isset($this->data[$this->alias]['password'])) {
                $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
            }
            if (empty($this->data[$this->alias]['empresa_chave_url'])) {
                $this->data[$this->alias]['empresa_chave_url'] = $_SESSION['Empresa']['chave_url'];
            }
            if (empty($this->data[$this->alias]['codigo']) && empty($this->data[$this->alias]['id'])) {
                $this->data[$this->alias]['codigo'] = $this->geraProximoCodigo();
            }
            return true;
        }
        
        public function getNome($id){
            $resultado = $this->find('first', array('conditions' => array('User.id' => $id), 'recursive' => '-1'));
            if($resultado)
                return $resultado['User']['nome'];
            else
                return null;  
        }
        
        public function getListaUsers($busca = ''){
            $resultado = $this->find('all', array('conditions' => array('User.empresa_chave_url' => $_SESSION['Empresa']['chave_url'], 'User.nome LIKE' => '%'.$busca.'%'),
                'fields' => array('DISTINCT User.id', 'User.codigo', 'User.nome', 'User.email'),
                'recursive' => 1));
            $lista_usuarios = array();
            
            if(count($resultado));
            foreach($resultado as $item){
                $lista_usuarios[] = $item['User'];
            }
            
            return $lista_usuarios;
        }
        
        public function listarPerfis($id){
            $resultado = $this->UserPerfil->find('all', array('conditions' => array('UserPerfil.user_id' => $id, 'UserPerfil.empresa_id' => $_SESSION['Empresa']['id']), 'recursive' => 0));
            $perfis = array();
            
            if(count($resultado));
            foreach($resultado as $item){
                $perfis[] = $item['Perfil']['nome'];
            }
            
            return $perfis;
            
        }

    public function remove_perfil($codigo, $perfil_id){
        //verifica se já possui o perfil

        $possui_perfil = $this->UserPerfil->find('first', array('conditions' => array('UserPerfil.user_id' => $this->getIdByCodigo($codigo), 'UserPerfil.empresa_id' => $_SESSION['Empresa']['id'], 'UserPerfil.perfil_id' => $perfil_id), 'recursive' => 0));

        if($possui_perfil){
            //remove perfil encontrado
            $this->UserPerfil->create();
            if($this->UserPerfil->delete($possui_perfil['UserPerfil']['id']))
                return true;
            else
                return false;
        } else return true;
    }

    public function add_perfil($codigo, $perfil_id){
        //verifica se já possui o perfil
        $user_id = $this->getIdByCodigo($codigo);
        $possui_perfil = $this->UserPerfil->find('first', array('conditions' => array('UserPerfil.user_id' => $user_id, 'UserPerfil.empresa_id' => $_SESSION['Empresa']['id'], 'UserPerfil.perfil_id' => $perfil_id), 'recursive' => 0));

        if(!$possui_perfil){
            //remove perfil encontrado
            $this->UserPerfil->create();
            $novo_perfil = array();
            $novo_perfil['UserPerfil']['user_id'] = $user_id;
            $novo_perfil['UserPerfil']['perfil_id'] = $perfil_id;
            $novo_perfil['UserPerfil']['empresa_id'] = $_SESSION['Empresa']['id'];
            if($this->UserPerfil->save($novo_perfil))
                return true;
            else
                return false;
        } else return true;
    }

    public function possuiPerfil($perfil_id){
        $possui_perfil = $this->UserPerfil->find('first', array('conditions' => array('UserPerfil.user_id' => $_SESSION['User']['id'], 'UserPerfil.empresa_id' => $_SESSION['Empresa']['id'], 'UserPerfil.perfil_id' => $perfil_id), 'recursive' => 0));

        if($possui_perfil){
            return true;
        } else return false;
    }
        
}
