<div class="fornecedorsUsers form">
<?php echo $this->Form->create('FornecedorsUser'); ?>
	<fieldset>
		<legend><?php echo __('Edit Fornecedors User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('fornecedor_id');
		echo $this->Form->input('ativo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('FornecedorsUser.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('FornecedorsUser.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Fornecedors Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Fornecedors'), array('controller' => 'fornecedors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fornecedor'), array('controller' => 'fornecedors', 'action' => 'add')); ?> </li>
	</ul>
</div>
