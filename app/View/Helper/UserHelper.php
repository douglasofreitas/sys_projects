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
 * @property      UserHelper $User
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/form.html
 */
class UserHelper extends AppHelper {
        //Grupo DF - campo para armazenar chave_url da empresa

	public $helpers = array('Html', 'Form');
        
	public function __construct(View $View, $settings = array()) {
		parent::__construct($View, $settings);
		
	}
        
        /*
        * $usuarios: lista de usuários
        * $opcoes: array com as opções desejadas para a tabela
        *   ['model_completo']: true/false - se possui na lista o model User
        *   ['exibe_acao']: true/false - exibe a coluna de ações com o usuário
        *   ['remove_message']: text - texto para o link de remoção de usuário
        *   ['remove_link']: text - texto para o link de remoção de usuário
        */
        public function exibe_usuarios($usuarios, $opcoes = false){
            
                $html = '';

                if(count($usuarios) > 0){

                        if($opcoes['exibe_acao']) $coluna_codigo = '<th style="width: 51px;">Código</th>';
                        else $coluna_codigo = '';
                        if($opcoes['exibe_acao']) $coluna_acao = '<th style="width: 53px;text-align: center;">Ações</th>';
                        else $coluna_acao = '';


                        $html .= '<div class="control-group">
                                <table class="table table-bordered table-striped" style=";margin-left: 201px;width:auto">
                                    <thead>    
										<tr>
                                                '.$coluna_codigo.'
                                                <th>Nome</th>
                                                <th>E-mail</th>
                                                '.$coluna_acao.'
                                        </tr>
									</thead>
									<tbody>
                        ';

                        foreach($usuarios as $item){
                                if($opcoes['model_completo']) $user = $item['User'];
                                else $user = $item;

                                if($opcoes['exibe_acao'])
                                    $coluna_codigo_user = '<td>'.$user['codigo'].'</td>';
                                else $coluna_codigo_user = '';

                                if($opcoes['exibe_acao']) 
                                        $coluna_acao_user = '<td>'.$this->Html->link(
												'Remover',
												$opcoes['remove_link'].$user['codigo'],
												array('escape' => false, 'class' => 'btn btn-mini btn-danger')
											).'</td>';
                                else $coluna_acao_user = '';

                                $html .= '
                                        <tr>
                                                '.$coluna_codigo_user.'
                                                <td>'.$user['nome'].'</td>
                                                <td>'.$user['email'].'</td>
                                                '.$coluna_acao_user.'
                                        </tr>
                                ';

                                $html .= '';
                        }

                        $html .= '</tbody></table></div>';
                }else{
                        //não tem usuários para exibir
                }

                return $html;
        }
        
        
}