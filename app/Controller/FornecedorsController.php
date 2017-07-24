<?php
App::uses('AppController', 'Controller');
/**
 * Fornecedors Controller
 *
 * @property Fornecedor $Fornecedor
 */
class FornecedorsController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->set('titulo_page', 'Fornecedores');
        $this->Fornecedor->recursive = 0;

        $conditions['Fornecedor.empresa_id'] = $this->empresa_core['Empresa']['id'];

        $this->set('fornecedors', $this->paginate('Fornecedor', $conditions));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($codigo = null) {
        $this->set('titulo_page', 'Visualizar Fornecedor');

        //obter id real
        $id = $this->Fornecedor->getIdByCodigo($codigo);

        $this->Fornecedor->id = $id;
        if (!$this->Fornecedor->exists()) {
            throw new NotFoundException(__('Invalid fornecedor'));
        }

        $associados = $this->Fornecedor->getAssociados($id);
        $this->set('associados', $associados);

        $this->set('fornecedor', $this->Fornecedor->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        $this->set('titulo_page', 'Cadastrar Fornecedor');
        if ($this->request->is('post')) {
            $this->Fornecedor->create();
            if ($this->Fornecedor->save($this->request->data)) {
                $this->Session->setFlash(__('Fornecedor salvo'), 'alert_message', array('tipo_message' => 'alert-success'));
                $this->redirect('/fornecedors/index');
            } else {
                $this->Session->setFlash(__('Erro ao salvar o fornecedor. Tente novamente'), 'alert_message', array('tipo_message' => 'alert-error'));
            }
        }
        $action = 'add';
        $this->set(compact( 'action'));
        $this->render('fornecedor');
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($codigo = null) {
        $this->set('titulo_page', 'Editar Fornecedor');

        //obter id real
        $id = $this->Fornecedor->getIdByCodigo($codigo);
        $this->Fornecedor->id = $id;
        if (!$this->Fornecedor->exists()) {
            throw new NotFoundException(__('Invalid fornecedor'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Fornecedor->save($this->request->data)) {
                $this->Session->setFlash(__('Fornecedor salvo'), 'alert_message', array('tipo_message' => 'alert-success'));
                $this->redirect('/fornecedors/index');
            } else {
                $this->Session->setFlash(__('Erro ao salvar o fornecedor. Tente novamente'), 'alert_message', array('tipo_message' => 'alert-error'));
            }
        } else {
            $this->request->data = $this->Fornecedor->read(null, $id);
        }
        $action = 'edit/'.$this->request->data['Fornecedor']['codigo'];
        $this->set(compact( 'action'));
        $this->render('fornecedor');
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
        $id = $this->Fornecedor->getIdByCodigo($codigo);
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Fornecedor->id = $id;
        if (!$this->Fornecedor->exists()) {
            throw new NotFoundException(__('Invalid fornecedor'));
        }
        if ($this->Fornecedor->delete()) {
            $this->Session->setFlash(__('Fornecedor removido'), 'alert_message', array('tipo_message' => 'alert-success'));
            $this->redirect('/fornecedors/index');
        }
        $this->Session->setFlash(__('Fornecedor não pode ser removido'), 'alert_message', array('tipo_message' => 'alert-error'));
        $this->redirect('/fornecedors/index');
    }

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('');
        $this->verifica_login();

        //acesso de usuários
        if($this->Session->read('perfil_atual') != 2){
            $this->Session->setFlash(__('Acesso restrito'), 'alert_message', array('tipo_message' => 'alert-block'));
            $this->redirect('/users/info');
        }

        $this->set('menu_area', 'fornecedors');
    }

    public function ajax_select(){
        $this->layout = null;

        $lista_fornecedors = $this->Fornecedor->getListaFornecedors();
        $this->set('fornecedors', $lista_fornecedors);
    }

    public function remove_user($codigo_fornecedor, $codigo_user){
        if($this->Fornecedor->remove_user($codigo_fornecedor, $codigo_user)){
            $this->Session->setFlash(__('Associação removida'), 'alert_message', array('tipo_message' => 'alert-success'));
            $this->redirect('/fornecedors/view/'.$codigo_fornecedor);
        }else{
            $this->Session->setFlash(__('Falha ao remover associação. Tente novamente'), 'alert_message', array('tipo_message' => 'alert-error'));
            $this->redirect('/fornecedors/view/'.$codigo_fornecedor);
        }
    }

    public function associa_user($codigo_fornecedor, $codigo_user){
        if($this->Fornecedor->associa_user($codigo_fornecedor, $codigo_user)){
            $this->Session->setFlash(__('Associação concluída'), 'alert_message', array('tipo_message' => 'alert-success'));
            $this->redirect('/fornecedors/view/'.$codigo_fornecedor);
        }else{
            $this->Session->setFlash(__('Falha ao associar. Tente novamente'), 'alert_message', array('tipo_message' => 'alert-error'));
            $this->redirect('/fornecedors/view/'.$codigo_fornecedor);
        }
    }
}
