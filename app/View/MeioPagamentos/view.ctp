<div class="meioPagamentos view">
<h2><?php  echo __('Meio Pagamento'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($meioPagamento['MeioPagamento']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($meioPagamento['MeioPagamento']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?php echo h($meioPagamento['MeioPagamento']['descricao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Campo 1'); ?></dt>
		<dd>
			<?php echo h($meioPagamento['MeioPagamento']['campo_1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Campo 2'); ?></dt>
		<dd>
			<?php echo h($meioPagamento['MeioPagamento']['campo_2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Campo 3'); ?></dt>
		<dd>
			<?php echo h($meioPagamento['MeioPagamento']['campo_3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Campo 4'); ?></dt>
		<dd>
			<?php echo h($meioPagamento['MeioPagamento']['campo_4']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Campo 5'); ?></dt>
		<dd>
			<?php echo h($meioPagamento['MeioPagamento']['campo_5']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($meioPagamento['MeioPagamento']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($meioPagamento['MeioPagamento']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Meio Pagamento'), array('action' => 'edit', $meioPagamento['MeioPagamento']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Meio Pagamento'), array('action' => 'delete', $meioPagamento['MeioPagamento']['id']), null, __('Are you sure you want to delete # %s?', $meioPagamento['MeioPagamento']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Meio Pagamentos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meio Pagamento'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Empresas Meiopagamentos'), array('controller' => 'empresas_meiopagamentos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresas Meiopagamento'), array('controller' => 'empresas_meiopagamentos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Empresas Meiopagamentos'); ?></h3>
	<?php if (!empty($meioPagamento['EmpresasMeiopagamento'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Empresa Id'); ?></th>
		<th><?php echo __('Meio Pagamento Id'); ?></th>
		<th><?php echo __('Desconto'); ?></th>
		<th><?php echo __('Resp 1'); ?></th>
		<th><?php echo __('Resp 2'); ?></th>
		<th><?php echo __('Resp 3'); ?></th>
		<th><?php echo __('Resp 4'); ?></th>
		<th><?php echo __('Resp 5'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($meioPagamento['EmpresasMeiopagamento'] as $empresasMeiopagamento): ?>
		<tr>
			<td><?php echo $empresasMeiopagamento['id']; ?></td>
			<td><?php echo $empresasMeiopagamento['empresa_id']; ?></td>
			<td><?php echo $empresasMeiopagamento['meio_pagamento_id']; ?></td>
			<td><?php echo $empresasMeiopagamento['desconto']; ?></td>
			<td><?php echo $empresasMeiopagamento['resp_1']; ?></td>
			<td><?php echo $empresasMeiopagamento['resp_2']; ?></td>
			<td><?php echo $empresasMeiopagamento['resp_3']; ?></td>
			<td><?php echo $empresasMeiopagamento['resp_4']; ?></td>
			<td><?php echo $empresasMeiopagamento['resp_5']; ?></td>
			<td><?php echo $empresasMeiopagamento['created']; ?></td>
			<td><?php echo $empresasMeiopagamento['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'empresas_meiopagamentos', 'action' => 'view', $empresasMeiopagamento['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'empresas_meiopagamentos', 'action' => 'edit', $empresasMeiopagamento['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'empresas_meiopagamentos', 'action' => 'delete', $empresasMeiopagamento['id']), null, __('Are you sure you want to delete # %s?', $empresasMeiopagamento['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Empresas Meiopagamento'), array('controller' => 'empresas_meiopagamentos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
