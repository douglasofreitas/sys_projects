<?php
App::uses('AppController', 'Controller');
/**
 * ClientesUsers Controller
 *
 * @property ClientesUser $ClientesUser
 */
class ClientesUsersController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ClientesUser->recursive = 0;
		$this->set('clientesUsers', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ClientesUser->id = $id;
		if (!$this->ClientesUser->exists()) {
			throw new NotFoundException(__('Invalid clientes user'));
		}
		$this->set('clientesUser', $this->ClientesUser->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ClientesUser->create();
			if ($this->ClientesUser->save($this->request->data)) {
				$this->Session->setFlash(__('The clientes user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The clientes user could not be saved. Please, try again.'));
			}
		}
		$users = $this->ClientesUser->User->find('list');
		$clientes = $this->ClientesUser->Cliente->find('list');
		$this->set(compact('users', 'clientes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->ClientesUser->id = $id;
		if (!$this->ClientesUser->exists()) {
			throw new NotFoundException(__('Invalid clientes user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ClientesUser->save($this->request->data)) {
				$this->Session->setFlash(__('The clientes user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The clientes user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ClientesUser->read(null, $id);
		}
		$users = $this->ClientesUser->User->find('list');
		$clientes = $this->ClientesUser->Cliente->find('list');
		$this->set(compact('users', 'clientes'));
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
		$this->ClientesUser->id = $id;
		if (!$this->ClientesUser->exists()) {
			throw new NotFoundException(__('Invalid clientes user'));
		}
		if ($this->ClientesUser->delete()) {
			$this->Session->setFlash(__('Clientes user deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Clientes user was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
