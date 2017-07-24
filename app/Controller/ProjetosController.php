<?php
App::uses('AppController', 'Controller');
/**
 * Projetos Controller
 *
 * @property Projeto $Projeto
 */
class ProjetosController extends AppController {
    public $helpers = array('Projeto');
    /**
     * index method
     *
     * @return void
     */
    public function index($conditions = array()) {
        $this->set('titulo_page', 'Projetos');
        $this->Projeto->recursive = 0;

        $conditions['Projeto.empresa_id'] = $this->empresa_core['Empresa']['id'];

        //verificando caso de não ser administrador
        if($this->Session->read('perfil_atual') != 2){
            //selecionar apenas os projetos associados aos usuários
            $conditions['Projeto.id'] = $this->Projeto->getProjetosAssociados($this->Auth->user('id'));
        }

        if (!empty($_GET)) {
            if (!empty($_GET['busca'])) {
                $_GET['busca'] = str_replace(' ', '%', $_GET['busca']);
                $conditions['OR'] = array(
                    array('Projeto.nome LIKE ' => '%'.$_GET['busca'].'%'),
                    array('Projeto.descricao LIKE ' => '%'.$_GET['busca'].'%'),
                    array('Projeto.observacao LIKE ' => '%'.$_GET['busca'].'%'),
                );
            }
            if (!empty($_GET['projeto_status_id'])) {
                $conditions['Projeto.projeto_status_id'] = $_GET['projeto_status_id'];
            }
            if (!empty($_GET['cliente_id'])) {
                $conditions['Projeto.cliente_id'] = $_GET['cliente_id'];
            }

            $this->Session->write('Projeto.filtro', $_GET);
        }else{

        }



        $this->set('projetos', $this->paginate('Projeto', $conditions));
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
        //obter id real
        $id = $this->Projeto->getIdByCodigo($codigo);

        //verificando nível de acesso
        if($this->Session->read('perfil_atual') != 2){
            //verificar se o cliente esta associado com o projeto
            if(!$this->Projeto->isProjetoAssociado($id, $this->Auth->user('id'))){
                $this->Session->setFlash(__('Acesso restrito'), 'alert_message', array('tipo_message' => 'alert-block'));
                $this->redirect('/users/info');
            }
        }

        $this->Projeto->id = $id;
        if (!$this->Projeto->exists()) {
            throw new NotFoundException(__('Invalid projeto'));
        }

        $projeto = $this->Projeto->read(null, $id);
        $associados = $this->Projeto->getAssociados($id);
        $orcamentos = $this->Projeto->getOrcamentos($id);

        $this->set('titulo_page', $projeto['Projeto']['nome']);
        $this->set('projeto', $projeto );
        $this->set('associados', $associados );
        $this->set('orcamentos', $orcamentos );

    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        //acesso de usuários
        if($this->Session->read('perfil_atual') != 2){
            $this->Session->setFlash(__('Acesso restrito'), 'alert_message', array('tipo_message' => 'alert-block'));
            $this->redirect('/users/info');
        }

        $this->set('titulo_page', 'Criar Projeto');

        if ($this->request->is('post')) {
            $this->Projeto->create();
            if ($this->Projeto->save($this->request->data)) {
                $this->Session->setFlash(__('Projeto salvo'), 'alert_message', array('tipo_message' => 'alert-success'));
                $this->redirect('projetos/index');
            } else {
                $this->Session->setFlash(__('Erro ao salvar o projeto. Tente novamente'), 'alert_message', array('tipo_message' => 'alert-error'));
            }
        }
        $action = 'add';
        $this->set(compact( 'action'));
        $this->render('projeto');
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($codigo = null) {

        //acesso de usuários
        if($this->Session->read('perfil_atual') == 4 | $this->Session->read('perfil_atual') == 5){
            $this->Session->setFlash(__('Acesso restrito'), 'alert_message', array('tipo_message' => 'alert-block'));
            $this->redirect('/users/info');
        }elseif($this->Session->read('perfil_atual') == 3){
            //selecionar apenas os projetos associados aos usuários
            if(!$this->Projeto->isProjetoAssociado($id, $this->Auth->user('id'))){
                $this->Session->setFlash(__('Acesso restrito'), 'alert_message', array('tipo_message' => 'alert-block'));
                $this->redirect('/users/info');
            }
        }

        //obter id real
        $id = $this->Projeto->getIdByCodigo($codigo);
        $this->set('titulo_page', 'Editar Projeto');
        $this->Projeto->id = $id;
        if (!$this->Projeto->exists()) {
            $this->redirect('/projetos/index');
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Projeto->save($this->request->data)) {
                $this->Session->setFlash(__('Projeto salvo'), 'alert_message', array('tipo_message' => 'alert-success'));
                $this->redirect('/projetos/index');
            } else {
                $this->Session->setFlash(__('Erro ao salvar o projeto. Tente novamente'), 'alert_message', array('tipo_message' => 'alert-error'));
            }
        } else {
            $this->request->data = $this->Projeto->read(null, $id);
        }
        $action = 'edit/'.$codigo;
        $this->set(compact('action'));
        $this->render('projeto');
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

        //acesso de usuários
        if($this->Session->read('perfil_atual') != 2){
            $this->Session->setFlash(__('Acesso restrito'), 'alert_message', array('tipo_message' => 'alert-block'));
            $this->redirect('/users/info');
        }

        //obter id real
        $id = $this->Projeto->getIdByCodigo($codigo);

        if (!$this->request->is('post')) {
            //throw new MethodNotAllowedException();
        }
        $this->Projeto->id = $id;
        if (!$this->Projeto->exists()) {
            throw new NotFoundException(__('Invalid projeto'));
        }
        if ($this->Projeto->delete()) {
            $this->Session->setFlash(__('Projeto removido'), 'alert_message', array('tipo_message' => 'alert-success'));
            $this->redirect('projetos/index');
        }
        $this->Session->setFlash(__('Projeto não pode ser removido'), 'alert_message', array('tipo_message' => 'alert-error'));
        $this->redirect('projetos/index');
    }

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('');
        $this->verifica_login();

        //filtro
        if($this->Session->read('perfil_atual') == 4)
            $select_clientes = $this->Projeto->Cliente->getFormSelectDesenvolvedor();
        else
            $select_clientes = $this->Projeto->Cliente->getFormSelect();
        $select_projetoStatuses = $this->Projeto->ProjetoStatus->getFormSelect();
        $this->set(compact('select_clientes', 'select_projetoStatuses'));

        $this->set('menu_area', 'projetos');
    }

    public function ajax_select(){
        $this->layout = null;

        //todo grupodf - verificar nível de acesso para este ajax

        $lista_projetos = $this->Projeto->getListaProjetos();
        $this->set('projetos', $lista_projetos);
    }

    public function remove_user($codigo_projeto, $codigo_user){

        //acesso de usuários
        if($this->Session->read('perfil_atual') != 2){
            $this->Session->setFlash(__('Acesso restrito'), 'alert_message', array('tipo_message' => 'alert-block'));
            $this->redirect('/users/info');
        }

        if($this->Projeto->remove_user($codigo_projeto, $codigo_user)){
            $this->Session->setFlash(__('Associação removida'), 'alert_message', array('tipo_message' => 'alert-success'));
            $this->redirect('/projetos/view/'.$codigo_projeto);
        }else{
            $this->Session->setFlash(__('Falha ao remover associação. Tente novamente'), 'alert_message', array('tipo_message' => 'alert-error'));
            $this->redirect('/projetos/view/'.$codigo_projeto);
        }
    }

    public function associa_user($codigo_projeto, $codigo_user){

        //acesso de usuários
        if($this->Session->read('perfil_atual') != 2){
            $this->Session->setFlash(__('Acesso restrito'), 'alert_message', array('tipo_message' => 'alert-block'));
            $this->redirect('/users/info');
        }

        if($this->Projeto->associa_user($codigo_projeto, $codigo_user)){
            $this->Session->setFlash(__('Associação concluída'), 'alert_message', array('tipo_message' => 'alert-success'));
            $this->redirect('/projetos/view/'.$codigo_projeto);
        }else{
            $this->Session->setFlash(__('Falha ao associar. Tente novamente'), 'alert_message', array('tipo_message' => 'alert-error'));
            $this->redirect('/projetos/view/'.$codigo_projeto);
        }
    }

    public function remove_orcamento($codigo_projeto, $codigo_orcamento){

        //acesso de usuários
        if($this->Session->read('perfil_atual') != 2){
            $this->Session->setFlash(__('Acesso restrito'), 'alert_message', array('tipo_message' => 'alert-block'));
            $this->redirect('/users/info');
        }

        if($this->Projeto->remove_orcamento($codigo_projeto, $codigo_orcamento)){
            $this->Session->setFlash(__('Associação removida'), 'alert_message', array('tipo_message' => 'alert-success'));
            $this->redirect('/projetos/view/'.$codigo_projeto);
        }else{
            $this->Session->setFlash(__('Falha ao remover associação. Tente novamente'), 'alert_message', array('tipo_message' => 'alert-error'));
            $this->redirect('/projetos/view/'.$codigo_projeto);
        }
    }

    public function associa_orcamento($codigo_projeto, $codigo_orcamento){

        //acesso de usuários
        if($this->Session->read('perfil_atual') != 2){
            $this->Session->setFlash(__('Acesso restrito'), 'alert_message', array('tipo_message' => 'alert-block'));
            $this->redirect('/users/info');
        }

        if($this->Projeto->associa_orcamento($codigo_projeto, $codigo_orcamento)){
            $this->Session->setFlash(__('Associação concluída'), 'alert_message', array('tipo_message' => 'alert-success'));
            $this->redirect('/projetos/view/'.$codigo_projeto);
        }else{
            $this->Session->setFlash(__('Falha ao associar. Tente novamente'), 'alert_message', array('tipo_message' => 'alert-error'));
            $this->redirect('/projetos/view/'.$codigo_projeto);
        }
    }

}

