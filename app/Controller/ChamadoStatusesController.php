<?php
App::uses('AppController', 'Controller');
/**
 * ChamadoStatuses Controller
 *
 * @property ChamadoStatus $ChamadoStatus
 */
class ChamadoStatusesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ChamadoStatus->recursive = 0;
		$this->set('chamadoStatuses', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ChamadoStatus->id = $id;
		if (!$this->ChamadoStatus->exists()) {
			throw new NotFoundException(__('Invalid chamado status'));
		}
		$this->set('chamadoStatus', $this->ChamadoStatus->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ChamadoStatus->create();
			if ($this->ChamadoStatus->save($this->request->data)) {
				$this->Session->setFlash(__('The chamado status has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The chamado status could not be saved. Please, try again.'));
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
		$this->ChamadoStatus->id = $id;
		if (!$this->ChamadoStatus->exists()) {
			throw new NotFoundException(__('Invalid chamado status'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ChamadoStatus->save($this->request->data)) {
				$this->Session->setFlash(__('The chamado status has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The chamado status could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ChamadoStatus->read(null, $id);
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
		$this->ChamadoStatus->id = $id;
		if (!$this->ChamadoStatus->exists()) {
			throw new NotFoundException(__('Invalid chamado status'));
		}
		if ($this->ChamadoStatus->delete()) {
			$this->Session->setFlash(__('Chamado status deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Chamado status was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
