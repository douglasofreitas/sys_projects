<?php
App::uses('AppController', 'Controller');
/**
 * EmpresaConfigs Controller
 *
 * @property EmpresaConfig $EmpresaConfig
 */
class EmpresaConfigsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->EmpresaConfig->recursive = 0;
		$this->set('empresaConfigs', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->EmpresaConfig->id = $id;
		if (!$this->EmpresaConfig->exists()) {
			throw new NotFoundException(__('Invalid empresa config'));
		}
		$this->set('empresaConfig', $this->EmpresaConfig->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EmpresaConfig->create();
			if ($this->EmpresaConfig->save($this->request->data)) {
				$this->Session->setFlash(__('The empresa config has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The empresa config could not be saved. Please, try again.'));
			}
		}
		$empresas = $this->EmpresaConfig->Empresa->find('list');
		$this->set(compact('empresas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->EmpresaConfig->id = $id;
		if (!$this->EmpresaConfig->exists()) {
			throw new NotFoundException(__('Invalid empresa config'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->EmpresaConfig->save($this->request->data)) {
				$this->Session->setFlash(__('The empresa config has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The empresa config could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->EmpresaConfig->read(null, $id);
		}
		$empresas = $this->EmpresaConfig->Empresa->find('list');
		$this->set(compact('empresas'));
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
		$this->EmpresaConfig->id = $id;
		if (!$this->EmpresaConfig->exists()) {
			throw new NotFoundException(__('Invalid empresa config'));
		}
		if ($this->EmpresaConfig->delete()) {
			$this->Session->setFlash(__('Empresa config deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Empresa config was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
