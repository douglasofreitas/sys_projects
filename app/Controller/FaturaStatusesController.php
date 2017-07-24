<?php
App::uses('AppController', 'Controller');
/**
 * FaturaStatuses Controller
 *
 * @property FaturaStatus $FaturaStatus
 */
class FaturaStatusesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->FaturaStatus->recursive = 0;
		$this->set('faturaStatuses', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->FaturaStatus->id = $id;
		if (!$this->FaturaStatus->exists()) {
			throw new NotFoundException(__('Invalid fatura status'));
		}
		$this->set('faturaStatus', $this->FaturaStatus->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FaturaStatus->create();
			if ($this->FaturaStatus->save($this->request->data)) {
				$this->Session->setFlash(__('The fatura status has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The fatura status could not be saved. Please, try again.'));
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
		$this->FaturaStatus->id = $id;
		if (!$this->FaturaStatus->exists()) {
			throw new NotFoundException(__('Invalid fatura status'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->FaturaStatus->save($this->request->data)) {
				$this->Session->setFlash(__('The fatura status has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The fatura status could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->FaturaStatus->read(null, $id);
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
		$this->FaturaStatus->id = $id;
		if (!$this->FaturaStatus->exists()) {
			throw new NotFoundException(__('Invalid fatura status'));
		}
		if ($this->FaturaStatus->delete()) {
			$this->Session->setFlash(__('Fatura status deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Fatura status was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
