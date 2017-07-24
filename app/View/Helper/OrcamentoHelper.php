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
 * @property      OrcamentoHelper $Orcamento
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/form.html
 */
class OrcamentoHelper extends AppHelper {
        //Grupo DF - campo para armazenar chave_url da empresa

	public $helpers = array('Html', 'Form');
        
	public function __construct(View $View, $settings = array()) {
		parent::__construct($View, $settings);
		
	}
        
        /*
        * $orcamentos: lista de orcamentos
        * $opcoes: array com as opções desejadas para a tabela
        *   ['model_completo']: true/false - se possui na lista o model Orcamento
        *   ['exibe_acao']: true/false - exibe a coluna de ações com o orçamento
        *   ['remove_message']: text - texto para o link de remoção de orçamento
        *   ['remove_link']: text - texto para o link de remoção de orçamento
        */
        public function exibe_orcamentos($orcamentos, $opcoes = false){
            
                $html = '';

                if(count($orcamentos) > 0){

                        if($opcoes['exibe_acao']) $coluna_acao = '<th style="width: 53px;text-align: center;">Ações</th>';
                        else $coluna_acao = '';

                        $html .= '<div class="control-group">
                                <table class="table table-bordered table-striped" style="margin-left: 201px;width: auto;">
                                    <thead>
                                        <tr>
                                                <th style="width: 51px;">Código</th>
                                                <th>Nome</th>
                                                <th>Valor</th>
                                                '.$coluna_acao.'
                                        </tr>
									</thead>
									<tbody>
                        ';

                        foreach($orcamentos as $item){
                                if($opcoes['model_completo']) $orcamento = $item['Orcamento'];
                                else $orcamento = $item;

                                if($opcoes['exibe_acao']) 
                                        $coluna_acao_user = '<td>'.$this->Html->link(
												'Remover',
												$opcoes['remove_link'].$orcamento['codigo'],
												array('escape' => false, 'class' => 'btn btn-mini btn-danger')
											).'</td>';
                                else $coluna_acao_user = '';

                                $html .= '
                                        <tr>
                                                <td>'.$orcamento['codigo'].'</td>
                                                <td>'.$this->Html->link(
                                                        $orcamento['nome'],
                                                        '/orcamentos/view/'.$orcamento['codigo'],
                                                        array('escape' => false, 'class' => 'destaque tip-bottom', 'title' => 'Visualizar Orçamento')
                                                    ).'</td>
                                                <td>R$ '.$orcamento['valor'].'</td>
                                                '.$coluna_acao_user.'
                                        </tr>
                                ';

                                $html .= '';
                        }

                        $html .= '</tbody></table></div>';
                }else{
                        //não tem orçamentos para exibir
                }

                return $html;
        }
        
        public function verificaFatura($orcamento) {
            $html = '';
            
//            echo '<pre>';
//            print_r($orcamento);
//            echo '</pre>';
            
            // VERIFICAR SE TODAS AS FATURAS DO ORCAMENTO FORAM GERADAS
            if($orcamento['Orcamento']['orcamento_status_id'] == 3) {
                //Orçamento aprovado
                
                $valor_faturas = 0;
                if(!empty($orcamento['Conta'])){
                    foreach($orcamento['Conta'] as $conta){
                        if($conta['conta_status_id'] != 3){
                            $valor_faturas += $conta['valor'];
                        }
                    }
                }
                
                if($valor_faturas < $orcamento['Orcamento']['valor']){
                    //criar mensagem de alerta
                    
                    $html .= '<div class="row-fluid">
                            <div class="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>Faturas:</strong> Ainda não foram geradas todas as faturas deste orçamento
                            </div>
                        </div>';
                }
            }
            
            return $html;
        }
        
}