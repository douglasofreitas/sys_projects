<div class="caixas index">
	<h2><?php echo __('Caixas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('codigo'); ?></th>
			<th><?php echo $this->Paginator->sort('conta_pagar_id'); ?></th>
			<th><?php echo $this->Paginator->sort('conta_receber_id'); ?></th>
			<th><?php echo $this->Paginator->sort('empresa_id'); ?></th>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th><?php echo $this->Paginator->sort('descricao'); ?></th>
			<th><?php echo $this->Paginator->sort('valor_entrada'); ?></th>
			<th><?php echo $this->Paginator->sort('valor_saida'); ?></th>
			<th><?php echo $this->Paginator->sort('saldo'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($caixas as $caixa): ?>
	<tr>
		<td><?php echo h($caixa['Caixa']['id']); ?>&nbsp;</td>
		<td><?php echo h($caixa['Caixa']['codigo']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($caixa['ContaPagar']['id'], array('controller' => 'conta_pagars', 'action' => 'view', $caixa['ContaPagar']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($caixa['ContaReceber']['id'], array('controller' => 'conta_recebers', 'action' => 'view', $caixa['ContaReceber']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($caixa['Empresa']['id'], array('controller' => 'empresas', 'action' => 'view', $caixa['Empresa']['id'])); ?>
		</td>
		<td><?php echo h($caixa['Caixa']['nome']); ?>&nbsp;</td>
		<td><?php echo h($caixa['Caixa']['descricao']); ?>&nbsp;</td>
		<td><?php echo h($caixa['Caixa']['valor_entrada']); ?>&nbsp;</td>
		<td><?php echo h($caixa['Caixa']['valor_saida']); ?>&nbsp;</td>
		<td><?php echo h($caixa['Caixa']['saldo']); ?>&nbsp;</td>
		<td><?php echo h($caixa['Caixa']['created']); ?>&nbsp;</td>
		<td><?php echo h($caixa['Caixa']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $caixa['Caixa']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $caixa['Caixa']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $caixa['Caixa']['id']), null, __('Are you sure you want to delete # %s?', $caixa['Caixa']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Caixa'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Conta Pagars'), array('controller' => 'conta_pagars', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conta Pagar'), array('controller' => 'conta_pagars', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Conta Recebers'), array('controller' => 'conta_recebers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conta Receber'), array('controller' => 'conta_recebers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Empresas'), array('controller' => 'empresas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa'), array('controller' => 'empresas', 'action' => 'add')); ?> </li>
	</ul>
</div>
