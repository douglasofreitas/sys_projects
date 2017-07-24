<?php
if($perfil_atual != 5)
    echo $this->Orcamento->verificaFatura($orcamento);
?>
<div class="row-fluid">
    <div class="span12">
		<div class="widget-box">
			<div class="widget-title">
				<span class="icon">
					<i class="icon-search"></i>									
				</span>
				<h5>Orçamento</h5>
				
				<div class="buttons">
					<?php
                    if($perfil_atual != 4)
                    echo $this->Html->link(
						'<i class="icon-money"></i>',
						'/faturas/orcamento/'.$orcamento['Orcamento']['codigo'],
						array('escape' => false, 'class' => 'btn btn-mini tip-bottom', 'title' => 'Faturas', 'style' => '')
					);
                    if($perfil_atual == 2 | $perfil_atual == 3){
                        echo $this->Html->link(
                            '<i class="icon-pencil"></i>',
                            '/orcamentos/edit/'.$orcamento['Orcamento']['codigo'],
                            array('escape' => false, 'class' => 'btn btn-mini tip-bottom', 'title' => 'Editar', 'style' => '')
                        );
                        echo $this->Html->link(
                            '<i class="icon-trash"></i>',
                            '#deleteOrcamento'.$orcamento['Orcamento']['codigo'],
                            array('escape' => false, 'class' => 'btn btn-mini tip-bottom', 'title' => 'Excluir', 'style' => '', 'data-toggle' => 'modal')
                        );
                    }
					?>
					
				</div>
				
				
			</div>
			<div class="widget-content nopadding">
				<?php
				echo $this->Form->create('Orcamento', array('url' => '/orcamentos/', 'class' => 'form-horizontal', 'id'=>'formulario_page', 'inputDefaults' => array('label' => false,'div' => false)));
				echo $this->Form->hidden('id');
				?>
					<div class="control-group">
						<label class="control-label">Nome</label>
						<div class="controls">
							<?php echo $this->Form->input('nome', array('style' => '', 'value' => $orcamento['Orcamento']['nome'], 'disabled')); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Descrição</label>
						<div class="controls">
							<?php echo $this->Form->textarea('descricao', array('style' => 'height: 100px;', 'value' => $orcamento['Orcamento']['descricao'], 'disabled')); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Status</label>
						<div class="controls">
							<?php echo $this->Form->select('orcamento_status_id', $select_orcamentoStatus,  array('empty' => false, 'value' => $orcamento['OrcamentoStatus']['id'], 'disabled'));	 ?>
						</div>
					</div>
					<div class="control-group">
					<table>
						<tr>
							<td>
									<label class="control-label">Data de início</label>
									<div class="controls">
										<?php echo $this->Form->text('data_inicio_form', array('placeholder' => '', 'style' => 'width:100px', 'value' => (!empty($orcamento['Orcamento']['data_inicio']))?date('d/m/Y', strtotime($orcamento['Orcamento']['data_inicio'])):'', 'disabled')); ?>
									</div>
							</td>
							<td>
									<label class="control-label">Data final</label>
									<div class="controls">
										<?php echo $this->Form->text('data_inicio_form', array('placeholder' => '', 'style' => 'width:100px', 'value' => (!empty($orcamento['Orcamento']['data_fim']))?date('d/m/Y', strtotime($orcamento['Orcamento']['data_fim'])):'', 'disabled')); ?>
									</div>					
							</td>
						</tr>
					</table>	
					</div>
					<div class="control-group">
					<table>
						<tr>		
							<td>
									<label class="control-label">Data de aprovação</label>
									<div class="controls">
										<?php echo $this->Form->text('data_aprovacao_form', array('placeholder' => '', 'style' => 'width:100px', 'value' => (!empty($orcamento['Orcamento']['data_aprovacao']))?date('d/m/Y', strtotime($orcamento['Orcamento']['data_aprovacao'])):'', 'disabled')); ?>
									</div>
							</td>
							<td>
									<label class="control-label">Total</label>
									<div class="controls">
										<?php echo $this->Form->text('total', array('style' => 'width:100px', 'value' => 'R$ '.number_format($orcamento['Orcamento']['valor'], 2, ',', ''), 'disabled')); ?>
									</div>
							</td>
						</tr>
					</table>
					</div>
					
					
					<div class="control-group">
						<label class="control-label">Observação</label>
						<div class="controls">
							<?php echo $this->Form->textarea('observacao', array('style' => '', 'value' => $orcamento['Orcamento']['observacao'], 'disabled')); ?>
						</div>
					</div>
					
					<div class="control-group">
						<h3 class="control-label">Itens </h3>
						
					</div>
					
					
					<div id="itens_orcamento">
						
						<?php
						if(count($orcamento['OrcamentoItem'])){
							foreach($orcamento['OrcamentoItem'] as $item){
								?>

								<div class="control-group">
							
									<label class="control-label"> </label>
									<div class="controls">
										<table style="width: 100%;">
											<tr>
												<td style="width: 80px;">Nome</td>
												<td colspan="5">
													<input  style="" maxlength="100" type="text" value="<?php echo $item['nome'] ?>" disabled/>
												</td>
											</tr>
											<tr >
												
												<td  style="width: 85px;">Quantidade</td>
												<td style="width: 70px;">
													<input  style="width: 54px;" maxlength="100" type="text" value="<?php echo $item['quantidade'] ?>"  disabled/>
												</td>
												<td   style="width: 50px;">Valor</td>
												<td style="width: 70px;" colspan="3">
													<input  style="width: 83px;" maxlength="100" type="text" value="R$ <?php echo number_format($item['valor'], 2, ',', '.') ?>" disabled/>
												</td>
											</tr>
											<tr>
												<td >
													Descrição
												</td>
												<td colspan="5">
													<textarea  style="height:41px" disabled ><?php echo $item['descricao'] ?></textarea>
												</td>
											</tr>
										</table>
									</div>
								</div>
								

								<?php
							}
						}else{
							echo 'Sem itens';
						}
						?>
						
						
						
						
					</div>
					
					
					<div class="form-actions">
						
					</div>
				</form>
					
					
					
					
					
					
			</div>
		</div>			
    </div>
</div>

<!-- Modal -->
<div id="deleteOrcamento<?php echo $orcamento['Orcamento']['codigo']; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Excluir orçamento</h3>
  </div>
  <div class="modal-body">
    <p>Deseja realmente excluir este orçamento?<br/><br/>  Não será possível recuperar estes dados posteriormente.</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
    
	<?php 
	echo $this->Html->link(
		'Excluir',
		'/orcamentos/delete/'.$orcamento['Orcamento']['codigo'],
		array('escape' => false, 'class' => 'btn btn-primary')
	);
	?>
  </div>
</div>
