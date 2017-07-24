<div class="chamadoTipos form">
<?php echo $this->Form->create('ChamadoTipo'); ?>
	<fieldset>
		<legend><?php echo __('Edit Chamado Tipo'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ChamadoTipo.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ChamadoTipo.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Chamado Tipos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Chamados'), array('controller' => 'chamados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chamado'), array('controller' => 'chamados', 'action' => 'add')); ?> </li>
	</ul>
</div>
