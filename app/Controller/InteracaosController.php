<?php
App::uses('AppController', 'Controller');
/**
 * Interacaos Controller
 *
 * @property Interacao $Interacao
 */
class InteracaosController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Interacao->recursive = 0;
        $this->set('interacaos', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Interacao->id = $id;
        if (!$this->Interacao->exists()) {
            throw new NotFoundException(__('Invalid interacao'));
        }
        $this->set('interacao', $this->Interacao->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Interacao->create();

            //cliente: não pode definir o novo status, somente marcar se esta fechado ou não
            if($this->Session->read('perfil_atual') == 5){
                if($this->request->data['Interacao']['concluir_chamado'] == 1)
                    $this->request->data['Interacao']['status_chamado_novo'] = 4;
                else
                    $this->request->data['Interacao']['status_chamado_novo'] = 1;
            }

            if ($this->Interacao->save($this->request->data)) {
                $interacao_id = $this->Interacao->getInsertID();

                //grava arquivos da interação
                $count = 0;
                foreach ($this->request->data['Interacao']['arquivo'] as $arquivo){
                    //print_r($arquivo);
                    //die();
                    if(!empty($arquivo)) {
                        if($arquivo['error'] == 0){
                            $extensao = substr(strrchr($arquivo['name'], '.'), 1 );
                            $datetime = date('YmdHms');
                            $nome_arquivo = 'interacao_'.$interacao_id.'_'.$datetime.$count.'.'.$extensao;
                            $result = $this->uploadFiles('uploads', array($arquivo), $this->empresa_core['Empresa']['chave_url'], array($nome_arquivo));

                            //gravar dados do arquivo no banco
                            if(!empty($result['urls'])){
                                $data_arquivo = array();
                                $data_arquivo['InteracaoArquivo']['interacao_id'] = $interacao_id;
                                $data_arquivo['InteracaoArquivo']['nome'] = $arquivo['name'];
                                $data_arquivo['InteracaoArquivo']['arquivo'] = $nome_arquivo;
                                $this->Interacao->InteracaoArquivo->create();
                                $this->Interacao->InteracaoArquivo->save($data_arquivo);
                                $count++;
                            }
                        }
                    }
                }


                if(!empty($this->request->data['Interacao']['user']) > 0){
                    foreach($this->request->data['Interacao']['user'] as $codigo_user => $value ){
                        if($value){
                            //TODO grupodf: envio de e-mail sobre interação
                            //$array_mesclagem = array();
                            //$this->envia_email($to_name, $to_email, $assunto, 'interacao_chamado', $array_mesclagem);
                        }
                    }
                }

                //atualizar data de modificação do chamado
                $this->Interacao->Chamado->updateModified($this->request->data['Interacao']['codigo_chamado']);

                $this->Session->setFlash(__('Interação salva'), 'alert_message', array('tipo_message' => 'alert-success'));
                $this->redirect('/chamados/view/'.$this->request->data['Interacao']['codigo_chamado']);
            } else {
                $this->Session->setFlash(__('Interação não foi salva. Tente novamente'), 'alert_message', array('tipo_message' => 'alert-error'));
                $this->redirect('/chamados/view/'.$this->request->data['Interacao']['codigo_chamado']);
            }
        }else{
            $this->Session->setFlash(__('Erro ao realizar a ação. Tente novamente'), 'alert_message', array('tipo_message' => 'alert-error'));
            $this->redirect('/chamados/index/');
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
        $this->Interacao->id = $id;
        if (!$this->Interacao->exists()) {
            throw new NotFoundException(__('Invalid interacao'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Interacao->save($this->request->data)) {
                $this->Session->setFlash(__('Interação salva'), 'alert_message', array('tipo_message' => 'alert-success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Interação não foi salva. Tente novamente'), 'alert_message', array('tipo_message' => 'alert-error'));
            }
        } else {
            $this->request->data = $this->Interacao->read(null, $id);
        }
        $chamados = $this->Interacao->Chamado->find('list');
        $users = $this->Interacao->User->find('list');
        $this->set(compact('chamados', 'users'));
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
        $this->Interacao->id = $id;
        if (!$this->Interacao->exists()) {
            throw new NotFoundException(__('Invalid interacao'));
        }
        if ($this->Interacao->delete()) {
            $this->Session->setFlash(__('Interação removida'), 'alert_message', array('tipo_message' => 'alert-success'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Interação não pode ser removida'), 'alert_message', array('tipo_message' => 'alert-error'));
        $this->redirect(array('action' => 'index'));
    }

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('');
        $this->verifica_login();

        $this->set('menu_area', 'chamados');
    }
}
