<?php
App::uses('AppController', 'Controller');
/**
 * Horarios Controller
 *
 * @property Horario $Horario
 */
class RelatoriosController extends AppController {
	public $uses = array();
/**
 * index method
 *
 * @return void
 */
        public function index() {
            $this->set('titulo_page', 'Relatórios');

            //verificando caso de não ser administrador
            if($this->Session->read('perfil_atual') == 5){ //cliente
                $this->Session->setFlash(__('Acesso restrito'), 'alert_message', array('tipo_message' => 'alert-block'));
                $this->redirect('/users/info');
            }
        }
        
        public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow('');
            $this->verifica_login();
            
            $this->set('menu_area', 'relatorios');
        }
}
