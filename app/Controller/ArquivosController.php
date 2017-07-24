<?php
App::uses('AppController', 'Controller');
/**
 * Acessos Controller
 *
 * @property Acesso $Acesso
 */
class ArquivosController extends AppController {
        public $uses = array();

	public function download($arquivo) {
		$this->viewClass = 'Media';
                
                $extensao = substr(strrchr($arquivo, '.'), 1 );
                $name_file = str_replace($extensao, '', $arquivo);
                
                $params = array(
                    'id'        => $arquivo,
                    'name'      => $name_file,
                    
                    'extension' => $extensao,
                    'path'      => 'webroot/uploads'.DS.$this->empresa_core['Empresa']['chave_url'] . DS
                );
                $this->set($params);
	}

        public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow('');
            $this->verifica_login();
        }
}
