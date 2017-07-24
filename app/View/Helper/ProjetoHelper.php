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
 * @property      ProjetoHelper $Projeto
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/form.html
 */
class ProjetoHelper extends AppHelper {
        //Grupo DF - campo para armazenar chave_url da empresa

	public $helpers = array('Html', 'Form');

	public function __construct(View $View, $settings = array()) {
		parent::__construct($View, $settings);
		
	}
        
        public function exibe_filtro($select_clientes, $select_projetoStatuses){
            
            if(!empty($_GET)){
                $filtro = $_GET;
            }else{
                $filtro = array();
                $filtro['busca'] = '';
                $filtro['cliente_id'] = '';
                $filtro['projeto_status_id'] = '';
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
            $html .= $this->Form->create('Projeto', array('url' => '/projetos/index', 'class' => 'form-horizontal', 'id'=>'formulario_page', 'type' => 'get', 'inputDefaults' => array('label' => false,'div' => false)));
            
			$html .= '<div class="control-group">';
			$html .= '	<label class="control-label">Busca</label>';
			$html .= '	<div class="controls">';
			$html .=		$this->Form->input('busca', array('style' => 'width:300px', 'value' => $filtro['busca']));
			$html .= '	</div>';
			$html .= '</div>';
			
			
			$html .= '<div class="control-group">';
			$html .= ' <table><tr><td>';
			$html .= '	<label class="control-label">Cliente</label>';
			$html .= '	<div class="controls">';
			$html .=		$this->Form->select('cliente_id', $select_clientes,  array('empty' => false, 'value' => $filtro['cliente_id'] ));
			$html .= '	</div>';
			$html .= ' </td><td>';
			$html .= '	<label class="control-label">Status</label>';
			$html .= '	<div class="controls">';
			$html .=		$this->Form->select('projeto_status_id', $select_projetoStatuses,  array('empty' => 'TODOS', 'value' => $filtro['projeto_status_id']));
			$html .= '	</div>';
			$html .= ' </td></tr></table>';
			$html .= '</div>';
			
            $html .= '<div class="form-actions">';
			$html .= '			<button type="submit" class="btn btn-primary">Filtrar</button>';
			$html .= '		</div>';
			$html .= '	</form>';

			$html .= '</div></div>
				</div></div><div class="row-fluid">';
            
            return $html;
        }
        
}
