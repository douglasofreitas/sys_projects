<?php
App::uses('AppController', 'Controller');
/**
 * MeioPagamentos Controller
 *
 * @property MeioPagamento $MeioPagamento
 */
class MeioPagamentosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->MeioPagamento->recursive = 0;
		$this->set('meioPagamentos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->MeioPagamento->id = $id;
		if (!$this->MeioPagamento->exists()) {
			throw new NotFoundException(__('Invalid meio pagamento'));
		}
		$this->set('meioPagamento', $this->MeioPagamento->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->MeioPagamento->create();
			if ($this->MeioPagamento->save($this->request->data)) {
				$this->Session->setFlash(__('The meio pagamento has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The meio pagamento could not be saved. Please, try again.'));
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
		$this->MeioPagamento->id = $id;
		if (!$this->MeioPagamento->exists()) {
			throw new NotFoundException(__('Invalid meio pagamento'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->MeioPagamento->save($this->request->data)) {
				$this->Session->setFlash(__('The meio pagamento has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The meio pagamento could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->MeioPagamento->read(null, $id);
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
		$this->MeioPagamento->id = $id;
		if (!$this->MeioPagamento->exists()) {
			throw new NotFoundException(__('Invalid meio pagamento'));
		}
		if ($this->MeioPagamento->delete()) {
			$this->Session->setFlash(__('Meio pagamento deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Meio pagamento was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
        
        public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow('');
            $this->verifica_login();
        }
}
