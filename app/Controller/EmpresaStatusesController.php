<?php
App::uses('AppController', 'Controller');
/**
 * EmpresaStatuses Controller
 *
 * @property EmpresaStatus $EmpresaStatus
 */
class EmpresaStatusesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->EmpresaStatus->recursive = 0;
		$this->set('empresaStatuses', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->EmpresaStatus->id = $id;
		if (!$this->EmpresaStatus->exists()) {
			throw new NotFoundException(__('Invalid empresa status'));
		}
		$this->set('empresaStatus', $this->EmpresaStatus->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EmpresaStatus->create();
			if ($this->EmpresaStatus->save($this->request->data)) {
				$this->Session->setFlash(__('The empresa status has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The empresa status could not be saved. Please, try again.'));
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
		$this->EmpresaStatus->id = $id;
		if (!$this->EmpresaStatus->exists()) {
			throw new NotFoundException(__('Invalid empresa status'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->EmpresaStatus->save($this->request->data)) {
				$this->Session->setFlash(__('The empresa status has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The empresa status could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->EmpresaStatus->read(null, $id);
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
		$this->EmpresaStatus->id = $id;
		if (!$this->EmpresaStatus->exists()) {
			throw new NotFoundException(__('Invalid empresa status'));
		}
		if ($this->EmpresaStatus->delete()) {
			$this->Session->setFlash(__('Empresa status deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Empresa status was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
