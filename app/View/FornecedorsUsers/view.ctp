<div class="fornecedorsUsers view">
<h2><?php  echo __('Fornecedors User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($fornecedorsUser['FornecedorsUser']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($fornecedorsUser['User']['id'], array('controller' => 'users', 'action' => 'view', $fornecedorsUser['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fornecedor'); ?></dt>
		<dd>
			<?php echo $this->Html->link($fornecedorsUser['Fornecedor']['id'], array('controller' => 'fornecedors', 'action' => 'view', $fornecedorsUser['Fornecedor']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ativo'); ?></dt>
		<dd>
			<?php echo h($fornecedorsUser['FornecedorsUser']['ativo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($fornecedorsUser['FornecedorsUser']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($fornecedorsUser['FornecedorsUser']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Fornecedors User'), array('action' => 'edit', $fornecedorsUser['FornecedorsUser']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Fornecedors User'), array('action' => 'delete', $fornecedorsUser['FornecedorsUser']['id']), null, __('Are you sure you want to delete # %s?', $fornecedorsUser['FornecedorsUser']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Fornecedors Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fornecedors User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Fornecedors'), array('controller' => 'fornecedors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fornecedor'), array('controller' => 'fornecedors', 'action' => 'add')); ?> </li>
	</ul>
</div>
