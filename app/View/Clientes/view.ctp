<div class="span12">
		<div class="widget-box">
			<div class="widget-title">
				<span class="icon">
					<i class="icon-search"></i>									
				</span>
				<h5>Cliente - Código <?php echo $cliente['Cliente']['codigo']; ?></h5>
				
				<div class="buttons">
					
					<?php
                    if($perfil_atual == 2 | $perfil_atual == 3)
					echo $this->Html->link(
						'<i class="icon-pencil"></i>',
						'/clientes/edit/'.$cliente['Cliente']['codigo'],
						array('escape' => false, 'class' => 'btn btn-mini tip-bottom', 'title' => 'Editar', 'style' => '')
					);
					
					?>
					
				</div>
				
				
			</div>
			<div class="widget-content nopadding">
				<?php
				echo $this->Form->create('Cliente', array('url' => '/clientes/', 'class' => 'form-horizontal', 'id'=>'formulario_page', 'inputDefaults' => array('label' => false,'div' => false)));
				echo $this->Form->hidden('1');
				?>
					<div class="control-group">
						<label class="control-label">Nome</label>
						<div class="controls">
							<?php echo $this->Form->input('2', array('style' => '', 'value' => $cliente['Cliente']['nome'], 'disabled')); ?>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">Descrição</label>
						<div class="controls">
							<?php echo $this->Form->textarea('23', array('style' => 'height: 100px;', 'value' => $cliente['Cliente']['descricao'], 'disabled')); ?>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">Observação</label>
						<div class="controls">
							<?php echo $this->Form->textarea('54', array('style' => 'height: 100px;', 'value' => $cliente['Cliente']['observacao'], 'disabled')); ?>
							
						</div>
					</div>
					
					<div class="control-group">
						<h3 class="control-label">Pessoas associadas </h3>
						
						<?php				
						//exibir link para associar um nova pessoa
						if($perfil_atual == 2){
							?>
							<div class="controls" style="padding-top: 29px;">
								<button class="btn empty" onclick="return false;"><?php echo $this->Html->link('Associar pessoa', '#associarPessoa', array('class' => 'link_full', 'data-toggle' => 'modal')); ?></button>							
							</div>
							<?php
						}
						?>
					</div>
					
					<?php
					//listar pessoas associadas ao cliente
					$opcoes = array(
						'model_completo' => true, 
						'exibe_acao' => false,
						'remove_message' => 'Remover associação', 
						'remove_link' => '/clientes/remove_user/'.$cliente['Cliente']['codigo'].'/');

					if(count($associados) > 0){
						echo $this->User->exibe_usuarios($associados, $opcoes);
					}else{
						echo '<div class="control-group">
									Não há pessoas associadas
								</div>';
					}
					?>

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

                    // ajax   
                    $.ajax({   
                        type: "GET",   
                        url: <?php echo "'" . $this->Html->url('/', true).$_SESSION['Empresa']['chave_url']. '/users/ajax_associar' . "'"; ?>, 
                        data: "model=Cliente&controller=clientes&id_item=<?php echo $cliente['Cliente']['codigo'] ?>",   
                        success: function(msg){   
                            $('#associar_pessoa_box').html(msg);
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
