<div class="cidadesEmpresas index">
	<h2><?php echo __('Cidades Empresas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('estado_id'); ?></th>
			<th><?php echo $this->Paginator->sort('empresa_id'); ?></th>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th><?php echo $this->Paginator->sort('descricao'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($cidadesEmpresas as $cidadesEmpresa): ?>
	<tr>
		<td><?php echo h($cidadesEmpresa['CidadesEmpresa']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($cidadesEmpresa['Estado']['id'], array('controller' => 'estados', 'action' => 'view', $cidadesEmpresa['Estado']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($cidadesEmpresa['Empresa']['id'], array('controller' => 'empresas', 'action' => 'view', $cidadesEmpresa['Empresa']['id'])); ?>
		</td>
		<td><?php echo h($cidadesEmpresa['CidadesEmpresa']['nome']); ?>&nbsp;</td>
		<td><?php echo h($cidadesEmpresa['CidadesEmpresa']['descricao']); ?>&nbsp;</td>
		<td><?php echo h($cidadesEmpresa['CidadesEmpresa']['created']); ?>&nbsp;</td>
		<td><?php echo h($cidadesEmpresa['CidadesEmpresa']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $cidadesEmpresa['CidadesEmpresa']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cidadesEmpresa['CidadesEmpresa']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $cidadesEmpresa['CidadesEmpresa']['id']), null, __('Are you sure you want to delete # %s?', $cidadesEmpresa['CidadesEmpresa']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Cidades Empresa'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Estados'), array('controller' => 'estados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estado'), array('controller' => 'estados', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Empresas'), array('controller' => 'empresas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa'), array('controller' => 'empresas', 'action' => 'add')); ?> </li>
	</ul>
</div>
