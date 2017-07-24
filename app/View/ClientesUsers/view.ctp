<div class="clientesUsers view">
<h2><?php  echo __('Clientes User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($clientesUser['ClientesUser']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($clientesUser['User']['id'], array('controller' => 'users', 'action' => 'view', $clientesUser['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cliente'); ?></dt>
		<dd>
			<?php echo $this->Html->link($clientesUser['Cliente']['id'], array('controller' => 'clientes', 'action' => 'view', $clientesUser['Cliente']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ativo'); ?></dt>
		<dd>
			<?php echo h($clientesUser['ClientesUser']['ativo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($clientesUser['ClientesUser']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($clientesUser['ClientesUser']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Clientes User'), array('action' => 'edit', $clientesUser['ClientesUser']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Clientes User'), array('action' => 'delete', $clientesUser['ClientesUser']['id']), null, __('Are you sure you want to delete # %s?', $clientesUser['ClientesUser']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Clientes Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Clientes User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
	</ul>
</div>
