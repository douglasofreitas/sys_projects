<?php
App::uses('AppController', 'Controller');
/**
 * OrcamentoArquivos Controller
 *
 * @property OrcamentoArquivo $OrcamentoArquivo
 */
class OrcamentoArquivosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->OrcamentoArquivo->recursive = 0;
		$this->set('orcamentoArquivos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->OrcamentoArquivo->id = $id;
		if (!$this->OrcamentoArquivo->exists()) {
			throw new NotFoundException(__('Invalid orcamento arquivo'));
		}
		$this->set('orcamentoArquivo', $this->OrcamentoArquivo->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->OrcamentoArquivo->create();
			if ($this->OrcamentoArquivo->save($this->request->data)) {
				$this->Session->setFlash(__('The orcamento arquivo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The orcamento arquivo could not be saved. Please, try again.'));
			}
		}
		$orcamentos = $this->OrcamentoArquivo->Orcamento->find('list');
		$this->set(compact('orcamentos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->OrcamentoArquivo->id = $id;
		if (!$this->OrcamentoArquivo->exists()) {
			throw new NotFoundException(__('Invalid orcamento arquivo'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->OrcamentoArquivo->save($this->request->data)) {
				$this->Session->setFlash(__('The orcamento arquivo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The orcamento arquivo could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->OrcamentoArquivo->read(null, $id);
		}
		$orcamentos = $this->OrcamentoArquivo->Orcamento->find('list');
		$this->set(compact('orcamentos'));
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
		$this->OrcamentoArquivo->id = $id;
		if (!$this->OrcamentoArquivo->exists()) {
			throw new NotFoundException(__('Invalid orcamento arquivo'));
		}
		if ($this->OrcamentoArquivo->delete()) {
			$this->Session->setFlash(__('Orcamento arquivo deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Orcamento arquivo was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
