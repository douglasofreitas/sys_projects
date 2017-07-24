<div class="fornecedors form">
<?php echo $this->Form->create('Fornecedor'); ?>
	<fieldset>
		<legend><?php echo __('Edit Fornecedor'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('codigo');
		echo $this->Form->input('empresa_id');
		echo $this->Form->input('nome');
		echo $this->Form->input('ativo');
		echo $this->Form->input('descricao');
		echo $this->Form->input('user_id');
		echo $this->Form->input('User');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Fornecedor.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Fornecedor.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Fornecedors'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Empresas'), array('controller' => 'empresas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa'), array('controller' => 'empresas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Conta Pagars'), array('controller' => 'conta_pagars', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conta Pagar'), array('controller' => 'conta_pagars', 'action' => 'add')); ?> </li>
	</ul>
</div>
