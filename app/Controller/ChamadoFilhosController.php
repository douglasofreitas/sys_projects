<?php
App::uses('AppController', 'Controller');
/**
 * ChamadoFilhos Controller
 *
 * @property ChamadoFilho $ChamadoFilho
 */
class ChamadoFilhosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ChamadoFilho->recursive = 0;
		$this->set('chamadoFilhos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ChamadoFilho->id = $id;
		if (!$this->ChamadoFilho->exists()) {
			throw new NotFoundException(__('Invalid chamado filho'));
		}
		$this->set('chamadoFilho', $this->ChamadoFilho->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ChamadoFilho->create();
			if ($this->ChamadoFilho->save($this->request->data)) {
				$this->Session->setFlash(__('The chamado filho has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The chamado filho could not be saved. Please, try again.'));
			}
		}
		$chamadoPais = $this->ChamadoFilho->ChamadoPai->find('list');
		$chamadoFilhos = $this->ChamadoFilho->ChamadoFilho->find('list');
		$this->set(compact('chamadoPais', 'chamadoFilhos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->ChamadoFilho->id = $id;
		if (!$this->ChamadoFilho->exists()) {
			throw new NotFoundException(__('Invalid chamado filho'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ChamadoFilho->save($this->request->data)) {
				$this->Session->setFlash(__('The chamado filho has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The chamado filho could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ChamadoFilho->read(null, $id);
		}
		$chamadoPais = $this->ChamadoFilho->ChamadoPai->find('list');
		$chamadoFilhos = $this->ChamadoFilho->ChamadoFilho->find('list');
		$this->set(compact('chamadoPais', 'chamadoFilhos'));
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
		$this->ChamadoFilho->id = $id;
		if (!$this->ChamadoFilho->exists()) {
			throw new NotFoundException(__('Invalid chamado filho'));
		}
		if ($this->ChamadoFilho->delete()) {
			$this->Session->setFlash(__('Chamado filho deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Chamado filho was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
