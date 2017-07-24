<?php
App::uses('AppController', 'Controller');
/**
 * Clientes Controller
 *
 * @property Cliente $Cliente
 */
class ClientesController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->set('titulo_page', 'Clientes');
        $this->Cliente->recursive = 1;

        if($this->Session->read('perfil_atual') == 4){ // Desenvolvedor
            $projetos_id = $this->Cliente->Projeto->ProjetosUser->getProjetosByUser($_SESSION['User']['id']);
            $clientes_id = $this->Cliente->getClientesByProjetos($projetos_id);
            $conditions['Cliente.id'] = $clientes_id;
        }

        $conditions['Cliente.empresa_id'] = $this->empresa_core['Empresa']['id'];


        $this->set('clientes', $this->paginate('Cliente', $conditions));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($codigo = null) {
        $this->set('titulo_page', 'Visualizar Cliente');

        //obter id real
        $id = $this->Cliente->getIdByCodigo($codigo);

        if($this->Session->read('perfil_atual') == 4){ // Desenvolvedor
            if(!$this->Cliente->isDesenvolvedorAssociado($id)){
                $this->Session->setFlash(__('Acesso restrito'), 'alert_message', array('tipo_message' => 'alert-block'));
                $this->redirect('/users/info');
            }
        }

        $this->Cliente->id = $id;
        if (!$this->Cliente->exists()) {
            throw new NotFoundException(__('Invalid cliente'));
        }

        $associados = $this->Cliente->getAssociados($id);
        $this->set('associados', $associados);

        $this->set('cliente', $this->Cliente->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {

        if($this->Session->read('perfil_atual') == 4 | $this->Session->read('perfil_atual') == 5 ){ // Desenvolvedor e Cliente
            $this->Session->setFlash(__('Acesso restrito'), 'alert_message', array('tipo_message' => 'alert-block'));
            $this->redirect('/users/info');
        }

        $this->set('titulo_page', 'Cadastrar Cliente');
        if ($this->request->is('post')) {
            $this->Cliente->create();
            if ($this->Cliente->save($this->request->data)) {
                $this->Session->setFlash(__('Cliente salvo'), 'alert_message', array('tipo_message' => 'alert-success'));
                $this->redirect('/clientes/index');
            } else {
                $this->Session->setFlash(__('Erro ao salvar o cliente. Tente novamente'), 'alert_message', array('tipo_message' => 'alert-error'));
            }
        }

        $action = 'add';
        $this->set(compact( 'action'));
        $this->render('cliente');
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($codigo = null) {

        if($this->Session->read('perfil_atual') == 4 | $this->Session->read('perfil_atual') == 5 ){ // Desenvolvedor e Cliente
            $this->Session->setFlash(__('Acesso restrito'), 'alert_message', array('tipo_message' => 'alert-block'));
            $this->redirect('/users/info');
        }

        $this->set('titulo_page', 'Editar Cliente');

        //obter id real
        $id = $this->Cliente->getIdByCodigo($codigo);

        $this->Cliente->id = $id;
        if (!$this->Cliente->exists()) {
            throw new NotFoundException(__('Invalid cliente'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Cliente->save($this->request->data)) {
                $this->Session->setFlash(__('Cliente salvo'), 'alert_message', array('tipo_message' => 'alert-success'));
                $this->redirect('/clientes/index');
            } else {
                $this->Session->setFlash(__('Erro ao salvar o cliente. Tente novamente'), 'alert_message', array('tipo_message' => 'alert-error'));
            }
        } else {
            $this->request->data = $this->Cliente->read(null, $id);
        }

        $action = 'edit/'.$this->request->data['Cliente']['codigo'];
        $this->set(compact( 'action'));
        $this->render('cliente');
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

        if($this->Session->read('perfil_atual') == 4 | $this->Session->read('perfil_atual') == 5 ){ // Desenvolvedor e Cliente
            $this->Session->setFlash(__('Acesso restrito'), 'alert_message', array('tipo_message' => 'alert-block'));
            $this->redirect('/users/info');
        }

        $id = $this->Cliente->getIdByCodigo($codigo);

        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Cliente->id = $id;
        if (!$this->Cliente->exists()) {
            throw new NotFoundException(__('Invalid cliente'));
        }
        if ($this->Cliente->delete()) {
            $this->Session->setFlash(__('Cliente removida'), 'alert_message', array('tipo_message' => 'alert-success'));
            $this->redirect('/clientes/index');
        }
        $this->Session->setFlash(__('Cliente não pode ser removido'), 'alert_message', array('tipo_message' => 'alert-error'));
        $this->redirect('/clientes/index');
    }

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('');
        $this->verifica_login();

        $this->set('menu_area', 'clientes');
    }

    public function remove_user($codigo_cliente, $codigo_user){

        if($this->Session->read('perfil_atual') == 4 | $this->Session->read('perfil_atual') == 5 ){ // Desenvolvedor e Cliente
            $this->Session->setFlash(__('Acesso restrito'), 'alert_message', array('tipo_message' => 'alert-block'));
            $this->redirect('/users/info');
        }

        if($this->Cliente->remove_user($codigo_cliente, $codigo_user)){
            $this->Session->setFlash(__('Associação removida'), 'alert_message', array('tipo_message' => 'alert-success'));
            $this->redirect('/clientes/view/'.$codigo_cliente);
        }else{
            $this->Session->setFlash(__('Falha ao remover associação. Tente novamente'), 'alert_message', array('tipo_message' => 'alert-error'));
            $this->redirect('/clientes/view/'.$codigo_cliente);
        }
    }

    public function associa_user($codigo_cliente, $codigo_user){

        if($this->Session->read('perfil_atual') == 4 | $this->Session->read('perfil_atual') == 5 ){ // Desenvolvedor e Cliente
            $this->Session->setFlash(__('Acesso restrito'), 'alert_message', array('tipo_message' => 'alert-block'));
            $this->redirect('/users/info');
        }

        if($this->Cliente->associa_user($codigo_cliente, $codigo_user)){
            $this->Session->setFlash(__('Associação concluída'), 'alert_message', array('tipo_message' => 'alert-success'));
            $this->redirect('/clientes/view/'.$codigo_cliente);
        }else{
            $this->Session->setFlash(__('Falha ao associar. Tente novamente'), 'alert_message', array('tipo_message' => 'alert-error'));
            $this->redirect('/clientes/view/'.$codigo_cliente);
        }
    }
}
