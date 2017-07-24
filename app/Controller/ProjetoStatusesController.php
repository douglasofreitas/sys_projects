<?php
App::uses('AppController', 'Controller');
/**
 * ProjetoStatuses Controller
 *
 * @property ProjetoStatus $ProjetoStatus
 */
class ProjetoStatusesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ProjetoStatus->recursive = 0;
		$this->set('projetoStatuses', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ProjetoStatus->id = $id;
		if (!$this->ProjetoStatus->exists()) {
			throw new NotFoundException(__('Invalid projeto status'));
		}
		$this->set('projetoStatus', $this->ProjetoStatus->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProjetoStatus->create();
			if ($this->ProjetoStatus->save($this->request->data)) {
				$this->Session->setFlash(__('The projeto status has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projeto status could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->ProjetoStatus->id = $id;
		if (!$this->ProjetoStatus->exists()) {
			throw new NotFoundException(__('Invalid projeto status'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ProjetoStatus->save($this->request->data)) {
				$this->Session->setFlash(__('The projeto status has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projeto status could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ProjetoStatus->read(null, $id);
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
		$this->ProjetoStatus->id = $id;
		if (!$this->ProjetoStatus->exists()) {
			throw new NotFoundException(__('Invalid projeto status'));
		}
		if ($this->ProjetoStatus->delete()) {
			$this->Session->setFlash(__('Projeto status deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Projeto status was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
        
        public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow('*');
        }
}
