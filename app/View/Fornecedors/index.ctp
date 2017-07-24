
<div class="span12">
	<div class="widget-box">
		<div class="widget-title">
			<span class="icon">
				<i class="icon-th"></i>
			</span>
			<h5>Fornecedores (Total: <?php echo $this->Paginator->counter(array('format' => __('{:count}'))); ?>)</h5>
			
			<?php
			echo '<div class="dataTables_paginate fg-buttonset ui-buttonset fg-buttonset-multi ui-buttonset-multi paging_full_numbers">';
			echo $this->Paginator->prev('Anterior', array('class' => 'previous fg-button ui-button ui-state-default '), 'Anterior', array('class' => 'previous fg-button ui-button ui-state-default ui-state-disabled', 'tag' => 'a'));
			echo '<span>';
			echo $this->Paginator->numbers(array('separator' => false, 'class' => 'fg-button ui-button ui-state-default',  'currentClass' => 'fg-button ui-button ui-state-default ui-state-disabled'));
			echo '</span>';
			echo $this->Paginator->next('Próxima', array('class' => 'next fg-button ui-button ui-state-default'), 'Próxima', array('class' => 'next fg-button ui-button ui-state-default ui-state-disabled', 'tag' => 'a'));
			echo '</div>';
			?>
		</div>
		<div class="widget-content nopadding">
		
			<?php
			if(count($fornecedors)){
			?>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th style="width: 51px;"><?php echo $this->Paginator->sort('codigo', 'Código'); ?></th>
						<th><?php echo $this->Paginator->sort('nome', 'Nome'); ?></th>
						<th style="width: 51px;">Ativo</th>
						<th style="width: 60px;text-align: center;">Ações</th>
					</tr>
				</thead>
				<tbody>
					
					<?php
					foreach ($fornecedors as $fornecedor){
					?>
				
					<tr>
						<td>
							<?php 
							echo $fornecedor['Fornecedor']['codigo'];
							?>
						</td>
						<td>
							<?php echo $this->Html->link(
								$fornecedor['Fornecedor']['nome'],
								'/fornecedors/view/'.$fornecedor['Fornecedor']['codigo'],
								array('escape' => true, 'style' => 'font-weight: bold;')
							); ?>
						</td>
						
						<td><?php if($fornecedor['Fornecedor']['ativo']) echo 'Sim'; else echo 'Não'; ?></td>
						<td style="text-align: center;">
							<?php
							echo $this->Html->link( 
								'<i class="icon-search"></i>',
								'/fornecedors/view/'.$fornecedor['Fornecedor']['codigo'],
								array('escape' => false, 'class' => 'tip-bottom ', 'title' => 'Visualizar')
							);
							echo $this->Html->link( 
								'<i class="icon-pencil"></i>',
								'/fornecedors/edit/'.$fornecedor['Fornecedor']['codigo'],
								array('escape' => false, 'class' => 'tip-bottom ', 'title' => 'Editar')
							);
							?>
						</td>
					</tr>
					<?php 
					}
					?>
					
				</tbody>
			</table>

			<?php
			}else{
				echo '<br/>Não há fornecedores<br/><br/>';
			}
			?>
		</div>
	</div>
</div>

