<div class="contaStatuses index">
	<h2><?php echo __('Conta Statuses'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($contaStatuses as $contaStatus): ?>
	<tr>
		<td><?php echo h($contaStatus['ContaStatus']['id']); ?>&nbsp;</td>
		<td><?php echo h($contaStatus['ContaStatus']['nome']); ?>&nbsp;</td>
		<td><?php echo h($contaStatus['ContaStatus']['created']); ?>&nbsp;</td>
		<td><?php echo h($contaStatus['ContaStatus']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $contaStatus['ContaStatus']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $contaStatus['ContaStatus']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $contaStatus['ContaStatus']['id']), null, __('Are you sure you want to delete # %s?', $contaStatus['ContaStatus']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Conta Status'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Conta Pagars'), array('controller' => 'conta_pagars', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conta Pagar'), array('controller' => 'conta_pagars', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Conta Recebers'), array('controller' => 'conta_recebers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conta Receber'), array('controller' => 'conta_recebers', 'action' => 'add')); ?> </li>
	</ul>
</div>
