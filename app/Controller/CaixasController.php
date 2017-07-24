<?php
App::uses('AppController', 'Controller');
/**
 * Caixas Controller
 *
 * @property Caixa $Caixa
 */
class CaixasController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Caixa->recursive = 0;
		$this->set('caixas', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Caixa->id = $id;
		if (!$this->Caixa->exists()) {
			throw new NotFoundException(__('Invalid caixa'));
		}
		$this->set('caixa', $this->Caixa->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Caixa->create();
			if ($this->Caixa->save($this->request->data)) {
				$this->Session->setFlash(__('The caixa has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The caixa could not be saved. Please, try again.'));
			}
		}
		$faturaPagars = $this->Caixa->FaturaPagar->find('list');
		$faturaRecebers = $this->Caixa->FaturaReceber->find('list');
		$empresas = $this->Caixa->Empresa->find('list');
		$this->set(compact('faturaPagars', 'faturaRecebers', 'empresas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Caixa->id = $id;
		if (!$this->Caixa->exists()) {
			throw new NotFoundException(__('Invalid caixa'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Caixa->save($this->request->data)) {
				$this->Session->setFlash(__('The caixa has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The caixa could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Caixa->read(null, $id);
		}
		$faturaPagars = $this->Caixa->FaturaPagar->find('list');
		$faturaRecebers = $this->Caixa->FaturaReceber->find('list');
		$empresas = $this->Caixa->Empresa->find('list');
		$this->set(compact('faturaPagars', 'faturaRecebers', 'empresas'));
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
		$this->Caixa->id = $id;
		if (!$this->Caixa->exists()) {
			throw new NotFoundException(__('Invalid caixa'));
		}
		if ($this->Caixa->delete()) {
			$this->Session->setFlash(__('Caixa deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Caixa was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
        
        public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow('');
            $this->verifica_login();
        }
}
