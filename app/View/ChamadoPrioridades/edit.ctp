<div class="chamadoPrioridades form">
<?php echo $this->Form->create('ChamadoPrioridade'); ?>
	<fieldset>
		<legend><?php echo __('Edit Chamado Prioridade'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nome');
		echo $this->Form->input('descricao');
		echo $this->Form->input('cor');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ChamadoPrioridade.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ChamadoPrioridade.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Chamado Prioridades'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Chamados'), array('controller' => 'chamados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chamado'), array('controller' => 'chamados', 'action' => 'add')); ?> </li>
	</ul>
</div>
