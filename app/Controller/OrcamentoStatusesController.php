<?php
App::uses('AppController', 'Controller');
/**
 * OrcamentoStatuses Controller
 *
 * @property OrcamentoStatus $OrcamentoStatus
 */
class OrcamentoStatusesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->OrcamentoStatus->recursive = 0;
		$this->set('orcamentoStatuses', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->OrcamentoStatus->id = $id;
		if (!$this->OrcamentoStatus->exists()) {
			throw new NotFoundException(__('Invalid orcamento status'));
		}
		$this->set('orcamentoStatus', $this->OrcamentoStatus->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->OrcamentoStatus->create();
			if ($this->OrcamentoStatus->save($this->request->data)) {
				$this->Session->setFlash(__('The orcamento status has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The orcamento status could not be saved. Please, try again.'));
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
		$this->OrcamentoStatus->id = $id;
		if (!$this->OrcamentoStatus->exists()) {
			throw new NotFoundException(__('Invalid orcamento status'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->OrcamentoStatus->save($this->request->data)) {
				$this->Session->setFlash(__('The orcamento status has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The orcamento status could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->OrcamentoStatus->read(null, $id);
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
		$this->OrcamentoStatus->id = $id;
		if (!$this->OrcamentoStatus->exists()) {
			throw new NotFoundException(__('Invalid orcamento status'));
		}
		if ($this->OrcamentoStatus->delete()) {
			$this->Session->setFlash(__('Orcamento status deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Orcamento status was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
