<?php
App::uses('AppController', 'Controller');
/**
 * Chamados Controller
 *
 * @property Chamado $Chamado
 */
class ChamadosController extends AppController {
    public $helpers = array('Chamado', 'Interacao');
    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->set('titulo_page', 'Chamados');
        $this->Chamado->recursive = 0;

        $conditions['Projeto.empresa_id'] = $this->empresa_core['Empresa']['id'];

        //verificando caso de não ser administrador
        if($this->Session->read('perfil_atual') != 2){
            //selecionar apenas os projetos associados aos usuários
            $conditions['Projeto.id'] = $this->Chamado->Projeto->getProjetosAssociados($this->Auth->user('id'));
        }

        //se for cliente, não exibir chamados ocultos
        if($this->Session->read('perfil_atual') == 5){
            //selecionar apenas os projetos associados aos usuários
            $conditions['Chamado.oculto'] = 0;
        }

        if (!empty($_GET)) {
            if (!empty($_GET['busca'])) {
                $_GET['busca'] = str_replace(' ', '%', $_GET['busca']);
                $conditions['OR'] = array(
                    array('Chamado.nome LIKE ' => '%'.$_GET['busca'].'%'),
                    array('Chamado.descricao LIKE ' => '%'.$_GET['busca'].'%'),
                    array('Chamado.observacao_oculto LIKE ' => '%'.$_GET['busca'].'%'),
                );
            }
            if (!empty($_GET['codigo_projeto'])) {
                $conditions['Chamado.projeto_id'] = $this->Chamado->Projeto->getIdByCodigo($_GET['codigo_projeto']) ;
            }
            if (!empty($_GET['chamado_status_id'])) {
                $conditions['Chamado.chamado_status_id'] = $_GET['chamado_status_id'];
            }else{
                $conditions['AND'] = array(
                    array('Chamado.chamado_status_id <>  ' => 4),
                    array('Chamado.chamado_status_id <>  ' => 6),
                    array('Chamado.chamado_status_id <>  ' => 7),
                );
            }
            if (!empty($_GET['chamado_tipo_id'])) {
                $conditions['Chamado.chamado_tipo_id'] = $_GET['chamado_tipo_id'];
            }
            if (!empty($_GET['chamado_prioridade_id'])) {
                $conditions['Chamado.chamado_prioridade_id'] = $_GET['chamado_prioridade_id'];
            }
            if (!empty($_GET['chamado_prioridade_id'])) {
                $conditions['Chamado.chamado_prioridade_id'] = $_GET['chamado_prioridade_id'];
            }
            if (empty($_GET['projeto_pausa'])) {
                $conditions['Projeto.projeto_status_id <> '] = 3;
            }

            $this->Session->write('Chamado.filtro', $_GET);
            $this->set('titulo_page', 'Chamados - filtro');
        }else{
            $conditions['Projeto.projeto_status_id <> '] = 3;
            $conditions['AND'] = array(
                array('Chamado.chamado_status_id <>  ' => 4),
                array('Chamado.chamado_status_id <>  ' => 6),
                array('Chamado.chamado_status_id <>  ' => 7),
            );
        }


        $this->Session->write('Chamado.filtro', $conditions);

        $this->set('chamados', $this->paginate('Chamado', $conditions));
        $this->set('exibe_filtro', '1');
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($codigo = null) {
        $this->set('titulo_page', 'Visualizar Chamado');

        //obter id real
        $id = $this->Chamado->getIdByCodigo($codigo);


        //acesso de usuários
        if($this->Session->read('perfil_atual') != 2){
            //verificar se esta associado com o projeto
            if(!$this->Chamado->isChamadoAssociado($id, $this->Auth->user('id'))){
                $this->Session->setFlash(__('Acesso restrito'), 'alert_message', array('tipo_message' => 'alert-block'));
                $this->redirect('/users/info');
            }
        }
        if($this->Session->read('perfil_atual') == 5){
            //não permitir ver se for oculto
            if($this->Chamado->isOculto($id)){
                $this->Session->setFlash(__('Acesso restrito'), 'alert_message', array('tipo_message' => 'alert-block'));
                $this->redirect('/users/info');

            }
        }

        $this->Chamado->id = $id;
        if (!$this->Chamado->exists()) {
            $this->Session->setFlash(__('Chamado inválido'), 'alert_message', array('tipo_message' => 'alert-block'));
            $this->redirect('/chamados/index');
        }
        $chamado = $this->Chamado->read(null, $id);
        $this->set('chamado', $chamado);

        //obtem chamado pai
        if(!empty($chamado['Chamado']['chamado_pai'])){
            $chamado_pai = $this->Chamado->read(null, $chamado['Chamado']['chamado_pai']);
            $this->set('chamado_pai', $chamado_pai);
        }

        //verficia se pode editar o chamado
        $exibe_link_editar = true;
        if($this->Session->read('perfil_atual') == 4)
            if($chamado['Chamado']['user_id'] != $_SESSION['User']['id'])
                $exibe_link_editar = false;

        //nome do desenvolvedor
        $nome_desenvolvedor = '';
        if(!empty($chamado['Chamado']['desenvolvedor_id'])){
            $nome_desenvolvedor = $this->Chamado->User->getNome($chamado['Chamado']['desenvolvedor_id']);;
        }


        //obtem chamados filho
        $chamados_filho = $this->Chamado->getChamadosFilho($id);
        $this->set('chamados_filho', $chamados_filho);
        $this->set('exibe_link_editar', $exibe_link_editar);
        $this->set('nome_desenvolvedor', $nome_desenvolvedor);

        $interacoes = $this->Chamado->getInteracoes($id);
        $this->set('interacoes', $interacoes);
        $associados = $this->Chamado->Projeto->getAssociados($chamado['Chamado']['projeto_id']);
        $this->set('associados', $associados );

        $this->set('exibe_filtro', '1');
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        $this->set('titulo_page', 'Criar Chamado');

        if ($this->request->is('post')) {
            $this->Chamado->create();
            if ($this->Chamado->save($this->request->data)) {
                $this->Session->setFlash(__('Chamado salvo'), 'alert_message', array('tipo_message' => 'alert-success'));
                $this->redirect('/chamados/index');
            } else {
                $this->Session->setFlash(__('Erro ao salvar o chamado. Tente novamente'), 'alert_message', array('tipo_message' => 'alert-error'));

            }
        }
        $action = 'add';
        $this->set(compact( 'action'));
        $this->render('chamado');
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($codigo = null) {
        $this->set('titulo_page', 'Editar Chamado');

        //obter id real
        $id = $this->Chamado->getIdByCodigo($codigo);

        //acesso de usuários
        if($this->Session->read('perfil_atual') == 5){ // Cliente
            $this->Session->setFlash(__('Acesso restrito'), 'alert_message', array('tipo_message' => 'alert-block'));
            $this->redirect('/users/info');
        }elseif($this->Session->read('perfil_atual') == 3){ // Gerente
            //verificar se esta associado com o projeto
            if(!$this->Chamado->isChamadoAssociado($id, $this->Auth->user('id'))){
                $this->Session->setFlash(__('Acesso restrito'), 'alert_message', array('tipo_message' => 'alert-block'));
                $this->redirect('/users/info');
            }
        }elseif($this->Session->read('perfil_atual') == 4){ // Desenvolvedor
            if(!$this->Chamado->isDono($id) ){
                $this->Session->setFlash(__('Acesso restrito'), 'alert_message', array('tipo_message' => 'alert-block'));
                $this->redirect('/users/info');
            }
        }

        $this->Chamado->id = $id;
        if (!$this->Chamado->exists()) {
            $this->Session->setFlash(__('Chamado inválido'), 'alert_message', array('tipo_message' => 'alert-block'));
            $this->redirect('/chamados/index');
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Chamado->save($this->request->data)) {
                $this->Session->setFlash(__('Chamado salvo'), 'alert_message', array('tipo_message' => 'alert-success'));
                $this->redirect('/chamados/index');
            } else {
                $this->Session->setFlash(__('Erro ao salvar o chamado. Tente novamente'), 'alert_message', array('tipo_message' => 'alert-error'));
            }
        } else {
            $this->request->data = $this->Chamado->read(null, $id);
        }

        $action = 'edit/'.$this->request->data['Chamado']['codigo'];
        $this->set(compact( 'action'));
        $this->render('chamado');
    }

    /**
     * delete method
     *
     * @throws MethodNotAllowedException
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {

        //acesso de usuários
        if($this->Session->read('perfil_atual') != 2){
            $this->Session->setFlash(__('Acesso restrito'), 'alert_message', array('tipo_message' => 'alert-block'));
            $this->redirect('/users/info');
        }

        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Chamado->id = $id;
        if (!$this->Chamado->exists()) {
            $this->Session->setFlash(__('Chamado inválido'), 'alert_message', array('tipo_message' => 'alert-error'));
        }
        if ($this->Chamado->delete()) {
            $this->Session->setFlash(__('Chamado removido'), 'alert_message', array('tipo_message' => 'alert-success'));
            $this->redirect('/chamados/index');
        }
        $this->Session->setFlash(__('Chamado não pode ser removido'), 'alert_message', array('tipo_message' => 'alert-error'));
        $this->redirect('/chamados/index');
    }

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('');
        $this->verifica_login();

        //filtro
        $select_chamadoStatus = $this->Chamado->ChamadoStatus->getFormSelect();
        $select_chamadoPrioridade = $this->Chamado->ChamadoPrioridade->getFormSelect();
        $select_chamadoTipo = $this->Chamado->ChamadoTipo->getFormSelect();
        if($this->Session->read('perfil_atual') == 2)
            $select_projetos = $this->Chamado->Projeto->getFormSelect();
        else
            $select_projetos = $this->Chamado->Projeto->getFormSelectByUser($this->Auth->user('id'));
        $this->set(compact('select_chamadoStatus', 'select_chamadoPrioridade', 'select_chamadoTipo', 'select_projetos'));

        $this->set('menu_area', 'chamados');
    }

    public function fazer_chamado($codigo_chamado){
        $result = $this->Chamado->fazer_chamado($codigo_chamado);

        //acesso de usuários
        if($this->Session->read('perfil_atual') == 5){
            $this->Session->setFlash(__('Acesso restrito'), 'alert_message', array('tipo_message' => 'alert-block'));
            $this->redirect('/users/info');
        }

        if($result = 1){
            $this->Session->setFlash(__('Interação salva. Você já pode fazer o chamado'), 'alert_message', array('tipo_message' => 'alert-success'));
            $this->redirect('/chamados/view/'.$codigo_chamado);
        }elseif($result = 2){
            $this->Session->setFlash(__('Falha salvar a interação. Tente novamente'), 'alert_message', array('tipo_message' => 'alert-error'));
            $this->redirect('/chamados/view/'.$codigo_chamado);
        }elseif($result = -1){
            $this->Session->setFlash(__('Chamado inválido'), 'alert_message', array('tipo_message' => 'alert-error'));
            $this->redirect('/chamados/view/'.$codigo_chamado);
        }elseif($result = 0){
            $this->Session->setFlash(__('O chamado deve estar nos status: Em análise ou Pendente com o cliente'), 'alert_message', array('tipo_message' => 'alert-block'));
            $this->redirect('/chamados/view/'.$codigo_chamado);
        }
    }

}
