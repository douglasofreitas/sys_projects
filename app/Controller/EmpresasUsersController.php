<?php
App::uses('AppController', 'Controller');
/**
 * EmpresasUsers Controller
 *
 * @property EmpresasUser $EmpresasUser
 */
class EmpresasUsersController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->EmpresasUser->recursive = 0;
		$this->set('empresasUsers', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->EmpresasUser->id = $id;
		if (!$this->EmpresasUser->exists()) {
			throw new NotFoundException(__('Invalid empresas user'));
		}
		$this->set('empresasUser', $this->EmpresasUser->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EmpresasUser->create();
			if ($this->EmpresasUser->save($this->request->data)) {
				$this->Session->setFlash(__('The empresas user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The empresas user could not be saved. Please, try again.'));
			}
		}
		$empresas = $this->EmpresasUser->Empresa->find('list');
		$users = $this->EmpresasUser->User->find('list');
		$this->set(compact('empresas', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->EmpresasUser->id = $id;
		if (!$this->EmpresasUser->exists()) {
			throw new NotFoundException(__('Invalid empresas user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->EmpresasUser->save($this->request->data)) {
				$this->Session->setFlash(__('The empresas user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The empresas user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->EmpresasUser->read(null, $id);
		}
		$empresas = $this->EmpresasUser->Empresa->find('list');
		$users = $this->EmpresasUser->User->find('list');
		$this->set(compact('empresas', 'users'));
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
		$this->EmpresasUser->id = $id;
		if (!$this->EmpresasUser->exists()) {
			throw new NotFoundException(__('Invalid empresas user'));
		}
		if ($this->EmpresasUser->delete()) {
			$this->Session->setFlash(__('Empresas user deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Empresas user was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
