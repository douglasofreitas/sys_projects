<div class="chamadoStatuses form">
<?php echo $this->Form->create('ChamadoStatus'); ?>
	<fieldset>
		<legend><?php echo __('Edit Chamado Status'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nome');
		echo $this->Form->input('necessita_teste');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ChamadoStatus.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ChamadoStatus.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Chamado Statuses'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Chamados'), array('controller' => 'chamados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chamado'), array('controller' => 'chamados', 'action' => 'add')); ?> </li>
	</ul>
</div>
