<div class="cidadesEmpresas form">
<?php echo $this->Form->create('CidadesEmpresa'); ?>
	<fieldset>
		<legend><?php echo __('Edit Cidades Empresa'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('estado_id');
		echo $this->Form->input('empresa_id');
		echo $this->Form->input('nome');
		echo $this->Form->input('descricao');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CidadesEmpresa.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('CidadesEmpresa.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Cidades Empresas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Estados'), array('controller' => 'estados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estado'), array('controller' => 'estados', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Empresas'), array('controller' => 'empresas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa'), array('controller' => 'empresas', 'action' => 'add')); ?> </li>
	</ul>
</div>
