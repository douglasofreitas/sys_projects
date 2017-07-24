<?php
App::uses('AppModel', 'Model');
/**
 * Orcamento Model
 *
 * @property OrcamentoStatus $OrcamentoStatus
 * @property Orcamento $Orcamento
 * @property User $User
 * @property Empresa $Empresa
 * @property Fatura $Fatura
 * @property OrcamentoArquivo $OrcamentoArquivo
 * @property OrcamentoItem $OrcamentoItem
 */
class Orcamento extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'orcamento_status_id' => array(
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
		'OrcamentoStatus' => array(
			'className' => 'OrcamentoStatus',
			'foreignKey' => 'orcamento_status_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Projeto' => array(
			'className' => 'Projeto',
			'foreignKey' => 'projeto_id',
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
		'Fatura' => array(
			'className' => 'Fatura',
			'foreignKey' => 'orcamento_id',
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
		'OrcamentoArquivo' => array(
			'className' => 'OrcamentoArquivo',
			'foreignKey' => 'orcamento_id',
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
		'OrcamentoItem' => array(
			'className' => 'OrcamentoItem',
			'foreignKey' => 'orcamento_id',
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
        
        function geraProximoCodigo(){
            $ult_numero = $this->find('first', array('conditions' => array('Orcamento.empresa_id' => $_SESSION['Empresa']['id']), 'fields' => 'MAX(Orcamento.codigo) AS codigo', 'recursive' => '0'));
            if(!empty($ult_numero[0]['codigo']))
                return intval($ult_numero[0]['codigo'])+1;
            else
                return 1;
        }
        
        function getIdByCodigo($codigo){
            $projeto = $this->find('first', array('conditions' => array('Orcamento.empresa_id' => $_SESSION['Empresa']['id'], $this->alias.'.codigo' => $codigo), 'fields' => $this->alias.'.id', 'recursive' => '0'));
            
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
            
            if (!empty($this->data['Orcamento']['data_inicio_form'])) {
                $this->data['Orcamento']['data_inicio'] = $this->dateFormatBeforeSave($this->data['Orcamento']['data_inicio_form']);
            }
            if (!empty($this->data['Orcamento']['data_fim_form'])) {
                $this->data['Orcamento']['data_fim'] = $this->dateFormatBeforeSave($this->data['Orcamento']['data_fim_form']);
            }
            if (!empty($this->data['Orcamento']['data_aprovacao_form'])) {
                $this->data['Orcamento']['data_aprovacao'] = $this->dateFormatBeforeSave($this->data['Orcamento']['data_aprovacao_form']);
            }
            
            $this->data[$this->alias]['empresa_id'] = $_SESSION['Empresa']['id'];
            
            return true;
        }
        
        public function atualizaTotal($id){
            $valor_total = 0;
            
            //obter os itens do orçamento
            $itens = $this->OrcamentoItem->find('all', array('conditions' => array('OrcamentoItem.orcamento_id' => $id)));
            
            if($itens){
                foreach($itens as $item){
                    $valor_total += $item['OrcamentoItem']['quantidade'] * $item['OrcamentoItem']['valor'];
                }
            }
            
            //atualiza total
            $orcamento = array();
            $orcamento['Orcamento']['id'] = $id;
            $orcamento['Orcamento']['valor'] = $valor_total;
            $this->create();
            $this->save($orcamento);
        }
		
        public function getListaOrcamento($tipo){
			
            //nao_associados
            $resultado = $this->find('all', array('conditions' => array('Orcamento.empresa_id' => $_SESSION['Empresa']['id'], 'Orcamento.projeto_id' => NULL), 'recursive' => 1));
			
            $lista_usuarios = array();
            
            if(count($resultado));
            foreach($resultado as $item){
                $lista_usuarios[] = $item['Orcamento'];
            }
            
            return $lista_usuarios;
        }
        
        public function getListaOrcamentos($busca = ''){
            $resultado = $this->find('all', array('conditions' => array('Orcamento.empresa_id' => $_SESSION['Empresa']['id'], 'Orcamento.nome LIKE' => '%'.$busca.'%'), 'recursive' => 1));
            $lista = array();
            
            if(count($resultado));
            foreach($resultado as $item){
                $lista[] = $item['Orcamento'];
            }
            
            return $lista;
        }
        
        public function atualiza_valor($codigo = null){
            if(empty($codigo))
                $conditions = array('Orcamento.empresa_id' => $_SESSION['Empresa']['id']);
            else
                $conditions = array('Orcamento.empresa_id' => $_SESSION['Empresa']['id'], 'Orcamento.codigo' => $codigo);
            $resultado = $this->find('all', array('conditions' => $conditions, 'recursive' => 1));
            
            if($resultado){
                foreach($resultado as $item){
                    $total = 0.0;
                    
                    foreach($item['OrcamentoItem'] as $subitem){
                        $total += $subitem['valor']*$subitem['quantidade'];
                    }
                    
                    $orcamento = array();
                    $orcamento['Orcamento']['id'] = $item['Orcamento']['id'];
                    $orcamento['Orcamento']['valor'] = $total;
                    $this->save($orcamento);
                }
            }
        }

    public function getOrcamentosAssociados($user_id){

        //obter projetos associados
        $resultado = $this->Projeto->ProjetosUser->find('all', array('conditions' => array('ProjetosUser.user_id' => $user_id), 'recursive' => -1));

        $lista = array();

        if(count($resultado));
        foreach($resultado as $item){
            $lista[] = $item['ProjetosUser']['projeto_id'];
        }


        //obter os respectivos orçamentos
        $resultado = $this->find('all', array('conditions' => array('Orcamento.projeto_id' => $lista), 'recursive' => -1));

        $lista = array();

        if(count($resultado));
        foreach($resultado as $item){
            $lista[] = $item['Orcamento']['id'];
        }

        return $lista;
    }

    public function isOrcamentoAssociado($id, $user_id){

        //obter o id do projeto para verificar associação
        $orcamento = $this->find('first', array('conditions' => array('Orcamento.id' => $id), 'recursive' => -1));

        if($orcamento){
            $resultado = $this->Projeto->ProjetosUser->find('all', array('conditions' => array('ProjetosUser.projeto_id' => $orcamento['Orcamento']['projeto_id'], 'ProjetosUser.user_id' => $user_id), 'recursive' => -1));
            if($resultado)
                return true;
            else
                return false;
        }else{
            return false;
        }
    }
}
