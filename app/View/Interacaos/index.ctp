<div class="interacaos index">
	<h2><?php echo __('Interacaos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('codigo'); ?></th>
			<th><?php echo $this->Paginator->sort('chamado_id'); ?></th>
			<th><?php echo $this->Paginator->sort('descricao'); ?></th>
			<th><?php echo $this->Paginator->sort('oculto'); ?></th>
			<th><?php echo $this->Paginator->sort('status_chamado_atual'); ?></th>
			<th><?php echo $this->Paginator->sort('status_chamado_novo'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($interacaos as $interacao): ?>
	<tr>
		<td><?php echo h($interacao['Interacao']['id']); ?>&nbsp;</td>
		<td><?php echo h($interacao['Interacao']['codigo']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($interacao['Chamado']['id'], array('controller' => 'chamados', 'action' => 'view', $interacao['Chamado']['id'])); ?>
		</td>
		<td><?php echo h($interacao['Interacao']['descricao']); ?>&nbsp;</td>
		<td><?php echo h($interacao['Interacao']['oculto']); ?>&nbsp;</td>
		<td><?php echo h($interacao['Interacao']['status_chamado_atual']); ?>&nbsp;</td>
		<td><?php echo h($interacao['Interacao']['status_chamado_novo']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($interacao['User']['id'], array('controller' => 'users', 'action' => 'view', $interacao['User']['id'])); ?>
		</td>
		<td><?php echo h($interacao['Interacao']['created']); ?>&nbsp;</td>
		<td><?php echo h($interacao['Interacao']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $interacao['Interacao']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $interacao['Interacao']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $interacao['Interacao']['id']), null, __('Are you sure you want to delete # %s?', $interacao['Interacao']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Interacao'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Chamados'), array('controller' => 'chamados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chamado'), array('controller' => 'chamados', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Interacao Arquivos'), array('controller' => 'interacao_arquivos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Interacao Arquivo'), array('controller' => 'interacao_arquivos', 'action' => 'add')); ?> </li>
	</ul>
</div>
