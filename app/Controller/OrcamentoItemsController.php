<?php
App::uses('AppController', 'Controller');
/**
 * OrcamentoItems Controller
 *
 * @property OrcamentoItem $OrcamentoItem
 */
class OrcamentoItemsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->OrcamentoItem->recursive = 0;
		$this->set('orcamentoItems', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->OrcamentoItem->id = $id;
		if (!$this->OrcamentoItem->exists()) {
			throw new NotFoundException(__('Invalid orcamento item'));
		}
		$this->set('orcamentoItem', $this->OrcamentoItem->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->OrcamentoItem->create();
			if ($this->OrcamentoItem->save($this->request->data)) {
				$this->Session->setFlash(__('The orcamento item has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The orcamento item could not be saved. Please, try again.'));
			}
		}
		$orcamentos = $this->OrcamentoItem->Orcamento->find('list');
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
		$this->OrcamentoItem->id = $id;
		if (!$this->OrcamentoItem->exists()) {
			throw new NotFoundException(__('Invalid orcamento item'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->OrcamentoItem->save($this->request->data)) {
				$this->Session->setFlash(__('The orcamento item has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The orcamento item could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->OrcamentoItem->read(null, $id);
		}
		$orcamentos = $this->OrcamentoItem->Orcamento->find('list');
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
		$this->OrcamentoItem->id = $id;
		if (!$this->OrcamentoItem->exists()) {
			throw new NotFoundException(__('Invalid orcamento item'));
		}
		if ($this->OrcamentoItem->delete()) {
			$this->Session->setFlash(__('Orcamento item deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Orcamento item was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
