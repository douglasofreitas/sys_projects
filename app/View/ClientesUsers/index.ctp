<div class="clientesUsers index">
	<h2><?php echo __('Clientes Users'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('cliente_id'); ?></th>
			<th><?php echo $this->Paginator->sort('ativo'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($clientesUsers as $clientesUser): ?>
	<tr>
		<td><?php echo h($clientesUser['ClientesUser']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($clientesUser['User']['id'], array('controller' => 'users', 'action' => 'view', $clientesUser['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($clientesUser['Cliente']['id'], array('controller' => 'clientes', 'action' => 'view', $clientesUser['Cliente']['id'])); ?>
		</td>
		<td><?php echo h($clientesUser['ClientesUser']['ativo']); ?>&nbsp;</td>
		<td><?php echo h($clientesUser['ClientesUser']['created']); ?>&nbsp;</td>
		<td><?php echo h($clientesUser['ClientesUser']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $clientesUser['ClientesUser']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $clientesUser['ClientesUser']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $clientesUser['ClientesUser']['id']), null, __('Are you sure you want to delete # %s?', $clientesUser['ClientesUser']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Clientes User'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
	</ul>
</div>
