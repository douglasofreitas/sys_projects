<div class="empresasMeiopagamentos index">
	<h2><?php echo __('Empresas Meiopagamentos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('empresa_id'); ?></th>
			<th><?php echo $this->Paginator->sort('meio_pagamento_id'); ?></th>
			<th><?php echo $this->Paginator->sort('desconto'); ?></th>
			<th><?php echo $this->Paginator->sort('resp_1'); ?></th>
			<th><?php echo $this->Paginator->sort('resp_2'); ?></th>
			<th><?php echo $this->Paginator->sort('resp_3'); ?></th>
			<th><?php echo $this->Paginator->sort('resp_4'); ?></th>
			<th><?php echo $this->Paginator->sort('resp_5'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($empresasMeiopagamentos as $empresasMeiopagamento): ?>
	<tr>
		<td><?php echo h($empresasMeiopagamento['EmpresasMeiopagamento']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($empresasMeiopagamento['Empresa']['id'], array('controller' => 'empresas', 'action' => 'view', $empresasMeiopagamento['Empresa']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($empresasMeiopagamento['MeioPagamento']['id'], array('controller' => 'meio_pagamentos', 'action' => 'view', $empresasMeiopagamento['MeioPagamento']['id'])); ?>
		</td>
		<td><?php echo h($empresasMeiopagamento['EmpresasMeiopagamento']['desconto']); ?>&nbsp;</td>
		<td><?php echo h($empresasMeiopagamento['EmpresasMeiopagamento']['resp_1']); ?>&nbsp;</td>
		<td><?php echo h($empresasMeiopagamento['EmpresasMeiopagamento']['resp_2']); ?>&nbsp;</td>
		<td><?php echo h($empresasMeiopagamento['EmpresasMeiopagamento']['resp_3']); ?>&nbsp;</td>
		<td><?php echo h($empresasMeiopagamento['EmpresasMeiopagamento']['resp_4']); ?>&nbsp;</td>
		<td><?php echo h($empresasMeiopagamento['EmpresasMeiopagamento']['resp_5']); ?>&nbsp;</td>
		<td><?php echo h($empresasMeiopagamento['EmpresasMeiopagamento']['created']); ?>&nbsp;</td>
		<td><?php echo h($empresasMeiopagamento['EmpresasMeiopagamento']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $empresasMeiopagamento['EmpresasMeiopagamento']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $empresasMeiopagamento['EmpresasMeiopagamento']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $empresasMeiopagamento['EmpresasMeiopagamento']['id']), null, __('Are you sure you want to delete # %s?', $empresasMeiopagamento['EmpresasMeiopagamento']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Empresas Meiopagamento'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Empresas'), array('controller' => 'empresas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa'), array('controller' => 'empresas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Meio Pagamentos'), array('controller' => 'meio_pagamentos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meio Pagamento'), array('controller' => 'meio_pagamentos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Conta Pagars'), array('controller' => 'conta_pagars', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conta Pagar'), array('controller' => 'conta_pagars', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Conta Recebers'), array('controller' => 'conta_recebers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conta Receber'), array('controller' => 'conta_recebers', 'action' => 'add')); ?> </li>
	</ul>
</div>
