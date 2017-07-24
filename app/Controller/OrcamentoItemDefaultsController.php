<?php
App::uses('AppController', 'Controller');
/**
 * OrcamentoItemDefaults Controller
 *
 * @property OrcamentoItemDefault $OrcamentoItemDefault
 */
class OrcamentoItemDefaultsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->OrcamentoItemDefault->recursive = 0;
		$this->set('orcamentoItemDefaults', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->OrcamentoItemDefault->id = $id;
		if (!$this->OrcamentoItemDefault->exists()) {
			throw new NotFoundException(__('Invalid orcamento item default'));
		}
		$this->set('orcamentoItemDefault', $this->OrcamentoItemDefault->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->OrcamentoItemDefault->create();
			if ($this->OrcamentoItemDefault->save($this->request->data)) {
				$this->Session->setFlash(__('The orcamento item default has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The orcamento item default could not be saved. Please, try again.'));
			}
		}
		$empresas = $this->OrcamentoItemDefault->Empresa->find('list');
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
		$this->OrcamentoItemDefault->id = $id;
		if (!$this->OrcamentoItemDefault->exists()) {
			throw new NotFoundException(__('Invalid orcamento item default'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->OrcamentoItemDefault->save($this->request->data)) {
				$this->Session->setFlash(__('The orcamento item default has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The orcamento item default could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->OrcamentoItemDefault->read(null, $id);
		}
		$empresas = $this->OrcamentoItemDefault->Empresa->find('list');
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
		$this->OrcamentoItemDefault->id = $id;
		if (!$this->OrcamentoItemDefault->exists()) {
			throw new NotFoundException(__('Invalid orcamento item default'));
		}
		if ($this->OrcamentoItemDefault->delete()) {
			$this->Session->setFlash(__('Orcamento item default deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Orcamento item default was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
