<?php
App::uses('AppModel', 'Model');
/**
 * Cliente Model
 *
 * @property User $User
 * @property Empresa $Empresa
 * @property Projeto $Projeto
 */
class Cliente extends AppModel {

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
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
        'Projeto' => array(
            'className' => 'Projeto',
            'foreignKey' => 'cliente_id',
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
            'foreignKey' => 'cliente_id',
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
        $ult_numero = $this->find('first', array('conditions' => array('Cliente.empresa_id' => $_SESSION['Empresa']['id']), 'fields' => 'MAX(Cliente.codigo) AS codigo', 'recursive' => '0'));
        if(!empty($ult_numero[0]['codigo']))
            return intval($ult_numero[0]['codigo'])+1;
        else
            return 1;
    }

    function getCodigoByID($id){
        $resultado = $this->find('first', array('conditions' => array('Cliente.id' => $id), 'recursive' => '-1'));
        if($resultado)
            return $resultado['Cliente']['codigo'];
        else
            return null;
    }

    function getIDbyCodigo($codigo){
        $resultado = $this->find('first', array('conditions' => array('Cliente.codigo' => $codigo, 'Cliente.empresa_id' => $_SESSION['Empresa']['id']), 'recursive' => '-1'));
        if($resultado)
            return $resultado['Cliente']['id'];
        else
            return null;
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

    function getFormSelectDesenvolvedor(){

        //Obter os projetos do desenvolvedor
        $projetos_id = $this->Projeto->ProjetosUser->getProjetosByUser($_SESSION['User']['id']);
        $clientes_id = $this->getClientesByProjetos($projetos_id);

        $conditions = array();
        $form_select = array();
        $conditions[$this->alias.'.empresa_id'] = $_SESSION['Empresa']['id'];
        $conditions[$this->alias.'.id'] = $clientes_id;
        $resultado = $this->find('all', array('conditions' => $conditions, 'recursive' => '-1'));

        foreach($resultado as $item){
            $form_select[$item[$this->alias]['codigo']] = $item[$this->alias]['nome'];
        }

        return $form_select;
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

    function remove_user($codigo_cliente, $codigo_user){
        $cliente_id = $this->getIdByCodigo($codigo_cliente);
        $user_id = $this->User->getIdByCodigo($codigo_user);

        $clienteuser = $this->ClientesUser->find('first', array('conditions' => array('ClientesUser.cliente_id' => $cliente_id, 'ClientesUser.user_id' => $user_id), 'fields' => 'ClientesUser.id', 'recursive' => '-1'));
        if(!empty($clienteuser['ClientesUser']['id'])){
            if($this->ClientesUser->delete($clienteuser['ClientesUser']['id'])){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    function associa_user($codigo_cliente, $codigo_user){
        $cliente_id = $this->getIdByCodigo($codigo_cliente);
        $user_id = $this->User->getIdByCodigo($codigo_user);

        $clienteuser = $this->ClientesUser->find('first', array('conditions' => array('ClientesUser.cliente_id' => $cliente_id, 'ClientesUser.user_id' => $user_id), 'fields' => 'ClientesUser.id', 'recursive' => '-1'));
        if(!empty($clienteuser['ClientesUser']['id'])){
            return true;
        }else{
            $item = array();
            $item['ClientesUser']['cliente_id'] = $cliente_id;
            $item['ClientesUser']['user_id'] = $user_id;
            if($this->ClientesUser->save($item))
                return true;
            else
                return false;
        }
    }

    function getAssociados($id){
        $associados = $this->ClientesUser->find('all', array('conditions' =>
        array('ClientesUser.cliente_id' => $id),
            'recursive' => 1));
        return $associados;
    }

    function getClientesByProjetos($projetos_id){
        $clientes = $this->Projeto->find('all', array('conditions' => array('Projeto.id' => $projetos_id)));
        $clientes_id = array();

        if($clientes){
            foreach($clientes as $cliente){
                $clientes_id[] = $cliente['Projeto']['cliente_id'];
            }

            return $clientes_id;
        }

        return null;
    }

    function isDesenvolvedorAssociado($cliente_id){
        $projetos_id = $this->Projeto->ProjetosUser->getProjetosByUser($_SESSION['User']['id']);
        $clientes_id = $this->getClientesByProjetos($projetos_id);

        foreach($clientes_id as $key => $id){
            if($cliente_id == $id){
                return true;
            }
        }

        return false;
    }

}
