
<div class="span12">
	<div class="widget-box">
		<div class="widget-title">
			<span class="icon">
				<i class="icon-th"></i>
			</span>
			<h5>Faturas (Total: <?php echo $this->Paginator->counter(array('format' => __('{:count}'))); ?>)</h5>
			
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
                        echo $this->Fatura->exibe_lista($faturas);
            ?>


        </div>
	</div>
</div>
