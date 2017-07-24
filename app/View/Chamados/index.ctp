<?php
echo $this->Chamado->exibe_filtro($select_chamadoStatus, $select_chamadoPrioridade, $select_chamadoTipo, $select_projetos, $perfil_atual);

?>

<div class="span12">
    <?php
    if($perfil_atual == 5)
    echo $this->Html->link('Listar todos os chamados', '/chamados?chamado_status_id=&');
    ?>

	<div class="widget-box">

		<div class="widget-title">
			<span class="icon">
				<i class="icon-th"></i>
			</span>
			<h5>Chamados (Total: <?php echo $this->Paginator->counter(array('format' => __('{:count}'))); ?>)</h5>
			
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
                        echo $this->Chamado->exibe_lista($chamados, $perfil_atual);
			?>
                    
                    
		</div>
	</div>
</div>



