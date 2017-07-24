<?php
App::uses('AppController', 'Controller');
/**
 * EmpresaLayouts Controller
 *
 * @property EmpresaLayout $EmpresaLayout
 */
class EmpresaLayoutsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->EmpresaLayout->recursive = 0;
		$this->set('empresaLayouts', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->EmpresaLayout->id = $id;
		if (!$this->EmpresaLayout->exists()) {
			throw new NotFoundException(__('Invalid empresa layout'));
		}
		$this->set('empresaLayout', $this->EmpresaLayout->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EmpresaLayout->create();
			if ($this->EmpresaLayout->save($this->request->data)) {
				$this->Session->setFlash(__('The empresa layout has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The empresa layout could not be saved. Please, try again.'));
			}
		}
		$empresas = $this->EmpresaLayout->Empresa->find('list');
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
		$this->EmpresaLayout->id = $id;
		if (!$this->EmpresaLayout->exists()) {
			throw new NotFoundException(__('Invalid empresa layout'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->EmpresaLayout->save($this->request->data)) {
				$this->Session->setFlash(__('The empresa layout has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The empresa layout could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->EmpresaLayout->read(null, $id);
		}
		$empresas = $this->EmpresaLayout->Empresa->find('list');
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
		$this->EmpresaLayout->id = $id;
		if (!$this->EmpresaLayout->exists()) {
			throw new NotFoundException(__('Invalid empresa layout'));
		}
		if ($this->EmpresaLayout->delete()) {
			$this->Session->setFlash(__('Empresa layout deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Empresa layout was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
