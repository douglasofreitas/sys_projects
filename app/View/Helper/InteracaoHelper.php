<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright   Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link        http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Helper
 * @since       CakePHP(tm) v 0.10.0.1076
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('ClassRegistry', 'Utility');
App::uses('AppHelper', 'View/Helper');
App::uses('Hash', 'Utility');

/**
 * Form helper library.
 *
 * Automatic generation of HTML FORMs from given data.
 *
 * @package       Cake.View.Helper
 * @property      InteracaoHelper $Interacao
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/form.html
 */
class InteracaoHelper extends AppHelper {
        //Grupo DF - campo para armazenar chave_url da empresa

	public $helpers = array('Html', 'Form');
        
	public function __construct(View $View, $settings = array()) {
		parent::__construct($View, $settings);
		
	}
        
        public function exibe_interacao($interacao, $select_chamadoStatus, $count, $perfil_atual = null){

                if($interacao['Interacao']['oculto'] & $perfil_atual == 5)
                    return null;

                $html = '';
                
                $message_status = '';
                if($interacao['Interacao']['status_chamado_atual'] != $interacao['Interacao']['status_chamado_novo']){
                    $message_status = '

                    <div class="control-group">
                        <label class="control-label" style="width: 155px;">Status</label>
                        <div class="controls">
                        <span style="color: black;font-weight: bold;padding-top: 10px;font-style: italic;display: block;">Mudança de status: '.$select_chamadoStatus[$interacao['Interacao']['status_chamado_atual']].
                        ' para '.$select_chamadoStatus[$interacao['Interacao']['status_chamado_novo']]."</span>
                        </div>
                    </div>";
                    ;
                }
                
                $anexo = '';
                if(count($interacao['InteracaoArquivo']) > 0){
                    $anexo_lista = '';
                    
                    foreach($interacao['InteracaoArquivo'] as $item){
                        $anexo_lista .= $this->Html->link(
							'<i class="icon-download-alt"></i>',
							'/arquivos/download/'.$item['arquivo'],
							array('escape' => false, 'class' => 'btn btn-inverse btn tip-bottom', 'title' => $item['nome'] )
						);	
                    }
                    
                    $anexo = '<div class="control-group">
                        <label class="control-label" style="width: 155px;">Arquivos</label><div class="controls">
                            '.$anexo_lista.'</div></div>';
                }
                
                $oculto = '';
                if($interacao['Interacao']['oculto']){
					$oculto .= $this->Html->link( 
								'<i class="icon icon-eye-close"></i>',
								'',
								array('escape' => false, 'class' => 'tip-bottom ', 'title' => 'Intaração oculta', 'style' => 'cursor: default;')
							);
                }

                $texto_descricao = '';
                if(!empty($interacao['Interacao']['descricao'])){
                    $texto_descricao .= '<div class="control-group"><label class="control-label" style="width: 155px;">Descrição</label>';
                    //$texto_descricao .= $this->Form->textarea('descricao', array('style' => 'width: 97%;min-height: 70px;height: auto', 'value' => $interacao['Interacao']['descricao'], 'disabled'));
                    $texto_descricao .= '<div class="controls"><div class="textarea_disable">'.  nl2br($interacao['Interacao']['descricao']).'</div></div>';
                    $texto_descricao .= '</div>';
                }

                $html .= '
                    <div class="control-group">
                        <label class="control-label" style="width: 155px;">Cód. Interação</label>
                        <div class="controls">
                        '.$this->Form->text('codigo', array('style' => 'width: 72px;', 'value' => $interacao['Interacao']['codigo'], 'disabled')).'
                        '.$oculto.' ('.date('d/m/Y H:i', strtotime($interacao['Interacao']['created'])).')
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" style="width: 155px;">Pessoa</label>
                        <div class="controls">
                        '.$this->Form->text('nome', array('style' => '', 'value' => $interacao['User']['nome'], 'disabled')).'
                        </div>
                    </div>
                    '.$message_status.'
                    '.$texto_descricao.'
                    '.$anexo.'
                ';

            //se for oculto, não é exibido para cliente


                return $html;
        }
        
        
        public function form_interacao($codigo_chamado, $select_chamadoStatus, $chamadoStatus_id, $associados = array(), $perfil_atual = null){

            if($perfil_atual != 5){
                $novo_status = '<tr>
                        <td style="vertical-align: top;">
                            <label class="control-label">Novo status</label>
                        </td>
                        <td class="form">
                            '.$this->Form->select('status_chamado_novo', $select_chamadoStatus,  array('empty' => false, 'value' => $chamadoStatus_id)).'
                        </td>
                    </tr>';
                $campo_oculto = '<tr>
                        <td style="vertical-align: top;">
                            <label class="control-label">Oculto</label>
                        </td>
                        <td>
							'.$this->Form->checkbox('oculto', array('hiddenField' => true, 'style' => '')).'
                        </td>
                    </tr>';
            }else{
                $campo_oculto = '';
                $novo_status = '<tr>
                        <td style="vertical-align: top;">
                            <label class="control-label">Concluir chamado?</label>
                        </td>
                        <td class="form">
                            '.$this->Form->checkbox('concluir_chamado', array('hiddenField' => true, 'style' => '')).'
                        </td>
                    </tr>';
            }
            
            $html = '<div class="control-group">
						<h3 class="control-label">Fazer interação</h3>
                                                
                <script type="text/javascript">
                    $(document).ready(function(){

                        $("#formulario_page_2").validate({
                        rules:{
                                    \'data[Interacao][descricao]\':{
                                            required:true
                                    }
                        },
                                messages: {
                                    \'data[Interacao][descricao]\':{
                                            required: "Campo obrigatório!"
                                    }
                            },
                        errorClass: "help-inline",
                        errorElement: "span",
                        highlight:function(element, errorClass, validClass) {
                            $(element).parents(\'.control-group\').addClass(\'error\');
                        },
                        unhighlight: function(element, errorClass, validClass) {
                            $(element).parents(\'.control-group\').removeClass(\'error\');
                            //$(element).parents(\'.control-group\').addClass(\'success\');
                        }
                    });
                    });
                </script>

					</div>
					<div class="control-group">
                '.$this->Form->create('Interacao', array('url' => '/interacaos/add', 'class' => 'form-horizontal', 'id'=>'formulario_page_2', 'type' => 'file', 'inputDefaults' => array('label' => false,'div' => false))).
                    $this->Form->hidden('codigo_chamado', array('value' => $codigo_chamado)).
                    $this->Form->hidden('status_chamado_atual', array('value' => $chamadoStatus_id)).'
				
                <table style="width:auto">
                    <tr>
                        <td style="width: 203px;vertical-align: top;">
                            <label class="control-label">Descrição</label>
                        </td>
                        <td>
                            '.$this->Form->textarea('descricao', array('style' => 'height:120px;width: 100%;')).'
                        </td>
                    </tr>
                    '.$novo_status.'
                    '.$campo_oculto.'
                    <tr>
                        <td style="vertical-align: top;">
                            <label class="control-label">Arquivo</label>
                        </td>
                        <td>
							<div class="uploader" id="uniform-undefined">
								<input type="file" name="data[Interacao][arquivo][]" size="19" style="opacity: 0; ">
								<span class="filename">No file selected</span>
								<span class="action">Choose File</span>
							</div>
                        </td>
                    </tr>';
            
            $lista_associados = '';
            if(count($associados) > 0){
                $lista_associados = '<table>';
                foreach($associados as $user){
                    $lista_associados .= '<tr><td>'.$this->Form->checkbox('Interacao.user.'.$user['User']['codigo'], array('hiddenField' => true, 'style' => 'width: 30px;')).' </td><td style="vertical-align: middle;">'.$user['User']['nome'].'</td></tr>';
                }
                $lista_associados .= '</table>';
                $html .= '
                    <tr>
                        <td style="vertical-align: top;">
                            <label class="control-label">Enviar e-mail</label>
                        </td>
                        <td >
                            '.$lista_associados.'
                        </td>
                    </tr>';
            }
            
            $html .= '</table>
					<div class="form-actions">
						<button type="submit" class="btn btn-primary">Salvar</button>
					</div>
				</form>
				</div>
                ';
            
            return $html;
        }
        
        
}