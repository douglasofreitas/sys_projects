<div class="contaStatuses view">
<h2><?php  echo __('Conta Status'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($contaStatus['ContaStatus']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($contaStatus['ContaStatus']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($contaStatus['ContaStatus']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($contaStatus['ContaStatus']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Conta Status'), array('action' => 'edit', $contaStatus['ContaStatus']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Conta Status'), array('action' => 'delete', $contaStatus['ContaStatus']['id']), null, __('Are you sure you want to delete # %s?', $contaStatus['ContaStatus']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Conta Statuses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conta Status'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Conta Pagars'), array('controller' => 'conta_pagars', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conta Pagar'), array('controller' => 'conta_pagars', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Conta Recebers'), array('controller' => 'conta_recebers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conta Receber'), array('controller' => 'conta_recebers', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Conta Pagars'); ?></h3>
	<?php if (!empty($contaStatus['ContaPagar'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Codigo'); ?></th>
		<th><?php echo __('Fornecedor Id'); ?></th>
		<th><?php echo __('Conta Status Id'); ?></th>
		<th><?php echo __('Empresas Meiopagamento Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Descricao'); ?></th>
		<th><?php echo __('Valor'); ?></th>
		<th><?php echo __('Desconto'); ?></th>
		<th><?php echo __('Data Vencimento'); ?></th>
		<th><?php echo __('Data Pagamento'); ?></th>
		<th><?php echo __('Observacao'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($contaStatus['ContaPagar'] as $contaPagar): ?>
		<tr>
			<td><?php echo $contaPagar['id']; ?></td>
			<td><?php echo $contaPagar['codigo']; ?></td>
			<td><?php echo $contaPagar['fornecedor_id']; ?></td>
			<td><?php echo $contaPagar['conta_status_id']; ?></td>
			<td><?php echo $contaPagar['empresas_meiopagamento_id']; ?></td>
			<td><?php echo $contaPagar['nome']; ?></td>
			<td><?php echo $contaPagar['descricao']; ?></td>
			<td><?php echo $contaPagar['valor']; ?></td>
			<td><?php echo $contaPagar['desconto']; ?></td>
			<td><?php echo $contaPagar['data_vencimento']; ?></td>
			<td><?php echo $contaPagar['data_pagamento']; ?></td>
			<td><?php echo $contaPagar['observacao']; ?></td>
			<td><?php echo $contaPagar['user_id']; ?></td>
			<td><?php echo $contaPagar['created']; ?></td>
			<td><?php echo $contaPagar['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'conta_pagars', 'action' => 'view', $contaPagar['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'conta_pagars', 'action' => 'edit', $contaPagar['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'conta_pagars', 'action' => 'delete', $contaPagar['id']), null, __('Are you sure you want to delete # %s?', $contaPagar['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Conta Pagar'), array('controller' => 'conta_pagars', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Conta Recebers'); ?></h3>
	<?php if (!empty($contaStatus['ContaReceber'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Codigo'); ?></th>
		<th><?php echo __('Orcamento Id'); ?></th>
		<th><?php echo __('Conta Status Id'); ?></th>
		<th><?php echo __('Empresas Meiopagamento Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Descricao'); ?></th>
		<th><?php echo __('Valor'); ?></th>
		<th><?php echo __('Desconto'); ?></th>
		<th><?php echo __('Data Vencimento'); ?></th>
		<th><?php echo __('Data Pagamento'); ?></th>
		<th><?php echo __('Observacao'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($contaStatus['ContaReceber'] as $contaReceber): ?>
		<tr>
			<td><?php echo $contaReceber['id']; ?></td>
			<td><?php echo $contaReceber['codigo']; ?></td>
			<td><?php echo $contaReceber['orcamento_id']; ?></td>
			<td><?php echo $contaReceber['conta_status_id']; ?></td>
			<td><?php echo $contaReceber['empresas_meiopagamento_id']; ?></td>
			<td><?php echo $contaReceber['nome']; ?></td>
			<td><?php echo $contaReceber['descricao']; ?></td>
			<td><?php echo $contaReceber['valor']; ?></td>
			<td><?php echo $contaReceber['desconto']; ?></td>
			<td><?php echo $contaReceber['data_vencimento']; ?></td>
			<td><?php echo $contaReceber['data_pagamento']; ?></td>
			<td><?php echo $contaReceber['observacao']; ?></td>
			<td><?php echo $contaReceber['user_id']; ?></td>
			<td><?php echo $contaReceber['created']; ?></td>
			<td><?php echo $contaReceber['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'conta_recebers', 'action' => 'view', $contaReceber['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'conta_recebers', 'action' => 'edit', $contaReceber['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'conta_recebers', 'action' => 'delete', $contaReceber['id']), null, __('Are you sure you want to delete # %s?', $contaReceber['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Conta Receber'), array('controller' => 'conta_recebers', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
