<div class="empresaLayouts form">
<?php echo $this->Form->create('EmpresaLayout'); ?>
	<fieldset>
		<legend><?php echo __('Edit Empresa Layout'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('empresa_id');
		echo $this->Form->input('background');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('EmpresaLayout.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('EmpresaLayout.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Empresa Layouts'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Empresas'), array('controller' => 'empresas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa'), array('controller' => 'empresas', 'action' => 'add')); ?> </li>
	</ul>
</div>
