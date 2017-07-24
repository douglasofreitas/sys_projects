<div class="fornecedorsUsers index">
	<h2><?php echo __('Fornecedors Users'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('fornecedor_id'); ?></th>
			<th><?php echo $this->Paginator->sort('ativo'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($fornecedorsUsers as $fornecedorsUser): ?>
	<tr>
		<td><?php echo h($fornecedorsUser['FornecedorsUser']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($fornecedorsUser['User']['id'], array('controller' => 'users', 'action' => 'view', $fornecedorsUser['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($fornecedorsUser['Fornecedor']['id'], array('controller' => 'fornecedors', 'action' => 'view', $fornecedorsUser['Fornecedor']['id'])); ?>
		</td>
		<td><?php echo h($fornecedorsUser['FornecedorsUser']['ativo']); ?>&nbsp;</td>
		<td><?php echo h($fornecedorsUser['FornecedorsUser']['created']); ?>&nbsp;</td>
		<td><?php echo h($fornecedorsUser['FornecedorsUser']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $fornecedorsUser['FornecedorsUser']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $fornecedorsUser['FornecedorsUser']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $fornecedorsUser['FornecedorsUser']['id']), null, __('Are you sure you want to delete # %s?', $fornecedorsUser['FornecedorsUser']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Fornecedors User'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Fornecedors'), array('controller' => 'fornecedors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fornecedor'), array('controller' => 'fornecedors', 'action' => 'add')); ?> </li>
	</ul>
</div>
