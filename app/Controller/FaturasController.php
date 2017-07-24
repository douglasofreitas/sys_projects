<?php
App::uses('AppController', 'Controller');
/**
 * Faturas Controller
 *
 * @property Fatura $Fatura
 */
class FaturasController extends AppController {
    public $helpers = array('Fatura');
    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->set('titulo_page', 'Faturas');
        $this->Fatura->recursive = 0;

        //verificando caso de não ser administrador
        if($this->Session->read('perfil_atual') == 5){ //cliente
            $conditions['OR'] = array(
                array('Projeto.id' => $this->Chamado->Projeto->getProjetosAssociados($this->Auth->user('id')) ),
                array('Orcamento.id' => $this->Fatura->Orcamento->getOrcamentosAssociados($this->Auth->user('id')) )
            );
        }elseif($this->Session->read('perfil_atual') == 4){  //desenvolvedor
            //verificar se esta associado com o projeto
            $conditions['Fatura.pessoa_id'] = $this->Auth->user('id');
        }

        $conditions['Fatura.empresa_id'] = $this->empresa_core['Empresa']['id'];

        $this->set('faturas', $this->paginate('Fatura', $conditions));

    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($codigo = null) {

        //obter id real
        $id = $this->Fatura->getIdByCodigo($codigo);

        //verificando caso de não ser administrador
        if($this->Session->read('perfil_atual') == 5){ //cliente
            if(!$this->Fatura->isFaturaAssociada($id, $this->Auth->user('id'))){
                $this->Session->setFlash(__('Acesso restrito'), 'alert_message', array('tipo_message' => 'alert-block'));
                $this->redirect('/users/info');
            }
        }elseif($this->Session->read('perfil_atual') == 4){  //desenvolvedor
            //verificar se esta associado ao desenvolvedor - visualiza apenas as faturas relativas a ele
            if(!$this->Fatura->isDonoFatura($id, $this->Auth->user('id'))){
                $this->Session->setFlash(__('Acesso restrito'), 'alert_message', array('tipo_message' => 'alert-block'));
                $this->redirect('/users/info');
            }
        }

        $this->set('titulo_page', 'Visualizar fatura');
        $this->Fatura->id = $id;
        if (!$this->Fatura->exists()) {
            $this->Session->setFlash(__('Fatura não encontrada'), 'alert_message', array('tipo_message' => 'alert-error'));
            $this->redirect('/faturas/index');
        }
        $fatura = $this->Fatura->read(null, $id);

        $origem = 'Origem';
        $origem_link = 'SEM ORIGEM';

        if(!empty($fatura['Fatura']['orcamento_id'])){
            $origem = 'Orçamento';
            $origem_link_url = '/orcamentos/view/'.$fatura['Orcamento']['codigo'];
            $origem_link_nome = $fatura['Orcamento']['nome'];
        }
        if(!empty($fatura['Fatura']['fornecedor_id'])){
            $origem = 'Fornecedor';
            $origem_link_url = '/fornecedors/view/'.$fatura['Fornecedor']['codigo'];
            $origem_link_nome = $fatura['Fornecedor']['nome'];
        }
        if(!empty($fatura['Fatura']['projeto_id'])){
            $origem = 'Projeto';
            $origem_link_url = '/projetos/view/'.$fatura['Projeto']['codigo'];
            $origem_link_nome = $fatura['Projeto']['nome'];
        }
        if(!empty($fatura['Fatura']['pessoa_id'])){
            $origem = 'Pessoa';
            $origem_link_url = '/users/view/'.$fatura['Pessoa']['codigo'];
            $origem_link_nome = $fatura['Pessoa']['nome'];
        }
        $this->set(compact('fatura', 'origem', 'origem_link_url', 'origem_link_nome'));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {

        if($this->Session->read('perfil_atual') == 4){  //desenvolvedor
            $this->Session->setFlash(__('Acesso restrito'), 'alert_message', array('tipo_message' => 'alert-block'));
            $this->redirect('/users/info');
        }

        $this->set('titulo_page', 'Criar fatura');
        if ($this->request->is('post')) {
            $this->Fatura->create();

            $this->request->data['Fatura'][$this->request->data['Fatura']['origem']] = $this->request->data['Fatura']['origem_id'];

            if ($this->Fatura->gerarFatura($this->request->data)) {
                $this->Session->setFlash(__('Fatura salva'), 'alert_message', array('tipo_message' => 'alert-success'));
                $this->redirect('/faturas/index');
            } else {
                $this->Session->setFlash(__('Erro ao salvar a fatura. Tente novamente'), 'alert_message', array('tipo_message' => 'alert-error'));
            }
        }
        $action = 'add';
        $this->set(compact( 'action'));
        $this->render('fatura');
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($codigo = null) {

        if($this->Session->read('perfil_atual') == 4){  //desenvolvedor
            $this->Session->setFlash(__('Acesso restrito'), 'alert_message', array('tipo_message' => 'alert-block'));
            $this->redirect('/users/info');
        }

        $this->set('titulo_page', 'Editar fatura');
        $id = $this->Fatura->getIdByCodigo($codigo);
        $this->Fatura->id = $id;
        if (!$this->Fatura->exists()) {
            $this->Session->setFlash(__('Fatura não encontrada'), 'alert_message', array('tipo_message' => 'alert-error'));
            $this->redirect('/faturas/index');
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->request->data['Fatura'][$this->request->data['Fatura']['origem']] = $this->request->data['Fatura']['origem_id'];
            if ($this->Fatura->save($this->request->data)) {
                $this->Session->setFlash(__('Fatura salva'), 'alert_message', array('tipo_message' => 'alert-success'));
                $this->redirect('/faturas/index');
            } else {
                $this->Session->setFlash(__('Erro ao salvar a fatura. Tente novamente'), 'alert_message', array('tipo_message' => 'alert-error'));
            }
        } else {
            $this->request->data = $this->Fatura->read(null, $id);
        }
        $action = 'edit/'.$this->request->data['Fatura']['codigo'];
        $this->set(compact( 'action'));
        $this->render('fatura');
    }

    /**
     * delete method
     *
     * @throws MethodNotAllowedException
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($codigo = null) {

        if($this->Session->read('perfil_atual') == 4 |  $this->Session->read('perfil_atual') == 5 ){  //desenvolvedor
            $this->Session->setFlash(__('Acesso restrito'), 'alert_message', array('tipo_message' => 'alert-block'));
            $this->redirect('/users/info');
        }

        $id = $this->Fatura->getIdByCodigo($codigo);
        $this->Fatura->id = $id;
        if (!$this->Fatura->exists()) {
            $this->Session->setFlash(__('Fatura não encontrada'), 'alert_message', array('tipo_message' => 'alert-error'));
            $this->redirect('/faturas/index');
        }
        if ($this->Fatura->delete()) {
            $this->Session->setFlash(__('Fatura deletada'), 'alert_message', array('tipo_message' => 'alert-success'));
            $this->redirect('/faturas/index');
        }
        $this->Session->setFlash(__('Fatura não pode ser deletada'), 'alert_message', array('tipo_message' => 'alert-error'));
        $this->redirect('/faturas/index');
    }

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('');
        $this->verifica_login();

        //filtro
        $select_faturaStatus = $this->Fatura->FaturaStatus->getFormSelect();
        $select_meioPagamentos= $this->Fatura->EmpresasMeiopagamento->getFormSelect();
        //$this->loadModel('Meiopagamento');
        $meioPagamento = $this->Fatura->EmpresasMeiopagamento->getMeiopagamentoCompleto();
        $this->set(compact('select_faturaStatus', 'select_meioPagamentos','meioPagamento'));

        $this->set('menu_area', 'faturas');
    }

    public function orcamento($codigo_orcamento = null){

        if(empty($codigo_orcamento)) $this->redirect('/faturas/index');

        $this->set('titulo_page', 'Faturas - Orcamento '.$codigo_orcamento);

        $orcamento_id = $this->Fatura->Orcamento->getIdByCodigo($codigo_orcamento);

        $conditions = array();
        $conditions['Fatura.orcamento_id'] = $orcamento_id;

        $this->Fatura->recursive = 0;
        $this->set('faturas', $this->paginate('Fatura', $conditions));
        $this->render('index');
    }

    public function baixa_manual(){

        if($this->Session->read('perfil_atual') == 4){  //desenvolvedor
            $this->Session->setFlash(__('Acesso restrito'), 'alert_message', array('tipo_message' => 'alert-block'));
            $this->redirect('/users/info');
        }

        if ($this->request->is('post') || $this->request->is('put')) {

            //obter id real
            $id = $this->Fatura->getIdByCodigo($this->request->data['Fatura']['codigo']);
            $this->Fatura->id = $id;
            if (!$this->Fatura->exists()) {
                $this->Session->setFlash(__('Fatura não encontrada'), 'alert_message', array('tipo_message' => 'alert-error'));
                $this->redirect('/faturas/index');
            }

            $fatura_atual = $this->Fatura->read(null, $id);
            $fatura_update = array();
            $fatura_update['Fatura']['codigo_orcamento_id'] = $fatura_atual['Orcamento']['codigo'];
            $fatura_update['Fatura']['codigo_pessoa_id'] = $fatura_atual['Pessoa']['codigo'];
            $fatura_update['Fatura']['codigo_projeto_id'] = $fatura_atual['Projeto']['codigo'];
            $fatura_update['Fatura']['codigo_fornecedor_id'] = $fatura_atual['Fornecedor']['codigo'];
            $fatura_update['Fatura']['id'] = $fatura_atual['Fatura']['id'];
            $fatura_update['Fatura']['tipo_fatura'] = $fatura_atual['Fatura']['tipo_fatura'];
            $fatura_update['Fatura']['codigo'] = $this->request->data['Fatura']['codigo'];
            $fatura_update['Fatura']['observacao'] = $this->request->data['Fatura']['observacao'];
            $fatura_update['Fatura']['data_pagamento_form'] = $this->request->data['Fatura']['data_pagamento_form'];
            $fatura_update['Fatura']['empresas_meiopagamento_id'] = $this->request->data['Fatura']['empresas_meiopagamento_id'];
            $fatura_update['Fatura']['fatura_status_id'] = 2;
            $this->Fatura->create();
            if ($this->Fatura->save($fatura_update)) {
                $this->Session->setFlash(__('Baixa realizada com sucesso'), 'alert_message', array('tipo_message' => 'alert-success'));
                $this->redirect('/faturas/index');
            } else {
                $this->Session->setFlash(__('Erro ao salvar a fatura. Tente novamente'), 'alert_message', array('tipo_message' => 'alert-error'));
                $this->redirect('/faturas/view/'.$this->request->data['Fatura']['codigo']);
            }
        } else {
            $this->redirect('/faturas/index');
        }
    }
}
