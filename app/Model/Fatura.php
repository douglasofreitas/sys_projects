<?php
App::uses('AppModel', 'Model');
/**
 * Fatura Model
 *
 * @property Fornecedor $Fornecedor
 * @property FaturaStatus $FaturaStatus
 * @property EmpresasMeiopagamento $EmpresasMeiopagamento
 * @property User $User
 * @property Caixa $Caixa
 */
class Fatura extends AppModel {
        var $order = array('Fatura.data_vencimento DESC');
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'fatura_status_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
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
		'fornecedor_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'projeto_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Fornecedor' => array(
			'className' => 'Fornecedor',
			'foreignKey' => 'fornecedor_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Orcamento' => array(
			'className' => 'Orcamento',
			'foreignKey' => 'orcamento_id',
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
		'Pessoa' => array(
			'className' => 'User',
			'foreignKey' => 'pessoa_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'FaturaStatus' => array(
			'className' => 'FaturaStatus',
			'foreignKey' => 'fatura_status_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'EmpresasMeiopagamento' => array(
			'className' => 'EmpresasMeiopagamento',
			'foreignKey' => 'empresas_meiopagamento_id',
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
		'Caixa' => array(
			'className' => 'Caixa',
			'foreignKey' => 'fatura_id',
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
            $ult_numero = $this->find('first', array('conditions' => array('Fatura.empresa_id' => $_SESSION['Empresa']['id']), 'fields' => 'MAX(Fatura.codigo) AS codigo', 'recursive' => '0'));
            if(!empty($ult_numero[0]['codigo']))
                return intval($ult_numero[0]['codigo'])+1;
            else
                return 1;
        }
        
        function getIdByCodigo($codigo){
            $projeto = $this->find('first', array('conditions' => array('Fatura.empresa_id' => $_SESSION['Empresa']['id'], $this->alias.'.codigo' => $codigo), 'fields' => $this->alias.'.id', 'recursive' => '0'));
            
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
            if (!empty($this->data['Fatura']['codigo']) && empty($this->data['Fatura']['id'])) {
                $this->data['Fatura']['id'] = $this->getIdByCodigo($this->data['Fatura']['codigo']);
            }
            
            //verificar qual a origem para obter o id 
            if (!empty($this->data['Fatura']['codigo_orcamento_id'])) {
                $this->data['Fatura']['orcamento_id'] = $this->Orcamento->getIdByCodigo($this->data['Fatura']['codigo_orcamento_id']);
            }else $this->data['Fatura']['orcamento_id'] = '';
            if (!empty($this->data['Fatura']['codigo_projeto_id'])) {
                $this->data['Fatura']['projeto_id'] = $this->Projeto->getIdByCodigo($this->data['Fatura']['codigo_projeto_id']);
            }else $this->data['Fatura']['projeto_id'] = '';
            if (!empty($this->data['Fatura']['codigo_pessoa_id'])) {
                $this->data['Fatura']['pessoa_id'] = $this->data['Fatura']['codigo_pessoa_id'];
            }else $this->data['Fatura']['pessoa_id'] = '';
            if (!empty($this->data['Fatura']['codigo_fornecedor_id'])) {
                $this->data['Fatura']['fornecedor_id'] = $this->Fornecedor->getIdByCodigo($this->data['Fatura']['codigo_fornecedor_id']);
            }else $this->data['Fatura']['fornecedor_id'] = '';
            
            
            if (empty($this->data['Fatura']['fatura_status_id'])) {
                $this->data['Fatura']['fatura_status_id'] = 1;
            }
            if (!empty($this->data['Fatura']['data_vencimento_form'])) {
                $this->data['Fatura']['data_vencimento'] = $this->dateFormatBeforeSave($this->data['Fatura']['data_vencimento_form']);
            }
            if (!empty($this->data['Fatura']['data_pagamento_form'])) {
                $this->data['Fatura']['data_pagamento'] = $this->dateFormatBeforeSave($this->data['Fatura']['data_pagamento_form']);
            }
            
            
            $this->data[$this->alias]['empresa_id'] = $_SESSION['Empresa']['id'];
            
            return true;
        }
        
        function gerarFatura($dados){
            $processo = true;
            
            $dataSource = $this->getDataSource();
            $dataSource->begin();
            
            if($this->save($dados)){
                if(!empty($dados['Fatura']['multiplas_faturas'])){
                    //gerar mais faturas
                    for($i = 1; $i <= $dados['Fatura']['num_parcelas']; $i++){
                        //atualizar data de vencimento
                        $this->log("Vencimento da fatura: ".$dados['Fatura']['data_vencimento_form'], 'debug');
                        $dados['Fatura']['data_vencimento_form'] = $this->incrementarData($dados['Fatura']['data_vencimento_form'], $dados['Fatura']['intervalo_meses']);
                        $this->log("Novo Vencimento da fatura: ".$dados['Fatura']['data_vencimento_form'], 'debug');
                        $this->create();
                        if(!$this->save($dados)){
                            $processo = false;
                        }
                    }
                }
            }else{
                $processo = false;
            }
            
            //confere processo estar ok
            if ($processo) {
                $dataSource->commit();
                return true;
            } else {
                $dataSource->rollback();
                return false;
            }
            
        }

    function isFaturaAssociada($id, $user_id){
        //obter o id do vínculo para verificar associação
        $fatura = $this->find('first', array('conditions' => array('Fatura.id' => $id), 'recursive' => -1));

        if($fatura){

            if(!empty($fatura['Fatura']['projeto_id'])){
                if($this->Projeto->isProjetoAssociado($fatura['Fatura']['projeto_id'], $user_id))
                    return true;
            }elseif(!empty($fatura['Fatura']['orcamento_id'])){
                if($this->Orcamento->isOrcamentoAssociado($fatura['Fatura']['orcamento_id'], $user_id))
                    return true;
            }
        }
        return false;
    }

    function isDonoFatura($id, $user_id){
        //obter o id do vínculo para verificar associação
        $fatura = $this->find('first', array('conditions' => array('Fatura.id' => $id, 'Fatura.pessoa_id' => $user_id), 'recursive' => -1));

        if($fatura){
            return true;
        }
        return false;
    }

}
