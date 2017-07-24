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
 * @property      ChamadoHelper $Chamado
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/form.html
 */
class ChamadoHelper extends AppHelper {
        //Grupo DF - campo para armazenar chave_url da empresa

	public $helpers = array('Html', 'Form');

	public function __construct(View $View, $settings = array()) {
		parent::__construct($View, $settings);
		
	}
        
        
        public function exibe_filtro($select_chamadoStatus, $select_chamadoPrioridade, $select_chamadoTipo, $select_projetos, $perfil_atual = null){
            
            if(!empty($_GET)){
                $filtro = $_GET;
                if(empty($filtro['busca']))
                    $filtro['busca'] = '';
                if(empty($filtro['codigo_projeto']))
                    $filtro['codigo_projeto'] = '';
                if(empty($filtro['chamado_status_id']))
                    $filtro['chamado_status_id'] = '';
                if(empty($filtro['chamado_tipo_id']))
                    $filtro['chamado_tipo_id'] = '';
                if(empty($filtro['chamado_prioridade_id']))
                    $filtro['chamado_prioridade_id'] = '';
                if(empty($filtro['projeto_pausa']))
                    $filtro['projeto_pausa'] = false;
            }else{
                if(!empty($_SESSION['Chamado']['filtro'])){
                    $filtro = $_SESSION['Chamado']['filtro'];
                    if(empty($filtro['busca']))
                        $filtro['busca'] = '';
                    if(empty($filtro['codigo_projeto']))
                        $filtro['codigo_projeto'] = '';
                    if(empty($filtro['chamado_status_id']))
                        $filtro['chamado_status_id'] = '';
                    if(empty($filtro['chamado_tipo_id']))
                        $filtro['chamado_tipo_id'] = '';
                    if(empty($filtro['chamado_prioridade_id']))
                        $filtro['chamado_prioridade_id'] = '';
                    if(empty($filtro['projeto_pausa']))
                        $filtro['projeto_pausa'] = false;
                }else{
                    $filtro = array();
                    $filtro['busca'] = '';
                    $filtro['codigo_projeto'] = '';
                    $filtro['chamado_status_id'] = '';
                    $filtro['chamado_tipo_id'] = '';
                    $filtro['chamado_prioridade_id'] = '';
                    $filtro['projeto_pausa'] = false;
                }
            }
            $html = '</div><div class="row-fluid" style="display:none" id="filtro_div">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon">
									<i class="icon-filter"></i>									
								</span>
								<h5>Filtro</h5>
							</div>
								<div class="widget-content nopadding">';
			
            
            $html .= $this->Form->create('Chamado', array('url' => '/chamados/index', 'class' => 'form-horizontal', 'id'=>'form_filtro', 'type' => 'get', 'inputDefaults' => array('label' => false,'div' => false)));
            
			
			$html .= '<div class="control-group">';
			$html .= '	<label class="control-label">Busca</label>';
			$html .= '	<div class="controls">';
			$html .=		$this->Form->input('busca', array('style' => 'width:300px', 'value' => $filtro['busca']));
			$html .= '	</div>';
			$html .= '</div>';
			
			$html .= '<div class="control-group">';
			$html .= ' <table><tr><td>';
			$html .= '	<label class="control-label">Projeto</label>';
			$html .= '	<div class="controls">';
			$html .=		$this->Form->select('codigo_projeto', $select_projetos,  array('empty' => 'TODOS', 'value' => $filtro['codigo_projeto']));
			$html .= '	</div>';
			$html .= ' </td><td>';
			$html .= '	<label class="control-label">Status</label>';
			$html .= '	<div class="controls">';
			$html .=		$this->Form->select('chamado_status_id', $select_chamadoStatus,  array('empty' => 'TODOS', 'value' => $filtro['chamado_status_id']));
			$html .= '	</div>';
			$html .= ' </td></tr></table>';
			$html .= '</div>';
			
			$html .= '<div class="control-group">';
			$html .= ' <table><tr><td>';
            $html .= '	<label class="control-label">Prioridade</label>';
            $html .= '	<div class="controls">';
            $html .=		$this->Form->select('chamado_prioridade_id', $select_chamadoPrioridade,  array('empty' => 'TODOS', 'value' => $filtro['chamado_prioridade_id']));
            $html .= '	</div>';
			$html .= ' </td><td>';
            if($perfil_atual == 2){
                $html .= '	<label class="control-label">Tipo</label>';
                $html .= '	<div class="controls">';
                $html .=		$this->Form->select('chamado_tipo_id', $select_chamadoTipo,  array('empty' => 'TODOS', 'value' => $filtro['chamado_tipo_id']));
                $html .= '	</div>';
            }
			$html .= ' </td></tr></table>';
			$html .= '</div>';

            if($perfil_atual == 2){
                $html .= '<div class="control-group">';
                $html .= ' <table><tr><td>';
                $html .= '	<label class="control-label">Projetos em pausa</label>';
                $html .= '	<div class="controls">';
                $html .=		$this->Form->checkbox('projeto_pausa',  array('value' => 1, 'checked' => $filtro['projeto_pausa']));
                $html .= '	</div>';
                $html .= ' </td><td>';
                $html .= ' </td></tr></table>';
                $html .= '</div>';
            }

            $html .= '<div class="form-actions">';
			$html .= '			<button type="submit" class="btn btn-primary">Filtrar</button>';
			$html .= '		</div>';
			$html .= '	</form>';

			$html .= '</div></div>
				</div></div><div class="row-fluid">';
            
            return $html;
        }
        public function exibe_lista($chamados, $perfil_atual = null){
            $html = '';
            
            if(count($chamados)){
                $html .= '<table class="table table-bordered table-striped">
                    <thead>
                            <tr>
                                    <th style="width: 47px">&nbsp;</th>
                                    <th style="width: 51px;">Código</th>
                                    <th>Título</th>
                                    <th style="width: 140px;">Status</th>
                                    <th style="width: 129px">Criação</th>
                                    <th style="width: 60px;text-align: center;">Ações</th>
                            </tr>
                    </thead>
                    <tbody>';

                foreach ($chamados as $chamado){
                    $oculto = '';
                    if($chamado['Chamado']['oculto']){
                        $oculto = 'oculto';
                    }
                    
                    $prioridade = '';
                    if($chamado['Chamado']['chamado_prioridade_id'] == 1){ //baixa
                        $prioridade = 'fundo_verde';
                    }elseif($chamado['Chamado']['chamado_prioridade_id'] == 3){ //alta
                        $prioridade = 'fundo_vermelho';
                    }

                    $acao_editar = '';
                    if($perfil_atual == 2 | $perfil_atual == 3){
                        $acao_editar = $this->Html->link(
                                '<i class="icon-pencil"></i>',
                                '/chamados/edit/'.$chamado['Chamado']['codigo'],
                                array('escape' => false, 'class' => 'tip-bottom ', 'title' => 'Editar')
                            );
                    }

                    
                    $titulo_atraso = '';
                    $link_atraso = '';
                    if($chamado['Chamado']['chamado_status_id'] == 1 || $chamado['Chamado']['chamado_status_id'] == 2){ 
                        if(!empty($chamado['Chamado']['data_finalizacao'])){
                            $tempo_atual = strtotime(date('Y-m-d'));
                            $tempo_chamado = strtotime($chamado['Chamado']['data_finalizacao']);
                            //echo $datetime1.'----'.$datetime2;
                            $interval = $tempo_chamado - $tempo_atual;
                            
                            //se o tempo for menor que 1 dia, destacar título
                            if($interval < 0){
                                $titulo_atraso = 'chamado_atrasado';
                                $link_atraso = $this->Html->link( 
                                                    '<i class="icon icon-warning-sign"></i>',
                                                    '',
                                                    array('escape' => false, 'class' => 'tip-bottom ', 'title' => 'Atrasado', 'style' => 'cursor: default;')
                                            );
                            }elseif($interval < 60*60*24*3){
                                //$titulo_atraso = 'chamado_prazo_curto';
                                $link_atraso = $this->Html->link( 
                                                    '<i class="icon icon-time"></i>',
                                                    '',
                                                    array('escape' => false, 'class' => 'tip-bottom ', 'title' => 'Prazo curto', 'style' => 'cursor: default;')
                                            );
                            }
                        }
                    }

                    $link_chamado_projeto = $this->Html->link(
                            $chamado['Projeto']['nome'],
                            '/chamados/index?codigo_projeto='.$chamado['Projeto']['codigo'],
                            array('class' => 'tip-right ', 'title' => 'Filtrar chamados', 'style' => 'font-size: inherit;')
                        );
                    //$link_chamado_projeto = $chamado['Projeto']['nome'];
                    
                    $html .= '<tr class="'.$oculto.' '.$prioridade.'">
                                    <td>
                                            '.$this->Html->link( 
                                                    '<i class="icon '.$chamado['ChamadoTipo']['img'].'"></i>',
                                                    '#',
                                                    array('escape' => false, 'class' => 'tip-bottom ', 'title' => $chamado['ChamadoTipo']['nome'], 'style' => 'cursor: default;')
                                            ).$link_atraso.'
                                    </td>
                                    <td>
                                            '.$chamado['Chamado']['codigo'].'
                                    </td>
                                    <td>
                                            '.$this->Html->link(
                                                    '<span class="'.$titulo_atraso.'">'.$chamado['Chamado']['nome'].'</span>',
                                                    '/chamados/view/'.$chamado['Chamado']['codigo'],
                                                    array('escape' => false, 'style' => 'font-weight: bold;')
                                            ).'<span class="legenda">('.$link_chamado_projeto.')</span>
                                            
                                    </td>

                                    <td>
                                        <span class="label '.$chamado['ChamadoStatus']['tag'].'">
                                        '.$chamado['ChamadoStatus']['nome'].'
                                        </span>
                                    </td>

                                    <td>'.date('d/m/Y', strtotime($chamado['Chamado']['created'])).'</td>
                                    <td style="text-align: center;">
                                        '.$this->Html->link( 
                                                    '<i class="icon-search"></i>',
                                                    '/chamados/view/'.$chamado['Chamado']['codigo'],
                                                    array('escape' => false, 'class' => 'tip-bottom ', 'title' => 'Visualizar')
                                            ).$acao_editar.'
                                    </td>
                            </tr>';
                            
                }
                $html .= '</tbody>
                    </table>';

            }else{
                    $html .= '<br/>Não há chamados em desenvolvimento<br/><br/>';
            }
            return $html;
        }
        
        
}
