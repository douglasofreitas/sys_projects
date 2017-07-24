<div class="empresasMeiopagamentos view">
<h2><?php  echo __('Empresas Meiopagamento'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($empresasMeiopagamento['EmpresasMeiopagamento']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Empresa'); ?></dt>
		<dd>
			<?php echo $this->Html->link($empresasMeiopagamento['Empresa']['id'], array('controller' => 'empresas', 'action' => 'view', $empresasMeiopagamento['Empresa']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meio Pagamento'); ?></dt>
		<dd>
			<?php echo $this->Html->link($empresasMeiopagamento['MeioPagamento']['id'], array('controller' => 'meio_pagamentos', 'action' => 'view', $empresasMeiopagamento['MeioPagamento']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Desconto'); ?></dt>
		<dd>
			<?php echo h($empresasMeiopagamento['EmpresasMeiopagamento']['desconto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Resp 1'); ?></dt>
		<dd>
			<?php echo h($empresasMeiopagamento['EmpresasMeiopagamento']['resp_1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Resp 2'); ?></dt>
		<dd>
			<?php echo h($empresasMeiopagamento['EmpresasMeiopagamento']['resp_2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Resp 3'); ?></dt>
		<dd>
			<?php echo h($empresasMeiopagamento['EmpresasMeiopagamento']['resp_3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Resp 4'); ?></dt>
		<dd>
			<?php echo h($empresasMeiopagamento['EmpresasMeiopagamento']['resp_4']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Resp 5'); ?></dt>
		<dd>
			<?php echo h($empresasMeiopagamento['EmpresasMeiopagamento']['resp_5']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($empresasMeiopagamento['EmpresasMeiopagamento']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($empresasMeiopagamento['EmpresasMeiopagamento']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Empresas Meiopagamento'), array('action' => 'edit', $empresasMeiopagamento['EmpresasMeiopagamento']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Empresas Meiopagamento'), array('action' => 'delete', $empresasMeiopagamento['EmpresasMeiopagamento']['id']), null, __('Are you sure you want to delete # %s?', $empresasMeiopagamento['EmpresasMeiopagamento']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Empresas Meiopagamentos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresas Meiopagamento'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Conta Pagars'); ?></h3>
	<?php if (!empty($empresasMeiopagamento['ContaPagar'])): ?>
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
		foreach ($empresasMeiopagamento['ContaPagar'] as $contaPagar): ?>
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
	<?php if (!empty($empresasMeiopagamento['ContaReceber'])): ?>
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
		foreach ($empresasMeiopagamento['ContaReceber'] as $contaReceber): ?>
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
