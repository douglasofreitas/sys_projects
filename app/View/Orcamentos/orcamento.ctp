


<div class="span12">
	<div class="widget-box">
		<div class="widget-title">
			<span class="icon">
				<i class="icon-pencil"></i>									
			</span>
			<h5>Orçamento</h5>
		</div>
		<div class="widget-content nopadding">
			<?php
			echo $this->Form->create('Orcamento', array('url' => '/orcamentos/'.$action, 'class' => 'form-horizontal', 'id'=>'formulario_page', 'inputDefaults' => array('label' => false,'div' => false)));
			echo $this->Form->hidden('id');
			?>
				<div class="control-group">
					<label class="control-label">Nome</label>
					<div class="controls">
						<?php echo $this->Form->input('nome', array('style' => '')); ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Descrição</label>
					<div class="controls">
						<?php echo $this->Form->textarea('descricao', array('style' => 'height: 100px;')); ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Status</label>
					<div class="controls">
						<?php echo $this->Form->select('orcamento_status_id', $select_orcamentoStatus,  array('empty' => false));	 ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Data de início</label>
					<div class="controls">
						<?php
                        if (!empty($this->request->data['Orcamento']['data_inicio']))
                            echo $this->Form->text('data_inicio_form', array('value' => date('d/m/Y', strtotime($this->request->data['Orcamento']['data_inicio'])), 'data-date' => '', 'style' => 'width:100px', 'data-date-format' => 'dd/mm/yyyy', 'class' => 'datepicker'));
                        else
                            echo $this->Form->text('data_inicio_form', array('data-date' => '', 'style' => 'width:100px', 'data-date-format' => 'dd/mm/yyyy', 'class' => 'datepicker'));
                        echo ' '.$this->Html->link('<i class="icon-remove"></i>', '#', array('escape' => false, 'title' => 'Limpar', 'onclick' => "$('#OrcamentoDataInicioForm').val(''); return false;" ));
                        ?>

					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Data final</label>
					<div class="controls">
						<?php
                        if (!empty($this->request->data['Orcamento']['data_fim']))
                            echo $this->Form->text('data_fim_form', array('value' => date('d/m/Y', strtotime($this->request->data['Orcamento']['data_fim'])), 'data-date' => '', 'style' => 'width:100px', 'data-date-format' => 'dd/mm/yyyy', 'class' => 'datepicker'));
                        else
                            echo $this->Form->text('data_fim_form', array('data-date' => '', 'style' => 'width:100px', 'data-date-format' => 'dd/mm/yyyy', 'class' => 'datepicker'));
                        echo ' '.$this->Html->link('<i class="icon-remove"></i>', '#', array('escape' => false, 'title' => 'Limpar', 'onclick' => "$('#OrcamentoDataFimForm').val(''); return false;" ));
                        ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Data de aprovação</label>
					<div class="controls">
						<?php
                        if (!empty($this->request->data['Orcamento']['data_aprovacao']))
                            echo $this->Form->text('data_aprovacao_form', array('value' => date('d/m/Y', strtotime($this->request->data['Orcamento']['data_aprovacao'])),   'data-date' => '', 'style' => 'width:100px', 'data-date-format' => 'dd/mm/yyyy', 'class' => 'datepicker'));
                        else
                            echo $this->Form->text('data_aprovacao_form', array('data-date' => '', 'style' => 'width:100px', 'data-date-format' => 'dd/mm/yyyy', 'class' => 'datepicker'));
                        echo ' '.$this->Html->link('<i class="icon-remove"></i>', '#', array('escape' => false, 'title' => 'Limpar', 'onclick' => "$('#OrcamentoDataAprovacaoForm').val(''); return false;" ));
                        ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Observação</label>
					<div class="controls">
						<?php echo $this->Form->textarea('observacao', array('style' => '')); ?>
					</div>
				</div>
				
				<div class="control-group">
					<h3 class="control-label">Itens </h3>
					
					<div class="controls" style="padding-top: 29px;">
						<button class="btn empty" onclick="return false;"><?php echo $this->Html->link('Adicionar item', '#', array('id' => 'add_item', 'class' => 'link_full')); ?></button>
						
					</div>
				</div>
				
				
				<div id="itens_orcamento">
					
					<?php
					if($action == 'add'){
					?>
						<div class="control-group">
						
							<label class="control-label"> </label>
							<div class="controls">
								<table style="width: 100%;">
									<tr>
										<td style="width: 80px;">Nome</td>
										<td colspan="5">
											<input name="data[Orcamento][item][1][nome]" style="" maxlength="100" type="text" id="OrcamentoItem1Nome" />
										</td>
									</tr>
									<tr >
										
										<td  style="width: 85px;">Quantidade</td>
										<td style="width: 70px;">
											<input name="data[Orcamento][item][1][quantidade]" style="width: 54px;" maxlength="100" type="text" id="OrcamentoItem1Quantidade"  />
										</td>
										<td   style="width: 50px;">Valor</td>
										<td style="width: 70px;" colspan="3">
											<input name="data[Orcamento][item][1][valor]" style="width: 54px;" maxlength="100" type="text" id="OrcamentoItem1Valor" />
										</td>
									</tr>
									<tr>
										<td >
											Descrição
										</td>
										<td colspan="5">
											<textarea name="data[Orcamento][item][1][descricao]" style="height:41px" id="OrcamentoItem1Descricao"></textarea>
										</td>
									</tr>
								</table>
							</div>
						</div>
							
							

					<?php
					}else{
						$count = 1;
						foreach($this->request->data['OrcamentoItem'] as $item){
							?>

							<div class="control-group">
							
								<label class="control-label"> </label>
								<div class="controls">
									<table style="width: 100%;">
										<tr>
											<td style="width: 80px;">Nome</td>
											<td colspan="5">
												<input name="data[Orcamento][item][<?php echo $count; ?>][id]" style="" maxlength="100" type="hidden" id="OrcamentoItem<?php echo $count; ?>Id" value="<?php echo $item['id']; ?>" />
												<input name="data[Orcamento][item][<?php echo $count; ?>][nome]" style="" maxlength="100" type="text" id="OrcamentoItem<?php echo $count; ?>Nome" value="<?php echo $item['nome']; ?>" />
											</td>
										</tr>
										<tr style="">
											<td  style="width: 85px;">Quantidade</td>
											<td style="width: 70px;">
												<input name="data[Orcamento][item][<?php echo $count; ?>][quantidade]" style="width: 54px;" maxlength="100" type="text" id="OrcamentoItem<?php echo $count; ?>Quantidade" value="<?php echo $item['quantidade']; ?>" />
											</td>
											<td   style="width: 50px;">Valor</td>
											<td style="width: 70px;" colspan="3">
												<input name="data[Orcamento][item][<?php echo $count; ?>][valor]" style="width: 54px;" maxlength="100" type="text" id="OrcamentoItem<?php echo $count; ?>Valor" value="<?php echo $item['valor']; ?>" />
											</td>
										</tr>
										<tr>
											<td >
												Descrição
											</td>
											<td colspan="5">
												<textarea name="data[Orcamento][item][<?php echo $count; ?>][descricao]" style="height:41px" id="OrcamentoItem<?php echo $count; ?>Descricao"><?php echo $item['descricao']; ?></textarea>
											</td>
										</tr>
									</table>
								</div>
							</div>
								

							<?php  
							$count++;
						}
					}
					?>
					
				</div>
				
				
				<div class="form-actions">
					<button type="submit" class="btn btn-primary">Salvar</button>
				</div>
			</form>
		</div>
	</div>			
</div>




<script type="text/javascript">
	$(function() {
		<?php
		if($action == 'add'){
			echo 'var num_item = 1;';
		}else{
			echo 'var num_item = '.count($this->request->data['OrcamentoItem']).';';
		}
		?>
		$('#add_item').click(function()
			{   
				num_item++;
				var msg = '<div class="control-group">\n\
							<label class="control-label"> </label>\n\
							<div class="controls">\n\
								<table style="width: 100%;">\n\
									<tr>\n\
										<td style="width: 80px;">Nome</td>\n\
										<td colspan="5">\n\
											<input name="data[Orcamento][item]['+num_item+'][nome]" style="" maxlength="100" type="text" id="OrcamentoItem'+num_item+'Nome" />\n\
										</td>\n\
									</tr>\n\
									<tr style="">\n\
										<td  style="width: 85px;">Quantidade</td>\n\
										<td style="width: 70px;">\n\
											<input name="data[Orcamento][item]['+num_item+'][quantidade]" style="width: 54px;" maxlength="100" type="text" id="OrcamentoItem'+num_item+'Quantidade"  />\n\
										</td>\n\
										<td   style="width: 50px;">Valor</td>\n\
										<td style="width: 70px;" colspan="3">\n\
											<input name="data[Orcamento][item]['+num_item+'][valor]" style="width: 54px;" maxlength="100" type="text" id="OrcamentoItem'+num_item+'Valor" />\n\
										</td>\n\
									</tr>\n\
									<tr>\n\
										<td >\n\
											Descrição\n\
										</td>\n\
										<td colspan="5">\n\
											<textarea name="data[Orcamento][item]['+num_item+'][descricao]" style="height:41px" id="OrcamentoItem'+num_item+'Descricao"></textarea>\n\
										</td>\n\
									</tr>\n\
								</table>\n\
							</div>\n\
						</div>';
				
				$('#itens_orcamento').append(msg);
				
				return false;
			}
		);
	});
</script>