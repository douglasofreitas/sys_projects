
<div class="span12">
	<div class="widget-box">
		<div class="widget-title">
			<span class="icon">
				<i class="icon-th"></i>
			</span>
			<h5>Clientes (Total: <?php echo $this->Paginator->counter(array('format' => __('{:count}'))); ?>)</h5>
			
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
			if(count($clientes)){
			?>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th style="width: 51px;"><?php echo $this->Paginator->sort('codigo', 'Código'); ?></th>
						<th><?php echo $this->Paginator->sort('nome', 'Nome'); ?></th>
						<th style="width: 120px;">Núm. projetos</th>
						<th style="width: 60px;text-align: center;">Ações</th>
					</tr>
				</thead>
				<tbody>
					
					<?php
					foreach ($clientes as $cliente){
					?>
				
					<tr>
						<td>
							<?php 
							echo $cliente['Cliente']['codigo'];
							?>
						</td>
						<td>
							<?php echo $this->Html->link(
								$cliente['Cliente']['nome'],
								'/clientes/view/'.$cliente['Cliente']['codigo'],
								array('escape' => true, 'style' => 'font-weight: bold;')
							); ?>
						</td>
						
						<td><?php echo count($cliente['Projeto']); ?></td>
						<td style="text-align: center;">
							<?php
							echo $this->Html->link( 
								'<i class="icon-search"></i>',
								'/clientes/view/'.$cliente['Cliente']['codigo'],
								array('escape' => false, 'class' => 'tip-bottom ', 'title' => 'Visualizar')
							);
                            if($perfil_atual == 2 | $perfil_atual == 3)
							echo $this->Html->link( 
								'<i class="icon-pencil"></i>',
								'/clientes/edit/'.$cliente['Cliente']['codigo'],
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
				echo '<br/>Não há clientes<br/><br/>';
			}
			?>
		</div>
	</div>
</div>
