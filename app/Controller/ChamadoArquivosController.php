<?php
App::uses('AppController', 'Controller');
/**
 * ChamadoArquivos Controller
 *
 * @property ChamadoArquivo $ChamadoArquivo
 */
class ChamadoArquivosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ChamadoArquivo->recursive = 0;
		$this->set('chamadoArquivos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ChamadoArquivo->id = $id;
		if (!$this->ChamadoArquivo->exists()) {
			throw new NotFoundException(__('Invalid chamado arquivo'));
		}
		$this->set('chamadoArquivo', $this->ChamadoArquivo->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ChamadoArquivo->create();
			if ($this->ChamadoArquivo->save($this->request->data)) {
				$this->Session->setFlash(__('The chamado arquivo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The chamado arquivo could not be saved. Please, try again.'));
			}
		}
		$chamados = $this->ChamadoArquivo->Chamado->find('list');
		$this->set(compact('chamados'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->ChamadoArquivo->id = $id;
		if (!$this->ChamadoArquivo->exists()) {
			throw new NotFoundException(__('Invalid chamado arquivo'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ChamadoArquivo->save($this->request->data)) {
				$this->Session->setFlash(__('The chamado arquivo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The chamado arquivo could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ChamadoArquivo->read(null, $id);
		}
		$chamados = $this->ChamadoArquivo->Chamado->find('list');
		$this->set(compact('chamados'));
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
		$this->ChamadoArquivo->id = $id;
		if (!$this->ChamadoArquivo->exists()) {
			throw new NotFoundException(__('Invalid chamado arquivo'));
		}
		if ($this->ChamadoArquivo->delete()) {
			$this->Session->setFlash(__('Chamado arquivo deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Chamado arquivo was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
