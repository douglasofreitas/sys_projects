<?php
App::uses('AppController', 'Controller');
/**
 * CidadesEmpresas Controller
 *
 * @property CidadesEmpresa $CidadesEmpresa
 */
class CidadesEmpresasController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->CidadesEmpresa->recursive = 0;
		$this->set('cidadesEmpresas', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->CidadesEmpresa->id = $id;
		if (!$this->CidadesEmpresa->exists()) {
			throw new NotFoundException(__('Invalid cidades empresa'));
		}
		$this->set('cidadesEmpresa', $this->CidadesEmpresa->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CidadesEmpresa->create();
			if ($this->CidadesEmpresa->save($this->request->data)) {
				$this->Session->setFlash(__('The cidades empresa has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cidades empresa could not be saved. Please, try again.'));
			}
		}
		$estados = $this->CidadesEmpresa->Estado->find('list');
		$empresas = $this->CidadesEmpresa->Empresa->find('list');
		$this->set(compact('estados', 'empresas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->CidadesEmpresa->id = $id;
		if (!$this->CidadesEmpresa->exists()) {
			throw new NotFoundException(__('Invalid cidades empresa'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CidadesEmpresa->save($this->request->data)) {
				$this->Session->setFlash(__('The cidades empresa has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cidades empresa could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->CidadesEmpresa->read(null, $id);
		}
		$estados = $this->CidadesEmpresa->Estado->find('list');
		$empresas = $this->CidadesEmpresa->Empresa->find('list');
		$this->set(compact('estados', 'empresas'));
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
		$this->CidadesEmpresa->id = $id;
		if (!$this->CidadesEmpresa->exists()) {
			throw new NotFoundException(__('Invalid cidades empresa'));
		}
		if ($this->CidadesEmpresa->delete()) {
			$this->Session->setFlash(__('Cidades empresa deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Cidades empresa was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
