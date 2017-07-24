<?php
App::uses('AppController', 'Controller');
/**
 * InteracaoArquivos Controller
 *
 * @property InteracaoArquivo $InteracaoArquivo
 */
class InteracaoArquivosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->InteracaoArquivo->recursive = 0;
		$this->set('interacaoArquivos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->InteracaoArquivo->id = $id;
		if (!$this->InteracaoArquivo->exists()) {
			throw new NotFoundException(__('Invalid interacao arquivo'));
		}
		$this->set('interacaoArquivo', $this->InteracaoArquivo->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->InteracaoArquivo->create();
			if ($this->InteracaoArquivo->save($this->request->data)) {
				$this->Session->setFlash(__('The interacao arquivo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The interacao arquivo could not be saved. Please, try again.'));
			}
		}
		$interacaos = $this->InteracaoArquivo->Interacao->find('list');
		$this->set(compact('interacaos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->InteracaoArquivo->id = $id;
		if (!$this->InteracaoArquivo->exists()) {
			throw new NotFoundException(__('Invalid interacao arquivo'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->InteracaoArquivo->save($this->request->data)) {
				$this->Session->setFlash(__('The interacao arquivo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The interacao arquivo could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->InteracaoArquivo->read(null, $id);
		}
		$interacaos = $this->InteracaoArquivo->Interacao->find('list');
		$this->set(compact('interacaos'));
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
		$this->InteracaoArquivo->id = $id;
		if (!$this->InteracaoArquivo->exists()) {
			throw new NotFoundException(__('Invalid interacao arquivo'));
		}
		if ($this->InteracaoArquivo->delete()) {
			$this->Session->setFlash(__('Interacao arquivo deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Interacao arquivo was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
