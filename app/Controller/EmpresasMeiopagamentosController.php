<?php
App::uses('AppController', 'Controller');
/**
 * EmpresasMeiopagamentos Controller
 *
 * @property EmpresasMeiopagamento $EmpresasMeiopagamento
 */
class EmpresasMeiopagamentosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->EmpresasMeiopagamento->recursive = 0;
		$this->set('empresasMeiopagamentos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->EmpresasMeiopagamento->id = $id;
		if (!$this->EmpresasMeiopagamento->exists()) {
			throw new NotFoundException(__('Invalid empresas meiopagamento'));
		}
		$this->set('empresasMeiopagamento', $this->EmpresasMeiopagamento->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EmpresasMeiopagamento->create();
			if ($this->EmpresasMeiopagamento->save($this->request->data)) {
				$this->Session->setFlash(__('The empresas meiopagamento has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The empresas meiopagamento could not be saved. Please, try again.'));
			}
		}
		$empresas = $this->EmpresasMeiopagamento->Empresa->find('list');
		$meioPagamentos = $this->EmpresasMeiopagamento->MeioPagamento->find('list');
		$this->set(compact('empresas', 'meioPagamentos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->EmpresasMeiopagamento->id = $id;
		if (!$this->EmpresasMeiopagamento->exists()) {
			throw new NotFoundException(__('Invalid empresas meiopagamento'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->EmpresasMeiopagamento->save($this->request->data)) {
				$this->Session->setFlash(__('The empresas meiopagamento has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The empresas meiopagamento could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->EmpresasMeiopagamento->read(null, $id);
		}
		$empresas = $this->EmpresasMeiopagamento->Empresa->find('list');
		$meioPagamentos = $this->EmpresasMeiopagamento->MeioPagamento->find('list');
		$this->set(compact('empresas', 'meioPagamentos'));
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
		$this->EmpresasMeiopagamento->id = $id;
		if (!$this->EmpresasMeiopagamento->exists()) {
			throw new NotFoundException(__('Invalid empresas meiopagamento'));
		}
		if ($this->EmpresasMeiopagamento->delete()) {
			$this->Session->setFlash(__('Empresas meiopagamento deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Empresas meiopagamento was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
