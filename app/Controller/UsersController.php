<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->set('titulo_page', 'Pessoas');

        //verificando caso de não ser administrador
        if($this->Session->read('perfil_atual') == 5){ //cliente
            $this->Session->setFlash(__('Acesso restrito'), 'alert_message', array('tipo_message' => 'alert-block'));
            $this->redirect('/users/info');
        }elseif($this->Session->read('perfil_atual') == 4){ //desenvolvedor
            $conditions['OR'] = array(
                array('User.id ' => $this->User->ProjetosUser->getUsersRelatedByProjetos($this->Auth->user('id')) ),
                array('User.id ' => $this->User->UserPerfil->getUsersEmpresa() )
            );
        }

        $conditions['User.empresa_chave_url'] = $this->empresa_core['Empresa']['chave_url'];

        $this->User->recursive = 0;
        $users = $this->paginate('User', $conditions);

        foreach($users as $key => $user){
            $users[$key]['User']['lista_perfis'] = $this->User->listarPerfis($user['User']['id']);
        }

        $this->set('users', $users);
    }

    /**
     * view method
     *
     *
     * @param null $codigo
     * @internal param string $id
     * @return void
     */
    public function view($codigo = null) {
        $this->set('titulo_page', 'Visualizar pessoa');

        //verificando caso de não ser administrador
        if($this->Session->read('perfil_atual') == 5){ //cliente
            $this->Session->setFlash(__('Acesso restrito'), 'alert_message', array('tipo_message' => 'alert-block'));
            $this->redirect('/users/info');
        }

        $id = $this->User->getIdByCodigo($codigo);

        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash(__('Usuário inválido'), 'alert_message', array('tipo_message' => 'alert-error'));
            //$this->redirect('/users/index');
        }
        $user = $this->User->read(null, $id);

        //verificar perfis do usuário
        $administrador = 0;
        $gerente = 0;
        $desenvolvedor = 0;
        $cliente = 0;
        foreach($user['UserPerfil'] as $perfil){
            if($perfil['perfil_id'] == 2) $administrador = 1;
            if($perfil['perfil_id'] == 3) $gerente = 1;
            if($perfil['perfil_id'] == 4) $desenvolvedor = 1;
            if($perfil['perfil_id'] == 5) $cliente = 1;
        }

        $this->set('user', $user);

        $this->set('administrador', $administrador);
        $this->set('gerente', $gerente);
        $this->set('desenvolvedor', $desenvolvedor);
        $this->set('cliente', $cliente);

    }

    //dados do usuário logado
    public function view_data() {
        $this->set('titulo_page', 'Visualizar dados');
        $this->User->id = $this->Auth->user('id');
        if (!$this->User->exists()) {
            $this->Session->setFlash(__('Usuário inválido'), 'alert_message', array('tipo_message' => 'alert-error'));
            $this->redirect('/users/index');
        }

        $user = $this->User->read(null, $this->Auth->user('id'));
        $this->set('user', $user);


        //verificar perfis do usuário
        $administrador = 0;
        $gerente = 0;
        $desenvolvedor = 0;
        $cliente = 0;
        foreach($user['UserPerfil'] as $perfil){
            if($perfil['perfil_id'] == 2) $administrador = 1;
            if($perfil['perfil_id'] == 3) $gerente = 1;
            if($perfil['perfil_id'] == 4) $desenvolvedor = 1;
            if($perfil['perfil_id'] == 5) $cliente = 1;
        }

        $this->set('administrador', $administrador);
        $this->set('gerente', $gerente);
        $this->set('desenvolvedor', $desenvolvedor);
        $this->set('cliente', $cliente);

        $this->render('view');
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {

        if($this->Session->read('perfil_atual') == 4 | $this->Session->read('perfil_atual') == 5){ // Desenvolvedor e Cliente
            $this->Session->setFlash(__('Acesso restrito'), 'alert_message', array('tipo_message' => 'alert-block'));
            $this->redirect('/users/info');
        }

        $this->set('titulo_page', 'Cadastrar pessoa');
        if ($this->request->is('post')) {
            $this->User->create();
            $this->request->data['User']['image_perfil'] = 'default_user.png';
            if ($this->User->save($this->request->data)) {

                $user_id = $this->User->getInsertID();
                $count = 0;
                if(!empty($this->request->data['User']['arquivo']))
                    foreach ($this->request->data['User']['arquivo'] as $arquivo){
                        if(!empty($arquivo)) {
                            if($arquivo['error'] == 0){
                                $extensao = substr(strrchr($arquivo['name'], '.'), 1 );
                                $datetime = date('YmdHms');
                                $nome_arquivo = 'usuario_'.$user_id.'_'.$datetime.$count.'.'.$extensao;
                                $result = $this->uploadFiles('img/users', array($arquivo), null, array($nome_arquivo));

                                //gravar dados do arquivo no banco
                                if(!empty($result['urls'])){
                                    $data_arquivo = array();
                                    $data_arquivo['User']['id'] = $user_id;
                                    $data_arquivo['User']['image_perfil'] = $nome_arquivo;
                                    $this->User->create();
                                    $this->User->save($data_arquivo);
                                    $count++;
                                }
                            }
                        }
                    }


                $this->Session->setFlash(__('Pessoa salva'), 'alert_message', array('tipo_message' => 'alert-success'));
                $this->redirect('/users/index');
            } else {
                $this->Session->setFlash(__('Erro ao salvar a pessoa'), 'alert_message', array('tipo_message' => 'alert-error'));
            }
        }
        $this->set('action', 'add');
        $this->render('user');
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($codigo = null) {
        $this->set('titulo_page', 'Editar pessoa');
        //obter id real
        $id = $this->User->getIdByCodigo($codigo);

        //Controle de acesso
        if($this->Session->read('perfil_atual') == 4 | $this->Session->read('perfil_atual') == 5){ // Desenvolvedor e Cliente
            if($this->Auth->user('id') != $id ){
                $this->Session->setFlash(__('Acesso restrito'), 'alert_message', array('tipo_message' => 'alert-block'));
                $this->redirect('/users/info');
            }
        }


        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash(__('Usuário inválido'), 'alert_message', array('tipo_message' => 'alert-error'));
            $this->redirect('/users/index');
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {

                $user_id = $id;
                $count = 0;
                foreach ($this->request->data['User']['arquivo'] as $arquivo){
                    if(!empty($arquivo)) {
                        if($arquivo['error'] == 0){
                            $extensao = substr(strrchr($arquivo['name'], '.'), 1 );
                            $datetime = date('YmdHms');
                            $nome_arquivo = 'usuario_'.$user_id.'_'.$datetime.$count.'.'.$extensao;
                            $result = $this->uploadFiles('img/users', array($arquivo), null, array($nome_arquivo));

                            //gravar dados do arquivo no banco
                            if(!empty($result['urls'])){
                                $data_arquivo = array();
                                $data_arquivo['User']['id'] = $user_id;
                                $data_arquivo['User']['image_perfil'] = $nome_arquivo;
                                $this->User->create();
                                $this->User->save($data_arquivo);
                                $count++;
                            }
                        }
                    }
                }

                $this->Session->write('User', $this->User->getUser($user_id));

                $this->Session->setFlash(__('Dados salvos'), 'alert_message', array('tipo_message' => 'alert-success'));
                if($codigo == $this->Auth->user('codigo'))
                    $this->redirect('/users/view_data');
                else
                    $this->redirect('/users/view/'.$codigo);
            } else {
                $this->Session->setFlash(__('Erro ao salvar os dados. Tente novamente'), 'alert_message', array('tipo_message' => 'alert-error'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
        }

        $this->set('action', 'edit/'.$this->request->data['User']['codigo']);
        $this->render('user');
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

        if( $this->Session->read('perfil_atual') != 2 ){
            $this->Session->setFlash(__('Acesso restrito'), 'alert_message', array('tipo_message' => 'alert-block'));
            $this->redirect('/users/info');
        }

        $id = $this->User->getIdByCodigo($codigo);
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash(__('Usuário inválido'), 'alert_message', array('tipo_message' => 'alert-error'));
            $this->redirect('/users/index');
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('Pessoa removida'), 'alert_message', array('tipo_message' => 'alert-success'));
            $this->redirect('/users/index');
        }
        $this->Session->setFlash(__('Esta pessoa não pode ser removida'), 'alert_message', array('tipo_message' => 'alert-error'));
        $this->redirect('/');
    }



    public function login() {

        $this->layout = 'default_login';

        $this->set('titulo_page', 'Login');
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                //carregar dados do usuário na sessão
                $this->Session->write('User', $this->Auth->user());

                //carregar perfis do usuário para a empresa atual (chave url)
                $perfis_usuario = $this->User->UserPerfil->getPerfis($this->empresa_core['Empresa']['id'], $this->Auth->user('id'));
                $this->Session->write('UserPerfil', $perfis_usuario);

                //verificar o melhor perfil do usuário para deixar pré-selecionado
                $perfil_atual = $this->User->UserPerfil->melhorPerfil($perfis_usuario);
                $this->Session->write('perfil_atual', $perfil_atual);

                //gravando dados da empresa na sessão
                $this->Session->write('Empresa', $this->empresa_core['Empresa']);

                $this->redirect('/users/info');
            } else {
                $this->Session->setFlash(__('Login ou senha incorreta'), 'alert_message', array('tipo_message' => 'alert-error'));
            }
        }
    }

    public function logout() {
        session_destroy();
        if($this->Session->check('UserPerfil'))
            $this->Session->delete('UserPerfil');
        if($this->Session->check('perfil_atual'))
            $this->Session->delete('perfil_atual');
        if($this->Session->check('Empresa'))
            $this->Session->delete('Empresa');
        $this->redirect('/empresas/index');
    }

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login');

        $this->set('menu_area', 'users');
    }

    public function ajax_associar(){
        $this->layout = null;
        $this->set('model', $_GET['model']);
        $this->set('controller', $_GET['controller']);
        $this->set('id_item', $_GET['id_item']);

        if(empty($_GET['busca']))
            $busca = '';
        else
            $busca = $_GET['busca'];

        $lista_usuarios = $this->User->getListaUsers($busca);
        $this->set('usuarios', $lista_usuarios);
        $this->render('ajax_associar');
    }
    public function ajax_select(){
        $this->layout = null;

        $lista_usuarios = $this->User->getListaUsers();
        $this->set('usuarios', $lista_usuarios);
    }

    public function mudar_senha($codigo = null){
        $this->set('titulo_page', 'Mudar senha');

        if(!empty($codigo)){
            $id = $this->User->getIdByCodigo($codigo);
            $this->User->id = $id;

            //Controle de acesso
            if($this->Session->read('perfil_atual') == 4 | $this->Session->read('perfil_atual') == 5){ // Desenvolvedor e Cliente
                if($this->Auth->user('id') != $id ){
                    $this->Session->setFlash(__('Acesso restrito'), 'alert_message', array('tipo_message' => 'alert-block'));
                    $this->redirect('/users/info');
                }
            }
        }else
            $this->User->id = $this->Auth->user('id');



        if (!$this->User->exists()) {
            $this->Session->setFlash(__('Usuário inválido'), 'alert_message', array('tipo_message' => 'alert-error'));
            $this->redirect('/users/index');
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            if($this->request->data['User']['password'] == $this->request->data['User']['password_confirmacao']){
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__('Senha alterada'), 'alert_message', array('tipo_message' => 'alert-success'));
                    $this->redirect('/users/view/'.$codigo);
                }else{
                    $this->Session->setFlash(__('Erro ao alterar a senha. Tente novamente'), 'alert_message', array('tipo_message' => 'alert-error'));
                    $this->redirect('/users/view/'.$codigo);
                }
            }else{
                $this->Session->setFlash(__('Senhas não coincidem'), 'alert_message', array('tipo_message' => 'alert-error'));
            }
        }
        $this->request->data = $this->User->read(null, $this->User->getIdByCodigo($codigo));
        $this->set('user', $this->User->read(null, $this->User->getIdByCodigo($codigo)));
    }

    public function esqueceu_senha(){
        $this->layout = 'default_login';

        //enviar e-mail para usuário

        $this->render('login');
    }

    public function remove_perfil($codigo, $perfil_id){
        if($this->User->remove_perfil($codigo, $perfil_id)){
            $this->Session->setFlash(__('Perfil removido'), 'alert_message', array('tipo_message' => 'alert-success'));
        }else{
            $this->Session->setFlash(__('Erro ao remover o perfil. Tente novamente'), 'alert_message', array('tipo_message' => 'alert-error'));
        }

        $this->redirect('/users/view/'.$codigo);
    }
    public function add_perfil($codigo, $perfil_id){

        if($this->Session->read('perfil_atual') == 4 | $this->Session->read('perfil_atual') == 5){ // Desenvolvedor e Cliente
            $this->Session->setFlash(__('Acesso restrito'), 'alert_message', array('tipo_message' => 'alert-block'));
            $this->redirect('/users/info');
        }

        if($this->User->add_perfil($codigo, $perfil_id)){
            $this->Session->setFlash(__('Perfil adicionado'), 'alert_message', array('tipo_message' => 'alert-success'));
        }else{
            $this->Session->setFlash(__('Erro ao adicionar o perfil. Tente novamente'), 'alert_message', array('tipo_message' => 'alert-error'));
        }

        $this->redirect('/users/view/'.$codigo);
    }


    public function muda_perfil($perfil_id){
        //verificar se o usuário possui o perfil desejado
        if($this->User->possuiPerfil($perfil_id)){
            $_SESSION['perfil_atual'] = $perfil_id;
            $this->Session->setFlash(__('Perfil alterado'), 'alert_message', array('tipo_message' => 'alert-success'));
        }else{
            $this->Session->setFlash(__('Você não possui este perfil no sistema'), 'alert_message', array('tipo_message' => 'alert-error'));
        }

        $this->redirect('/users/info');
    }

    public function info(){
        $perfil_atual = $this->Session->read('perfil_atual');

        if($perfil_atual == 1)
            $this->redirect ('/users/root');
        if($perfil_atual == 2)
            $this->redirect ('/users/admin');
        if($perfil_atual == 3)
            $this->redirect ('/users/gerente');
        if($perfil_atual == 4)
            $this->redirect ('/users/desenvolvedor');
        if($perfil_atual == 5)
            $this->redirect ('/users/cliente');

        $this->render('branco');
    }

    public function root(){
        $this->set('titulo_page', 'ROOT');

        $this->set('menu_area', 'users_home');
        $this->render('branco');    //TODO grupodf
    }

    public function admin(){

        if($this->Session->read('perfil_atual') != 2 ){
            $this->Session->setFlash(__('Acesso restrito'), 'alert_message', array('tipo_message' => 'alert-block'));
            $this->redirect('/users/info');
        }

        $this->set('titulo_page', 'Administrador');
        $this->loadModel('Chamado');
        $chamados_desenvolvimento = $this->Chamado->getChamadosDesenvolvimento($this->Auth->user('id'));
        $chamados_concluidos = $this->Chamado->getChamadosConcluidos(5);
        $this->set('menu_area', 'users_home');
        $this->set('chamados_desenvolvimento', $chamados_desenvolvimento);
        $this->set('chamados_concluidos', $chamados_concluidos);
    }

    public function gerente(){
        $this->set('titulo_page', 'Gerente');

        $this->set('menu_area', 'users_home');
        $this->render('branco');    //TODO grupodf
    }

    public function desenvolvedor(){
        $this->set('titulo_page', 'Desenvolvedor');

        $this->loadModel('Chamado');
        $chamados_desenvolvimento = $this->Chamado->getChamadosDesenvolvimento($this->Auth->user('id'));
        $this->set('chamados_desenvolvimento', $chamados_desenvolvimento);

        $this->set('menu_area', 'users_home');
        //$this->render('branco');    //TODO grupodf
    }

    public function cliente(){
        $this->set('titulo_page', 'Cliente');

        $this->set('menu_area', 'users_home');
        $this->render('branco');    //TODO grupodf
    }


}
