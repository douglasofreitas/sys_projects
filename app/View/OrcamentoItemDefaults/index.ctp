<div class="orcamentoItemDefaults index">
	<h2><?php echo __('Orcamento Item Defaults'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('codigo'); ?></th>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th><?php echo $this->Paginator->sort('descricao'); ?></th>
			<th><?php echo $this->Paginator->sort('observacao'); ?></th>
			<th><?php echo $this->Paginator->sort('valor'); ?></th>
			<th><?php echo $this->Paginator->sort('quantidade'); ?></th>
			<th><?php echo $this->Paginator->sort('empresa_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($orcamentoItemDefaults as $orcamentoItemDefault): ?>
	<tr>
		<td><?php echo h($orcamentoItemDefault['OrcamentoItemDefault']['id']); ?>&nbsp;</td>
		<td><?php echo h($orcamentoItemDefault['OrcamentoItemDefault']['codigo']); ?>&nbsp;</td>
		<td><?php echo h($orcamentoItemDefault['OrcamentoItemDefault']['nome']); ?>&nbsp;</td>
		<td><?php echo h($orcamentoItemDefault['OrcamentoItemDefault']['descricao']); ?>&nbsp;</td>
		<td><?php echo h($orcamentoItemDefault['OrcamentoItemDefault']['observacao']); ?>&nbsp;</td>
		<td><?php echo h($orcamentoItemDefault['OrcamentoItemDefault']['valor']); ?>&nbsp;</td>
		<td><?php echo h($orcamentoItemDefault['OrcamentoItemDefault']['quantidade']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($orcamentoItemDefault['Empresa']['id'], array('controller' => 'empresas', 'action' => 'view', $orcamentoItemDefault['Empresa']['id'])); ?>
		</td>
		<td><?php echo h($orcamentoItemDefault['OrcamentoItemDefault']['created']); ?>&nbsp;</td>
		<td><?php echo h($orcamentoItemDefault['OrcamentoItemDefault']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $orcamentoItemDefault['OrcamentoItemDefault']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $orcamentoItemDefault['OrcamentoItemDefault']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $orcamentoItemDefault['OrcamentoItemDefault']['id']), null, __('Are you sure you want to delete # %s?', $orcamentoItemDefault['OrcamentoItemDefault']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Orcamento Item Default'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Empresas'), array('controller' => 'empresas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa'), array('controller' => 'empresas', 'action' => 'add')); ?> </li>
	</ul>
</div>
