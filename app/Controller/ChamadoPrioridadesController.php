<?php
App::uses('AppController', 'Controller');
/**
 * ChamadoPrioridades Controller
 *
 * @property ChamadoPrioridade $ChamadoPrioridade
 */
class ChamadoPrioridadesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ChamadoPrioridade->recursive = 0;
		$this->set('chamadoPrioridades', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ChamadoPrioridade->id = $id;
		if (!$this->ChamadoPrioridade->exists()) {
			throw new NotFoundException(__('Invalid chamado prioridade'));
		}
		$this->set('chamadoPrioridade', $this->ChamadoPrioridade->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ChamadoPrioridade->create();
			if ($this->ChamadoPrioridade->save($this->request->data)) {
				$this->Session->setFlash(__('The chamado prioridade has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The chamado prioridade could not be saved. Please, try again.'));
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
		$this->ChamadoPrioridade->id = $id;
		if (!$this->ChamadoPrioridade->exists()) {
			throw new NotFoundException(__('Invalid chamado prioridade'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ChamadoPrioridade->save($this->request->data)) {
				$this->Session->setFlash(__('The chamado prioridade has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The chamado prioridade could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ChamadoPrioridade->read(null, $id);
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
		$this->ChamadoPrioridade->id = $id;
		if (!$this->ChamadoPrioridade->exists()) {
			throw new NotFoundException(__('Invalid chamado prioridade'));
		}
		if ($this->ChamadoPrioridade->delete()) {
			$this->Session->setFlash(__('Chamado prioridade deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Chamado prioridade was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
