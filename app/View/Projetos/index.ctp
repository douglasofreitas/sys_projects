<?php
echo $this->Projeto->exibe_filtro($select_clientes, $select_projetoStatuses);
?>


<div class="span12">
	<div class="widget-box">
		<div class="widget-title">
			<span class="icon">
				<i class="icon-th"></i>
			</span>
			<h5>Projetos (Total: <?php echo $this->Paginator->counter(array('format' => __('{:count}'))); ?>)</h5>
			
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
			if(count($projetos)){
			?>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th style="width: 51px;"><?php echo $this->Paginator->sort('codigo', 'Código'); ?></th>
						<th><?php echo $this->Paginator->sort('nome', 'Nome'); ?></th>
						<th><?php echo $this->Paginator->sort('Cliente.nome', 'Cliente'); ?></th>
                                                <th style="width: 89px;"><?php echo $this->Paginator->sort('ProjetoStatus.nome', 'Status'); ?></th>
						<th style="width: 60px;text-align: center;">Ações</th>
					</tr>
				</thead>
				<tbody>
					
					<?php
					foreach ($projetos as $projeto){

                        //verifica se o projeto esta com manutenção ativa
                        $tem_manutencao = '';
                        $tem_pendencia = '';
                        if($projeto['Projeto']['manutencao_ativa']){
                            $tem_manutencao = 'fundo_verde';

                        }

                        //verificar se tem pendências
                        if($projeto['Projeto']['pendencia_pagamento']){
                            $tem_manutencao = 'fundo_vermelho';
                            $tem_pendencia = $this->Html->link(
                                '<i class="icon icon-exclamation-sign"></i>',
                                '',
                                array('escape' => false, 'class' => 'tip-bottom ', 'title' => 'Pagamento pendente', 'style' => 'cursor: default;float:right')
                            );

                        }

					?>

                    <tr class="<?php echo $tem_manutencao; ?>">
						<td>
							<?php 
							echo $projeto['Projeto']['codigo'];

                            if($tem_pendencia){
                                echo $tem_pendencia;
                            }
							?>
						</td>
						<td>
							<?php echo $this->Html->link(
								$projeto['Projeto']['nome'],
								'/projetos/view/'.$projeto['Projeto']['codigo'],
								array('escape' => true, 'style' => 'font-weight: bold;')
							); ?>
						</td>
						
						<td><?php echo $projeto['Cliente']['nome'] ?></td>
						<td>
                                                    <span class="label <?php echo $projeto['ProjetoStatus']['tag']; ?> ">
                                                    <?php 
                                                    echo $projeto['ProjetoStatus']['nome'] 
                                                    ?>
                                                    </span>
                                                </td>
						<td style="text-align: center;">
							<?php
							echo $this->Html->link( 
								'<i class="icon-search"></i>',
								'/projetos/view/'.$projeto['Projeto']['codigo'],
								array('escape' => false, 'class' => 'tip-bottom ', 'title' => 'Visualizar')
							);
                            if( $perfil_atual == 2 | $perfil_atual == 3)
							echo $this->Html->link( 
								'<i class="icon-pencil"></i>',
								'/projetos/edit/'.$projeto['Projeto']['codigo'],
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
				echo '<br/>Não há projetos<br/><br/>';
			}
			?>
		</div>
	</div>
</div>


