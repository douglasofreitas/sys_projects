<div class="span12">
	<div class="widget-box">
		<div class="widget-title">
			<span class="icon">
				<i class="icon-th"></i>
			</span>
			<h5>Orçamentos (Total: <?php echo $this->Paginator->counter(array('format' => __('{:count}'))); ?>)</h5>
			
				
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
			if(count($orcamentos)){
			?>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th style="width: 51px;"><?php echo $this->Paginator->sort('codigo', 'Código'); ?></th>
						<th><?php echo $this->Paginator->sort('nome', 'Nome'); ?></th>
                        <th style="width: 89px;"><?php echo $this->Paginator->sort('OrcamentoStatus.nome', 'Status'); ?></th>
						<th style="width: 75px;"><?php echo $this->Paginator->sort('valor', 'Valor'); ?></th>
						<th style="width: 140px;"><?php echo $this->Paginator->sort('created', 'Criação'); ?></th>
						<th style="width: 60px;">Ações</th>
					</tr>
				</thead>
				<tbody>
					
					<?php
					foreach ($orcamentos as $orcamento){
					?>
				
					<tr>
						<td><?php echo $orcamento['Orcamento']['codigo'] ?></td>
						<td>
							<?php echo $this->Html->link(
										$orcamento['Orcamento']['nome'],
										'/orcamentos/view/'.$orcamento['Orcamento']['codigo'],
										array('escape' => true, 'style' => 'font-weight: bold;')
							); ?>
						</td>

                        <td>
                            <span class="label <?php echo $orcamento['OrcamentoStatus']['tag']; ?> ">
                            <?php
                                echo $orcamento['OrcamentoStatus']['nome']
                                ?>
                            </span>
                        </td>
						<td>R$ <?php echo  number_format($orcamento['Orcamento']['valor'], 2, ',', ''); ?></td>
						<td><?php echo (!empty($orcamento['Orcamento']['created']))?date('d/m/Y', strtotime($orcamento['Orcamento']['created'])):''; ?></td>
						<td style="text-align: center;">
							<?php
							echo $this->Html->link( 
								'<i class="icon-search"></i>',
								'/orcamentos/view/'.$orcamento['Orcamento']['codigo'],
								array('escape' => false, 'class' => 'tip-bottom ', 'title' => 'Visualizar')
							);
							echo $this->Html->link( 
								'<i class="icon-pencil"></i>',
								'/orcamentos/edit/'.$orcamento['Orcamento']['codigo'],
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
				echo '<br/>Não há orçamentos<br/><br/>';
			}
			?>
		</div>
	</div>
</div>
