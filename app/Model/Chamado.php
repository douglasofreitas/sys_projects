<?php
App::uses('AppModel', 'Model');
/**
 * Chamado Model
 *
 * @property Projeto $Projeto
 * @property ChamadoStatus $ChamadoStatus
 * @property ChamadoTipo $ChamadoTipo
 * @property ChamadoPrioridade $ChamadoPrioridade
 * @property User $User
 * @property ChamadoArquivo $ChamadoArquivo
 * @property Interacao $Interacao
 */
class Chamado extends AppModel {
    var $order = array('Chamado.chamado_prioridade_id DESC, Chamado.modified DESC');
    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'projeto_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'chamado_status_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'chamado_tipo_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'chamado_prioridade_id' => array(
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
        'Projeto' => array(
            'className' => 'Projeto',
            'foreignKey' => 'projeto_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'ChamadoStatus' => array(
            'className' => 'ChamadoStatus',
            'foreignKey' => 'chamado_status_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'ChamadoTipo' => array(
            'className' => 'ChamadoTipo',
            'foreignKey' => 'chamado_tipo_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'ChamadoPrioridade' => array(
            'className' => 'ChamadoPrioridade',
            'foreignKey' => 'chamado_prioridade_id',
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
        'ChamadoPai' => array(
            'className' => 'Chamado',
            'foreignKey' => 'chamado_pai',
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
        'ChamadoArquivo' => array(
            'className' => 'ChamadoArquivo',
            'foreignKey' => 'chamado_id',
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
        'Interacao' => array(
            'className' => 'Interacao',
            'foreignKey' => 'chamado_id',
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
        $chamado = $this->find('first', array('conditions' => array('Projeto.empresa_id' => $_SESSION['Empresa']['id'], 'Chamado.codigo' => $codigo), 'fields' => 'Chamado.id', 'recursive' => '0', 'order' => 'Chamado.codigo DESC'));

        if(!empty($chamado['Chamado']['id']))
            return $chamado['Chamado']['id'];
        else
            return null;
    }

    function getCodigoByID($id){
        $resultado = $this->find('first', array('conditions' => array('Chamado.id' => $id), 'recursive' => '-1'));
        if($resultado)
            return $resultado['Chamado']['codigo'];
        else
            return null;
    }

    function geraProximoCodigo(){
        $ult_numero = $this->find('first', array('conditions' => array('Projeto.empresa_id' => $_SESSION['Empresa']['id']), 'fields' => 'MAX(Chamado.codigo) AS codigo', 'recursive' => '0'));
        if(!empty($ult_numero[0]['codigo']))
            return intval($ult_numero[0]['codigo'])+1;
        else
            return 1;
    }


    public function beforeSave($options = array()) {
        if (!empty($this->data['Chamado']['data_finalizacao_form'])) {
            $this->data['Chamado']['data_finalizacao'] = $this->dateFormatBeforeSave($this->data['Chamado']['data_finalizacao_form']);
        }
        if (!empty($this->data['Chamado']['data_inicio_form'])) {
            $this->data['Chamado']['data_inicio'] = $this->dateFormatBeforeSave($this->data['Chamado']['data_inicio_form']);
        }
        if (empty($this->data['Chamado']['user_id'])) {
            $this->data['Chamado']['user_id'] = $_SESSION['User']['id'];
        }
        if (empty($this->data['Chamado']['codigo']) && empty($this->data['Chamado']['id'])) {
            $this->data['Chamado']['codigo'] = $this->geraProximoCodigo();
        }
        if(!empty($this->data['Chamado']['codigo_projeto'])){
            $this->data['Chamado']['projeto_id'] = $this->Projeto->getIdByCodigo($this->data['Chamado']['codigo_projeto']);
        }
        if(!empty($this->data['Chamado']['codigo_chamado_pai'])){
            $this->data['Chamado']['chamado_pai'] = $this->getIdByCodigo($this->data['Chamado']['codigo_chamado_pai']);
        }
        return true;
    }


    function atualizaStatus($id, $chamado_status_id){
        $chamado = $this->find('first', array('conditions' => array('Chamado.id' => $id), 'fields' => 'Chamado.id', 'recursive' => '-1'));

        if($chamado){
            $chamado['Chamado']['chamado_status_id'] = $chamado_status_id;
            if($this->save($chamado)){
                return true;
            }else{
                return false;
            }
        }
        return false;
    }
    public function updateModified($codigo){
        $chamado = array();
        $chamado['Chamado']['id'] = $this->getIdByCodigo($codigo);
        $chamado['Chamado']['modified'] = date('Y-m-d H:m:s');

        //verifica status do chamado, se estiver em desenvolvimento, verificar se esta associado o desenvolvedor
        $get_chamado = $this->find('first', array('conditions' => array('Chamado.id' => $this->getIdByCodigo($codigo)), 'recursive' => '1'));
        if($get_chamado){
            if($get_chamado['Chamado']['chamado_status_id'] == 2){
                if($get_chamado['Chamado']['desenvolvedor_id']){
                    $chamado['Chamado']['desenvolvedor_id'] = $_SESSION['User']['id'];
                }
            }
        }

        $this->save($chamado);
    }

    function getInteracoes($id){
        $resultado = $this->Interacao->find('all', array('conditions' => array('Interacao.chamado_id' => $id), 'recursive' => '1'));
        if($resultado)
            return $resultado;
        else
            return null;
    }

    function fazer_chamado($codigo_chamado){

        $chamado = $this->read(null, $this->getIdByCodigo($codigo_chamado));
        if(empty($chamado)) return -1;

        //verificar status do chamado para permitir a ação, no caso: Em desenvolvimento, Pendente com o cliente
        if($chamado['Chamado']['chamado_status_id'] !=  1 && $chamado['Chamado']['chamado_status_id'] != 3 ) return 0;

        //gravar interação para Em desenvolvimento
        $array_interacao = array();
        $array_interacao['Interacao']['codigo_chamado'] = $codigo_chamado;
        $array_interacao['Interacao']['status_chamado_atual'] = $chamado['Chamado']['chamado_status_id'];
        $array_interacao['Interacao']['status_chamado_novo'] = 2;
        if($this->Interacao->save($array_interacao)){
            //associar o usuário como desenvolvedor
            $chamado['Chamado']['desenvolvedor_id'] = $_SESSION['User']['id'];
            $chamado['Chamado']['chamado_status_id'] = 2;
            if($this->save($chamado)){
                return 1;
            }else return 2;
        }else{
            return 2;
        }
    }


    public function getChamadosDesenvolvimento($desenvolvedor_id = null, $count = false){
        $conditions = array();
        $conditions[$this->alias.'.chamado_status_id'] = 2;
        $conditions['Projeto.empresa_id'] = $_SESSION['Empresa']['id'];

        if(!empty($desenvolvedor_id))
            $conditions[$this->alias.'.desenvolvedor_id'] = $desenvolvedor_id;
        if($count)
            return $this->find('count', array('conditions' => $conditions, 'order' => 'Chamado.chamado_prioridade_id DESC, Chamado.modified DESC'));
        else
            return $this->find('all', array('conditions' => $conditions));
    }

    public function getChamadosAnalise($count = false){
        $conditions = array();
        $conditions[$this->alias.'.chamado_status_id'] = 1;
        $conditions[$this->alias.'.chamado_prioridade_id <> '] = 1;
        $conditions['Projeto.empresa_id'] = $_SESSION['Empresa']['id'];
        $conditions['Projeto.projeto_status_id <> '] = 3;

        if($count)
            return $this->find('count', array('conditions' => $conditions));
        else
            return $this->find('all', array('conditions' => $conditions));
    }

    public function getChamadosConcluidos($count){
        $conditions = array();
        $conditions[$this->alias.'.chamado_status_id'] = 4;
        $conditions['Projeto.empresa_id'] = $_SESSION['Empresa']['id'];

        return $this->find('all', array('conditions' => $conditions, 'limit' => $count));
    }


    function getChamadosFilho($id){
        $conditions = array();
        $conditions[$this->alias.'.chamado_pai'] = $id;

        if($_SESSION['perfil_atual'] == 5)
            $conditions[$this->alias.'.oculto'] = 0;

        return $this->find('all', array('conditions' => $conditions));
    }

    public function isChamadoAssociado($id, $user_id){

        //obter o id do projeto para verificar associação
        $chamado = $this->find('first', array('conditions' => array('Chamado.id' => $id), 'recursive' => -1));

        if($chamado){
            $resultado = $this->Projeto->ProjetosUser->find('all', array('conditions' => array('ProjetosUser.projeto_id' => $chamado['Chamado']['projeto_id'], 'ProjetosUser.user_id' => $user_id), 'recursive' => -1));
            if($resultado)
                return true;
            else
                return false;
        }else{
            return false;
        }
    }

    public function isOculto($id){

        //obter o id do projeto para verificar associação
        $chamado = $this->find('first', array('conditions' => array('Chamado.id' => $id, 'Chamado.oculto' => 1), 'recursive' => -1));

        if($chamado){
            return true;
        }else{
            return false;
        }
    }

    public function isDono($id){
        $chamado = $this->find('first', array('conditions' => array('Chamado.id' => $id, 'Chamado.user_id' => $_SESSION['User']['id']), 'recursive' => -1));

        if($chamado){
            return true;
        }else{
            return false;
        }
    }

}
