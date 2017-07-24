<div class="chamadoPrioridades index">
	<h2><?php echo __('Chamado Prioridades'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th><?php echo $this->Paginator->sort('descricao'); ?></th>
			<th><?php echo $this->Paginator->sort('cor'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($chamadoPrioridades as $chamadoPrioridade): ?>
	<tr>
		<td><?php echo h($chamadoPrioridade['ChamadoPrioridade']['id']); ?>&nbsp;</td>
		<td><?php echo h($chamadoPrioridade['ChamadoPrioridade']['nome']); ?>&nbsp;</td>
		<td><?php echo h($chamadoPrioridade['ChamadoPrioridade']['descricao']); ?>&nbsp;</td>
		<td><?php echo h($chamadoPrioridade['ChamadoPrioridade']['cor']); ?>&nbsp;</td>
		<td><?php echo h($chamadoPrioridade['ChamadoPrioridade']['created']); ?>&nbsp;</td>
		<td><?php echo h($chamadoPrioridade['ChamadoPrioridade']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $chamadoPrioridade['ChamadoPrioridade']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $chamadoPrioridade['ChamadoPrioridade']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $chamadoPrioridade['ChamadoPrioridade']['id']), null, __('Are you sure you want to delete # %s?', $chamadoPrioridade['ChamadoPrioridade']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Chamado Prioridade'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Chamados'), array('controller' => 'chamados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chamado'), array('controller' => 'chamados', 'action' => 'add')); ?> </li>
	</ul>
</div>
