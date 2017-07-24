<div class="orcamentoStatuses index">
	<h2><?php echo __('Orcamento Statuses'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($orcamentoStatuses as $orcamentoStatus): ?>
	<tr>
		<td><?php echo h($orcamentoStatus['OrcamentoStatus']['id']); ?>&nbsp;</td>
		<td><?php echo h($orcamentoStatus['OrcamentoStatus']['nome']); ?>&nbsp;</td>
		<td><?php echo h($orcamentoStatus['OrcamentoStatus']['created']); ?>&nbsp;</td>
		<td><?php echo h($orcamentoStatus['OrcamentoStatus']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $orcamentoStatus['OrcamentoStatus']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $orcamentoStatus['OrcamentoStatus']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $orcamentoStatus['OrcamentoStatus']['id']), null, __('Are you sure you want to delete # %s?', $orcamentoStatus['OrcamentoStatus']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Orcamento Status'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Orcamentos'), array('controller' => 'orcamentos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Orcamento'), array('controller' => 'orcamentos', 'action' => 'add')); ?> </li>
	</ul>
</div>
