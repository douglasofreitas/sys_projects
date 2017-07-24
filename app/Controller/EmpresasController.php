<?php
App::uses('AppController', 'Controller');
/**
 * Empresas Controller
 *
 * @property Empresa $Empresa
 */
class EmpresasController extends AppController {
        
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->set('titulo_page', $this->empresa_core['Empresa']['nome']);
		
		
		//obter dados gerais da empresa
		$this->set('empresa', null);
		
	}
        
        public function home() {
                $this->set('titulo_page', 'Geral');
            
		$this->set('empresa', null);
	}
        
        public function config() {
                $this->set('titulo_page', 'Configuração');
                
		$this->set('empresa', null);
                $this->set('menu_area', 'config');
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Empresa->id = $id;
		if (!$this->Empresa->exists()) {
			throw new NotFoundException(__('Invalid empresa'));
		}
		$this->set('empresa', $this->Empresa->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Empresa->create();
			if ($this->Empresa->save($this->request->data)) {
				$this->Session->setFlash(__('The empresa has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The empresa could not be saved. Please, try again.'));
			}
		}
		$empresaStatuses = $this->Empresa->EmpresaStatus->find('list');
		
		$this->set(compact('empresaStatuses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
                $this->set('titulo_page', 'Configuração');
		$this->Empresa->id = $id;
		if (!$this->Empresa->exists()) {
			throw new NotFoundException(__('Invalid empresa'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Empresa->save($this->request->data)) {
				$this->Session->setFlash(__('The empresa has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The empresa could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Empresa->read(null, $id);
		}
		$empresaStatuses = $this->Empresa->EmpresaStatus->find('list');
		$cidades = $this->Empresa->Cidade->find('list');
		$meiopagamentos = $this->Empresa->Meiopagamento->find('list');
		$users = $this->Empresa->User->find('list');
		$this->set(compact('empresaStatuses', 'cidades', 'meiopagamentos', 'users'));
	}
        
		
		
		
		
		
        public function edit_geral(){
            $this->set('titulo_page', 'Configuração');
            $this->Empresa->id = $this->empresa_core['Empresa']['id'];
            if (!$this->Empresa->exists()) {
                    throw new NotFoundException(__('Invalid empresa'));
            }
            if ($this->request->is('post') || $this->request->is('put')) {

                    $user_id = $id;
                    $count = 0;
                    foreach ($this->request->data['Empresa']['arquivo'] as $arquivo){
                            if(!empty($arquivo)) {
                                    if($arquivo['error'] == 0){
                                            $extensao = substr(strrchr($arquivo['name'], '.'), 1 );
                                            $datetime = date('YmdHms');
                                            $nome_arquivo = 'usuario_'.$this->empresa_core['Empresa']['id'].'_'.$datetime.$count.'.'.$extensao;
                                            $result = $this->uploadFiles('uploads', array($arquivo), $this->empresa_core['Empresa']['chave_url'], array($nome_arquivo));

                                            //gravar dados do arquivo no banco
                                            $this->request->data['Empresa']['logo_img'] = $nome_arquivo;
                                    }
                            }
                    }

                    if ($this->Empresa->save($this->request->data)) {
                            $this->Session->setFlash(__('The empresa has been saved'));
                            $this->redirect(array('action' => 'index'));
                    } else {
                            $this->Session->setFlash(__('The empresa could not be saved. Please, try again.'));
                    }
            } else {

            }
			
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
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Empresa->id = $id;
		if (!$this->Empresa->exists()) {
			throw new NotFoundException(__('Invalid empresa'));
		}
		if ($this->Empresa->delete()) {
			$this->Session->setFlash(__('Empresa deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Empresa was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('');
        $this->verifica_login();

        //verificando caso de não ser administrador
        if($this->Session->read('perfil_atual') == 5){ //cliente
            $this->Session->setFlash(__('Acesso restrito'), 'alert_message', array('tipo_message' => 'alert-block'));
            $this->redirect('/users/info');
        }

		$this->set('menu_area', 'empresas');
	}
}
