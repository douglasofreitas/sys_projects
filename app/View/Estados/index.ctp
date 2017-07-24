<div class="estados index">
	<h2><?php echo __('Estados'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th><?php echo $this->Paginator->sort('sigla'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($estados as $estado): ?>
	<tr>
		<td><?php echo h($estado['Estado']['id']); ?>&nbsp;</td>
		<td><?php echo h($estado['Estado']['nome']); ?>&nbsp;</td>
		<td><?php echo h($estado['Estado']['sigla']); ?>&nbsp;</td>
		<td><?php echo h($estado['Estado']['created']); ?>&nbsp;</td>
		<td><?php echo h($estado['Estado']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $estado['Estado']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $estado['Estado']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $estado['Estado']['id']), null, __('Are you sure you want to delete # %s?', $estado['Estado']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Estado'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Cidades'), array('controller' => 'cidades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cidade'), array('controller' => 'cidades', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cidades Empresas'), array('controller' => 'cidades_empresas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cidades Empresa'), array('controller' => 'cidades_empresas', 'action' => 'add')); ?> </li>
	</ul>
</div>
