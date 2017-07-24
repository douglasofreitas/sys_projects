
<div class="span12">
		<div class="widget-box">
			<div class="widget-title">
				<span class="icon">
					<i class="icon-search"></i>									
				</span>
				<h5>Projeto - Código <?php echo $projeto['Projeto']['codigo']; ?></h5>
				
				<div class="buttons">
					
					<?php
                    if( $perfil_atual == 2 | $perfil_atual == 3)
					echo $this->Html->link(
						'<i class="icon-pencil"></i>',
						'/projetos/edit/'.$projeto['Projeto']['codigo'],
						array('escape' => false, 'class' => 'btn btn-mini tip-bottom', 'title' => 'Editar', 'style' => '')
					);
					
					?>
					
				</div>
				
				
			</div>
			<div class="widget-content nopadding">
				<?php
				echo $this->Form->create('Projeto', array('url' => '/projetos/', 'class' => 'form-horizontal', 'id'=>'formulario_page_2', 'type' => 'file', 'inputDefaults' => array('label' => false,'div' => false)));
				echo $this->Form->hidden('1');
				?>
					<div class="control-group">
						<label class="control-label">Nome</label>
						<div class="controls">
							<?php echo $this->Form->input('2', array('style' => '', 'value' => $projeto['Projeto']['nome'], 'disabled')); ?>
						</div>
					</div>
					<div class="control-group">
                        <label class="control-label">Cliente</label>
                        <div class="controls">

                            <?php echo $this->Form->input('123',  array('empty' => false, 'value' => $projeto['Cliente']['nome'], 'disabled'));	 ?>
                        </div>
                    </div>
                <div class="control-group">
                    <label class="control-label">Status</label>
                    <div class="controls">
                        <?php echo $this->Form->select('898', $select_projetoStatuses,  array('empty' => false, 'value' => $projeto['ProjetoStatus']['id'], 'disabled'));	 ?>
                    </div>
                </div>
					
					<div class="control-group">
						<label class="control-label">Descrição</label>
						<div class="controls">
							<?php echo $this->Form->textarea('23', array('style' => 'height: 100px;', 'value' => $projeto['Projeto']['descricao'], 'disabled')); ?>
						</div>
					</div>

                    <?php if( $perfil_atual == 2 | $perfil_atual == 3 | $perfil_atual == 4): ?>

					<div class="control-group">
						<label class="control-label">Dados de conexão</label>
						<div class="controls">
							<?php echo $this->Form->textarea('23', array('style' => 'height: 100px;', 'value' => $projeto['Projeto']['dados_conexao'], 'disabled')); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Observação</label>
						<div class="controls">
							<?php echo $this->Form->textarea('54', array('style' => 'height: 100px;', 'value' => $projeto['Projeto']['observacao'], 'disabled')); ?>
						</div>
					</div>

                    <?php endif; ?>
					
					<div class="control-group">
                        <label class="control-label">Data de início</label>
                        <div class="controls" style="margin-left: 17px;">

                            <?php echo $this->Form->text('5', array('value' => (!empty($projeto['Projeto']['data_inicio_desenvolvimento']))?date('d/m/Y', strtotime($projeto['Projeto']['data_inicio_desenvolvimento'])):'', 'disabled'));	 ?>
                        </div>
                    </div>

                        <div class="control-group">
                            <label class="control-label">Data de término</label>
                            <div class="controls" style="margin-left: 17px;">
                                <?php echo $this->Form->text('5', array('value' => (!empty($projeto['Projeto']['data_fim_desenvolvimento']))?date('d/m/Y', strtotime($projeto['Projeto']['data_fim_desenvolvimento'])):'', 'disabled'));	 ?>
                            </div>
                        </div>
					
					
					<?php if($perfil_atual != 5 ): ?>
					
					<div class="control-group">
						<h3 class="control-label">Pessoas </h3>
						
						<div class="controls" style="padding-top: 29px;">
							<?php
                            if( $perfil_atual == 2 | $perfil_atual == 3){
							?>
								<button class="btn empty" onclick="return false;"><?php echo $this->Html->link('Associar pessoa', '#associarPessoa', array('class' => 'link_full', 'data-toggle' => 'modal')); ?></button>							
							<?php
							}
							?>
						</div>
					</div>

					<?php
					//listar pessoas associadas ao projeto
                    if( $perfil_atual == 2 | $perfil_atual == 3)
                        $opcoes = array(
                            'model_completo' => true,
                            'exibe_acao' => true,
                            'remove_message' => 'Remover associação',
                            'remove_link' => '/projetos/remove_user/'.$projeto['Projeto']['codigo'].'/');

                    else
                        $opcoes = array(
                            'model_completo' => true,
                            'exibe_acao' => false,
                            'remove_message' => 'Remover associação',
                            'remove_link' => '/projetos/remove_user/'.$projeto['Projeto']['codigo'].'/');

					if(count($associados) > 0){
						echo $this->User->exibe_usuarios($associados, $opcoes);
					}else{
						echo '<div class="control-group" style="margin-left: 201px;text-align: left;">
								<label class="control-label">Não há pessoas associadas</label>
							</div>';
					}

					?>

                    <?php endif; ?>


                    <?php if($perfil_atual != 4 ): ?>

					<div class="control-group">
						<h3 class="control-label">Orçamentos </h3>
						
						<div class="controls" style="padding-top: 29px;">
							<?php
							if($perfil_atual == 2){
							?>
								<button class="btn empty" onclick="return false;"><?php echo $this->Html->link('Associar orçamento', '#associarOrcamento', array( 'class' => 'link_full', 'data-toggle' => 'modal')); ?></button>							
							<?php
							}
							?>
						</div>
					</div>
					
					
					<?php
					//listar orçamentos associadas ao projeto

                    if( $perfil_atual == 2 )
                        $opcoes = array(
                            'model_completo' => true,
                            'exibe_acao' => true,
                            'remove_message' => 'Remover associação',
                            'remove_link' => '/projetos/remove_orcamento/'.$projeto['Projeto']['codigo'].'/');

                    else
                        $opcoes = array(
                            'model_completo' => true,
                            'exibe_acao' => false,
                            'remove_message' => 'Remover associação',
                            'remove_link' => '/projetos/remove_orcamento/'.$projeto['Projeto']['codigo'].'/');

					if(count($orcamentos) > 0){
						echo $this->Orcamento->exibe_orcamentos($orcamentos, $opcoes);
					}else{
						echo '<div class="control-group" style="margin-left: 201px;text-align: left;">
								<label class="control-label">Não há orçamentos associados</label>
							</div>';
					}

					?>

                    <?php endif; ?>

				</form>
					
					
			</div>
		</div>			
</div>
<script type="text/javascript">
	$(function() {
            $('#associar_pessoa').click(function()
                {   
                    $('#associar_pessoa_box').show('fast');
                    $('#associar_pessoa_box').html('<label>' + <?php echo "'" . $this->Html->image('ajax-loader.gif') . "'" ?> + '</label>');
                    
                    var busca_nome = $('#busca_nome_pessoa').val();
                    // ajax   
                    $.ajax({   
                        type: "GET",   
                        url: <?php echo "'" . $this->Html->url('/', true).$_SESSION['Empresa']['chave_url']. '/users/ajax_associar' . "'"; ?>, 
                        data: "model=Projeto&controller=projetos&id_item=<?php echo $projeto['Projeto']['codigo'] ?>&busca="+busca_nome,   
                        success: function(msg){  
                            $('#associar_pessoa_box').html(msg);
                        }
                    });
                    
                    return false;
                }
            );
	    $('#associar_orcamento').click(function()
                {   
                    $('#associar_orcamento_box').show('fast');
                    $('#associar_orcamento_box').html('<label>' + <?php echo "'" . $this->Html->image('ajax-loader.gif') . "'" ?> + '</label>');

                    // ajax   
                    $.ajax({   
                        type: "GET",   
                        url: <?php echo "'" . $this->Html->url('/', true).$_SESSION['Empresa']['chave_url']. '/orcamentos/ajax_associar' . "'"; ?>, 
                        data: "model=Projeto&controller=projetos&id_item=<?php echo $projeto['Projeto']['codigo'] ?>",   
                        success: function(msg){   

                            $('#associar_orcamento_box').html(msg);
                        }
                    });
                    
                    return false;
                }
            );
	});
</script>


<!-- Modal - Associar pessoa -->
<div id="associarPessoa" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Associar pessoa</h3>
  </div>
  <div class="modal-body">  
      <form class="form-horizontal">
        Digite o nome para buscar no sistema<br/>
        <input type="text" id="busca_nome_pessoa" name="busca_nome_pessoa" style="width: 150px" />
        <button id="associar_pessoa" class="btn btn-primary" onclick="return false;">
                Buscar
        </button>
    
        <br/>
        <br/>
        <div id="associar_pessoa_box"></div>
        <br/>
      </form>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
  </div>
</div>

<!-- Modal - Associar orçamento -->
<div id="associarOrcamento" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Associar orçamento</h3>
  </div>
  <div class="modal-body">  
      <form class="form-horizontal">
        Digite o nome para buscar no sistema<br/>
        <input type="text" id="busca_nome_orcamento" name="busca_nome_orcamento" style="width: 150px" />
        <button id="associar_orcamento" class="btn btn-primary" onclick="return false;">
                Buscar
        </button>
    
        <br/>
        <br/>
        <div id="associar_orcamento_box"></div>
        <br/>
      </form>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
  </div>
</div>
