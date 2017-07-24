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
 * @property      FaturaHelper $Fatura
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/form.html
 */
class FaturaHelper extends AppHelper {
        //Grupo DF - campo para armazenar chave_url da empresa

	public $helpers = array('Html', 'Form');

	public function __construct(View $View, $settings = array()) {
		parent::__construct($View, $settings);
		
	}
        
        
        public function exibe_filtro(){
            //TODO grupodf - filtro de faturas
            return '';
        }
        public function exibe_lista($faturas){
            $html = '';
            
            if(count($faturas)){
                $html .= '<table class="table table-bordered table-striped">
                    <thead>
                            <tr>
                                    <th style="width: 15px">&nbsp;</th>
                                    <th style="width: 51px;">Código</th>
                                    <th>Nome</th>
                                    <th style="width: 118px;">Origem</th>
                                    <th style="width: 70px;">Vencimento</th>
                                    <th style="width: 70px">Status</th>
                                    <th style="width: 85px;">Valor</th>
                                    <th style="width: 60px;">Ações</th>
                            </tr>
                    </thead>
                    <tbody>';
                $mes_da_fatura_atual = '';
                $mes_da_fatura = '';
                foreach ($faturas as $fatura){

                    $mes_da_fatura_atual = date('F \o\f Y', strtotime($fatura['Fatura']['data_vencimento']));

                    if($mes_da_fatura_atual != $mes_da_fatura){
                        $html .= '<tr >
                                    <td colspan="8" class="destaque_linha">
                                        '.$mes_da_fatura_atual.'
                                    </td>
                                </tr>';
                        $mes_da_fatura = $mes_da_fatura_atual;
                    }

                    if(empty($mes_da_fatura)){
                        $mes_da_fatura = $mes_da_fatura_atual;
                    }

                    $status_icon = '';
                    if($fatura['Fatura']['tipo_fatura'])
                        $status_icon = '<span class="badge badge-success">E</span>';
                    else
                        $status_icon = '<span class="badge badge-important">S</span>';
                    
                    $status_pagamento = '';
                    if($fatura['Fatura']['fatura_status_id'] == 1)
                        $status_pagamento = '<span class="label label-important">Pendente</span>';
                    elseif($fatura['Fatura']['fatura_status_id'] == 2)
                        $status_pagamento = '<span class="label label-success">Pago</span>';
                    else
                        $status_pagamento = '<span class="label">Cancelado</span>';

                    //verificar origem da fatura
                    $origem = '';
                    if(!empty($fatura['Fatura']['fornecedor_id'])){
                        $origem = 'Fornecedor: '.$this->Html->link(
                            $fatura['Fornecedor']['codigo'],
                            '/fornecedors/view/'.$fatura['Fornecedor']['codigo'],
                            array('escape' => true, 'style' => 'font-weight: bold;')
                        );
                    }elseif(!empty($fatura['Fatura']['projeto_id'])){
                        $origem = 'Projeto: '.$this->Html->link(
                            $fatura['Projeto']['codigo'],
                            '/projetos/view/'.$fatura['Projeto']['codigo'],
                            array('escape' => true, 'style' => 'font-weight: bold;')
                        );
                    }elseif(!empty($fatura['Fatura']['pessoa_id'])){
                        $origem = 'Pessoa: '.$this->Html->link(
                            $fatura['Pessoa']['codigo'],
                            '/users/view/'.$fatura['Pessoa']['codigo'],
                            array('escape' => true, 'style' => 'font-weight: bold;')
                        );
                    }elseif(!empty($fatura['Fatura']['orcamento_id'])){
                        $origem = 'Orçamento: '.$this->Html->link(
                            $fatura['Orcamento']['codigo'],
                            '/orcamentos/view/'.$fatura['Orcamento']['codigo'],
                            array('escape' => true, 'style' => 'font-weight: bold;')
                        );
                    }

                    $data_vencimento = (!empty($fatura['Fatura']['data_vencimento']))?date('d/m/Y', strtotime($fatura['Fatura']['data_vencimento'])):'';

                    $html .= '<tr >
                                    <td>
                                            '.$status_icon.'
                                    </td>
                                    <td>
                                            '.$fatura['Fatura']['codigo'].'
                                    </td>
                                    <td>
                                            '.$this->Html->link(
                                                    $fatura['Fatura']['nome'],
                                                    '/faturas/view/'.$fatura['Fatura']['codigo'],
                                                    array('escape' => true, 'style' => 'font-weight: bold;')
                                            ).'
                                            
                                    </td>

                                    <td>
                                        '.$origem.'
                                    </td>

                                    <td>
                                        '.$data_vencimento.'
                                    </td>
                                    <td>
                                            '.$status_pagamento.'
                                    </td>
                                    <td>
                                            R$ '.number_format($fatura['Fatura']['valor'], 2, ',', '').'
                                    </td>
                                    <td style="text-align: center;">
                                            '.$this->Html->link(
                                                '<i class="icon-search"></i>',
                                                '/faturas/view/'.$fatura['Fatura']['codigo'],
                                                array('escape' => false, 'class' => 'tip-bottom ', 'title' => 'Visualizar')
                                            ).$this->Html->link(
                                                '<i class="icon-pencil"></i>',
                                                '/faturas/edit/'.$fatura['Fatura']['codigo'],
                                                array('escape' => false, 'class' => 'tip-bottom ', 'title' => 'Editar')
                                            ).'
                                    </td>
                            </tr>';
                            
                }
                $html .= '</tbody>
                    </table>';

            }else{
                    $html .= '<br/>Nenhum fatura encontrada<br/><br/>';
            }
            return $html;
        }
        
        
}
