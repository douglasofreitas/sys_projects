<?php
App::uses('AppController', 'Controller');
/**
 * Orcamentos Controller
 *
 * @property Orcamento $Orcamento
 */
class OrcamentosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->set('titulo_page', 'Orçamentos');
		$this->Orcamento->recursive = 0;

        //verificando caso de não ser administrador
        if($this->Session->read('perfil_atual') != 2){
            //selecionar apenas os projetos associados aos usuários
            $conditions['Projeto.id'] = $this->Chamado->Projeto->getProjetosAssociados($this->Auth->user('id'));
        }

        $conditions['Orcamento.empresa_id'] = $this->empresa_core['Empresa']['id'];
                
		$this->set('orcamentos', $this->paginate('Orcamento', $conditions));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($codigo = null) {
		$id = $this->Orcamento->getIdByCodigo($codigo);

        //acesso de usuários
        if($this->Session->read('perfil_atual') != 2){
            //verificar se esta associado com o projeto
            if(!$this->Orcamento->isOrcamentoAssociado($id, $this->Auth->user('id'))){
                $this->Session->setFlash(__('Acesso restrito'), 'alert_message', array('tipo_message' => 'alert-block'));
                $this->redirect('/users/info');
            }
        }

		$this->set('titulo_page', 'Visualizar Orçamento');
		$this->Orcamento->id = $id;
		if (!$this->Orcamento->exists()) {
			throw new NotFoundException(__('Invalid orcamento'));
		}

		$this->set('orcamento', $this->Orcamento->find('first', array('conditions' => array('Orcamento.id' => $id), 'recursive' => 1)));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {

        //acesso de usuários
        if($this->Session->read('perfil_atual') != 2){
            //verificar se esta associado com o projeto
            $this->Session->setFlash(__('Acesso restrito'), 'alert_message', array('tipo_message' => 'alert-block'));
            $this->redirect('/users/info');
        }

		$this->set('titulo_page', 'Cadastrar Orçamento');
		if ($this->request->is('post')) {
			$this->Orcamento->create();
			if ($this->Orcamento->save($this->request->data)) {
                            $orcamento_id = $this->Orcamento->getInsertID();
                            
                            //salvar os itens do orçamento
                            if(count($this->request->data['Orcamento']['item']) > 0){
                                foreach($this->request->data['Orcamento']['item'] as $item){
                                    $item_orcamento = array();
                                    $item_orcamento['OrcamentoItem']['orcamento_id'] = $orcamento_id;
                                    $item_orcamento['OrcamentoItem']['nome'] = $item['nome'];
                                    $item_orcamento['OrcamentoItem']['descricao'] = $item['descricao'];
                                    $item_orcamento['OrcamentoItem']['quantidade'] = $item['quantidade'];
                                    $item_orcamento['OrcamentoItem']['valor_form'] = $item['valor'];
                                    $this->Orcamento->OrcamentoItem->create();
                                    $this->Orcamento->OrcamentoItem->save($item_orcamento);
                                }
                                
                                //atualizar valor total do orçamento
                                $this->Orcamento->atualizaTotal($orcamento_id);
                            }

                            $this->Session->setFlash(__('Orçamento salvo'), 'alert_message', array('tipo_message' => 'alert-success'));
                            $this->redirect('/orcamentos/index');
			} else {
                            $this->Session->setFlash(__('Erro ao salvar o orçamento. Tente novamente'), 'alert_message', array('tipo_message' => 'alert-error'));
			}
		}
		$action = 'add';
                $this->set('action', $action);
                $this->render('orcamento');
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($codigo = null) {
		$id = $this->Orcamento->getIdByCodigo($codigo);

        //acesso de usuários
        if($this->Session->read('perfil_atual') != 2){
            //verificar se esta associado com o projeto
            $this->Session->setFlash(__('Acesso restrito'), 'alert_message', array('tipo_message' => 'alert-block'));
            $this->redirect('/users/info');
        }

		$this->set('titulo_page', 'Editar Orçamento');
		$this->Orcamento->id = $id;
		if (!$this->Orcamento->exists()) {
			throw new NotFoundException(__('Invalid orcamento'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Orcamento->save($this->request->data)) {
                            
                            //verifica os itens editados
                            if(count($this->request->data['Orcamento']['item']) > 0){
                                foreach($this->request->data['Orcamento']['item'] as $item){
                                    $item_orcamento = array();
                                    $item_orcamento['OrcamentoItem']['orcamento_id'] = $this->request->data['Orcamento']['id'];
                                    $item_orcamento['OrcamentoItem']['nome'] = $item['nome'];
                                    $item_orcamento['OrcamentoItem']['descricao'] = $item['descricao'];
                                    $item_orcamento['OrcamentoItem']['quantidade'] = $item['quantidade'];
                                    $item_orcamento['OrcamentoItem']['valor_form'] = $item['valor'];
                                    if(!empty($item['id']))
                                        $item_orcamento['OrcamentoItem']['id'] = $item['id'];
                                    $this->Orcamento->OrcamentoItem->create();
                                    $this->Orcamento->OrcamentoItem->save($item_orcamento);
                                }
                                
                                //atualizar valor total do orçamento
                                $this->Orcamento->atualizaTotal($this->request->data['Orcamento']['id']);
                            }
                            
                            $this->Session->setFlash(__('Orçamento salvo'), 'alert_message', array('tipo_message' => 'alert-success'));
                            $this->redirect('/orcamentos/index');
			} else {
                            $this->Session->setFlash(__('Erro ao salvar o orçamento. Tente novamente'), 'alert_message', array('tipo_message' => 'alert-error'));
			}
		} else {
			$this->request->data = $this->Orcamento->find('first', array('conditions' => array('Orcamento.id' => $id), 'recursive' => 2));
		}
		$action = 'edit/'.$codigo;
                $this->set('action', $action);
                $this->render('orcamento');
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($codigo = null) {
		$id = $this->Orcamento->getIdByCodigo($codigo);

        //acesso de usuários
        if($this->Session->read('perfil_atual') != 2){
            //verificar se esta associado com o projeto
            $this->Session->setFlash(__('Acesso restrito'), 'alert_message', array('tipo_message' => 'alert-block'));
            $this->redirect('/users/info');
        }

		$this->Orcamento->id = $id;
		if (!$this->Orcamento->exists()) {
			throw new NotFoundException(__('Invalid orcamento'));
		}
		if ($this->Orcamento->delete()) {
			$this->Session->setFlash(__('Orçamento removido'), 'alert_message', array('tipo_message' => 'alert-success'));
			$this->redirect('/orcamentos/index');
		}
		$this->Session->setFlash(__('Orçamento não pode ser removido por ter vínculos com outras partes do sistema'), 'alert_message', array('tipo_message' => 'alert-error'));
		$this->redirect('/orcamentos/index');
	}
        
    public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('');
		$this->verifica_login();

        if($this->Session->read('perfil_atual') == 4){ // Desenvolvedor
            $this->Session->setFlash(__('Acesso restrito'), 'alert_message', array('tipo_message' => 'alert-block'));
            $this->redirect('/users/info');
        }

		//filtro
		$select_orcamentoStatus = $this->Orcamento->OrcamentoStatus->getFormSelect();
		$this->set(compact('select_orcamentoStatus'));
		
		$this->set('menu_area', 'orcamentos');
	}
	
	public function ajax_associar(){
		$this->layout = null;
		$this->set('model', $_GET['model']);
		$this->set('controller', $_GET['controller']);
		$this->set('id_item', $_GET['id_item']);
		
		//obter orçamentos não associados
		$lista_orcamentos = $this->Orcamento->getListaOrcamento('nao_associados');
		$this->set('orcamentos', $lista_orcamentos);
		$this->render('ajax_associar');
	}
        
        public function ajax_select(){
            $this->layout = null;
            
            $lista_orcamentos = $this->Orcamento->getListaOrcamentos();
            $this->set('orcamentos', $lista_orcamentos);
        }
        
        public function atualiza_valor($codigo = null){
            $this->Orcamento->atualiza_valor($codigo);
            $this->redirect('/orcamentos/index');
        }
}
