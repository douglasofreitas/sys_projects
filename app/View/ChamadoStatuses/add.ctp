<div class="chamadoStatuses form">
<?php echo $this->Form->create('ChamadoStatus'); ?>
	<fieldset>
		<legend><?php echo __('Add Chamado Status'); ?></legend>
	<?php
		echo $this->Form->input('nome');
		echo $this->Form->input('necessita_teste');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Chamado Statuses'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Chamados'), array('controller' => 'chamados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chamado'), array('controller' => 'chamados', 'action' => 'add')); ?> </li>
	</ul>
</div>
