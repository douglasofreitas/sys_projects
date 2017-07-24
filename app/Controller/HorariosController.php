<?php
App::uses('AppController', 'Controller');
/**
 * Horarios Controller
 *
 * @property Horario $Horario
 */
class HorariosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
                $this->set('titulo_page', 'Horários');
		$this->Horario->recursive = 0;
		$this->set('horarios', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Horario->id = $id;
		if (!$this->Horario->exists()) {
			throw new NotFoundException(__('Invalid horario'));
		}
		$this->set('horario', $this->Horario->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Horario->create();
			if ($this->Horario->save($this->request->data)) {
				$this->Session->setFlash(__('The horario has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The horario could not be saved. Please, try again.'));
			}
		}
		$users = $this->Horario->User->find('list');
		$empresas = $this->Horario->Empresa->find('list');
		$this->set(compact('users', 'empresas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Horario->id = $id;
		if (!$this->Horario->exists()) {
			throw new NotFoundException(__('Invalid horario'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Horario->save($this->request->data)) {
				$this->Session->setFlash(__('The horario has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The horario could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Horario->read(null, $id);
		}
		$users = $this->Horario->User->find('list');
		$empresas = $this->Horario->Empresa->find('list');
		$this->set(compact('users', 'empresas'));
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
		$this->Horario->id = $id;
		if (!$this->Horario->exists()) {
			throw new NotFoundException(__('Invalid horario'));
		}
		if ($this->Horario->delete()) {
			$this->Session->setFlash(__('Horario deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Horario was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
        
        public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow('');
            $this->verifica_login();

            //verificando caso de não ser administrador
            if($this->Session->read('perfil_atual') == 5){ //cliente
                $this->Session->setFlash(__('Acesso restrito'), 'alert_message', array('tipo_message' => 'alert-block'));
                $this->redirect('/users/info');
            }
            
            $this->set('menu_area', 'horarios');
        }
}
