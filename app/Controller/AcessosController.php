<?php
App::uses('AppController', 'Controller');
/**
 * Acessos Controller
 *
 * @property Acesso $Acesso
 */
class AcessosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Acesso->recursive = 0;
		$this->set('acessos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Acesso->id = $id;
		if (!$this->Acesso->exists()) {
			throw new NotFoundException(__('Invalid acesso'));
		}
		$this->set('acesso', $this->Acesso->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Acesso->create();
			if ($this->Acesso->save($this->request->data)) {
				$this->Session->setFlash(__('The acesso has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The acesso could not be saved. Please, try again.'));
			}
		}
		$users = $this->Acesso->User->find('list');
		$empresas = $this->Acesso->Empresa->find('list');
		$this->set(compact('users', 'empresas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Acesso->id = $id;
		if (!$this->Acesso->exists()) {
			throw new NotFoundException(__('Invalid acesso'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Acesso->save($this->request->data)) {
				$this->Session->setFlash(__('The acesso has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The acesso could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Acesso->read(null, $id);
		}
		$users = $this->Acesso->User->find('list');
		$empresas = $this->Acesso->Empresa->find('list');
		$this->set(compact('users', 'empresas'));
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
		$this->Acesso->id = $id;
		if (!$this->Acesso->exists()) {
			throw new NotFoundException(__('Invalid acesso'));
		}
		if ($this->Acesso->delete()) {
			$this->Session->setFlash(__('Acesso deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Acesso was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
        
        public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow('');
            $this->verifica_login();
        }
}
