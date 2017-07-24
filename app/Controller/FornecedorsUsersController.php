<?php
App::uses('AppController', 'Controller');
/**
 * FornecedorsUsers Controller
 *
 * @property FornecedorsUser $FornecedorsUser
 */
class FornecedorsUsersController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->FornecedorsUser->recursive = 0;
		$this->set('fornecedorsUsers', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->FornecedorsUser->id = $id;
		if (!$this->FornecedorsUser->exists()) {
			throw new NotFoundException(__('Invalid fornecedors user'));
		}
		$this->set('fornecedorsUser', $this->FornecedorsUser->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FornecedorsUser->create();
			if ($this->FornecedorsUser->save($this->request->data)) {
				$this->Session->setFlash(__('The fornecedors user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The fornecedors user could not be saved. Please, try again.'));
			}
		}
		$users = $this->FornecedorsUser->User->find('list');
		$fornecedors = $this->FornecedorsUser->Fornecedor->find('list');
		$this->set(compact('users', 'fornecedors'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->FornecedorsUser->id = $id;
		if (!$this->FornecedorsUser->exists()) {
			throw new NotFoundException(__('Invalid fornecedors user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->FornecedorsUser->save($this->request->data)) {
				$this->Session->setFlash(__('The fornecedors user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The fornecedors user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->FornecedorsUser->read(null, $id);
		}
		$users = $this->FornecedorsUser->User->find('list');
		$fornecedors = $this->FornecedorsUser->Fornecedor->find('list');
		$this->set(compact('users', 'fornecedors'));
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
		$this->FornecedorsUser->id = $id;
		if (!$this->FornecedorsUser->exists()) {
			throw new NotFoundException(__('Invalid fornecedors user'));
		}
		if ($this->FornecedorsUser->delete()) {
			$this->Session->setFlash(__('Fornecedors user deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Fornecedors user was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
