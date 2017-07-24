<?php
App::uses('AppController', 'Controller');
/**
 * ChamadoTipos Controller
 *
 * @property ChamadoTipo $ChamadoTipo
 */
class ChamadoTiposController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ChamadoTipo->recursive = 0;
		$this->set('chamadoTipos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ChamadoTipo->id = $id;
		if (!$this->ChamadoTipo->exists()) {
			throw new NotFoundException(__('Invalid chamado tipo'));
		}
		$this->set('chamadoTipo', $this->ChamadoTipo->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ChamadoTipo->create();
			if ($this->ChamadoTipo->save($this->request->data)) {
				$this->Session->setFlash(__('The chamado tipo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The chamado tipo could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->ChamadoTipo->id = $id;
		if (!$this->ChamadoTipo->exists()) {
			throw new NotFoundException(__('Invalid chamado tipo'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ChamadoTipo->save($this->request->data)) {
				$this->Session->setFlash(__('The chamado tipo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The chamado tipo could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ChamadoTipo->read(null, $id);
		}
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
		$this->ChamadoTipo->id = $id;
		if (!$this->ChamadoTipo->exists()) {
			throw new NotFoundException(__('Invalid chamado tipo'));
		}
		if ($this->ChamadoTipo->delete()) {
			$this->Session->setFlash(__('Chamado tipo deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Chamado tipo was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
        
        public function beforeFilter() {
                parent::beforeFilter();
                $this->Auth->allow('');
                $this->verifica_login();
        }
}
