<div class="chamadoTipos form">
<?php echo $this->Form->create('ChamadoTipo'); ?>
	<fieldset>
		<legend><?php echo __('Add Chamado Tipo'); ?></legend>
	<?php
		echo $this->Form->input('nome');
		echo $this->Form->input('img');
		echo $this->Form->input('descricao');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Chamado Tipos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Chamados'), array('controller' => 'chamados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chamado'), array('controller' => 'chamados', 'action' => 'add')); ?> </li>
	</ul>
</div>
