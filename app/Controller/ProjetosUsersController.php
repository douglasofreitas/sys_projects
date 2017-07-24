<?php
App::uses('AppController', 'Controller');
/**
 * ProjetosUsers Controller
 *
 * @property ProjetosUser $ProjetosUser
 */
class ProjetosUsersController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ProjetosUser->recursive = 0;
		$this->set('projetosUsers', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ProjetosUser->id = $id;
		if (!$this->ProjetosUser->exists()) {
			throw new NotFoundException(__('Invalid projetos user'));
		}
		$this->set('projetosUser', $this->ProjetosUser->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProjetosUser->create();
			if ($this->ProjetosUser->save($this->request->data)) {
				$this->Session->setFlash(__('The projetos user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projetos user could not be saved. Please, try again.'));
			}
		}
		$users = $this->ProjetosUser->User->find('list');
		$projetos = $this->ProjetosUser->Projeto->find('list');
		$this->set(compact('users', 'projetos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->ProjetosUser->id = $id;
		if (!$this->ProjetosUser->exists()) {
			throw new NotFoundException(__('Invalid projetos user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ProjetosUser->save($this->request->data)) {
				$this->Session->setFlash(__('The projetos user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projetos user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ProjetosUser->read(null, $id);
		}
		$users = $this->ProjetosUser->User->find('list');
		$projetos = $this->ProjetosUser->Projeto->find('list');
		$this->set(compact('users', 'projetos'));
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
		$this->ProjetosUser->id = $id;
		if (!$this->ProjetosUser->exists()) {
			throw new NotFoundException(__('Invalid projetos user'));
		}
		if ($this->ProjetosUser->delete()) {
			$this->Session->setFlash(__('Projetos user deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Projetos user was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
        
        public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow('*');
        }
}
