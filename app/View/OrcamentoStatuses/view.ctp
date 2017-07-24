<div class="orcamentoStatuses view">
<h2><?php  echo __('Orcamento Status'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($orcamentoStatus['OrcamentoStatus']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($orcamentoStatus['OrcamentoStatus']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($orcamentoStatus['OrcamentoStatus']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($orcamentoStatus['OrcamentoStatus']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Orcamento Status'), array('action' => 'edit', $orcamentoStatus['OrcamentoStatus']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Orcamento Status'), array('action' => 'delete', $orcamentoStatus['OrcamentoStatus']['id']), null, __('Are you sure you want to delete # %s?', $orcamentoStatus['OrcamentoStatus']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Orcamento Statuses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Orcamento Status'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orcamentos'), array('controller' => 'orcamentos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Orcamento'), array('controller' => 'orcamentos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Orcamentos'); ?></h3>
	<?php if (!empty($orcamentoStatus['Orcamento'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Codigo'); ?></th>
		<th><?php echo __('Orcamento Status Id'); ?></th>
		<th><?php echo __('Projeto Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Descricao'); ?></th>
		<th><?php echo __('Observacao'); ?></th>
		<th><?php echo __('Data Aprovacao'); ?></th>
		<th><?php echo __('Data Inicio'); ?></th>
		<th><?php echo __('Data Fim'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Empresa Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($orcamentoStatus['Orcamento'] as $orcamento): ?>
		<tr>
			<td><?php echo $orcamento['id']; ?></td>
			<td><?php echo $orcamento['codigo']; ?></td>
			<td><?php echo $orcamento['orcamento_status_id']; ?></td>
			<td><?php echo $orcamento['projeto_id']; ?></td>
			<td><?php echo $orcamento['nome']; ?></td>
			<td><?php echo $orcamento['descricao']; ?></td>
			<td><?php echo $orcamento['observacao']; ?></td>
			<td><?php echo $orcamento['data_aprovacao']; ?></td>
			<td><?php echo $orcamento['data_inicio']; ?></td>
			<td><?php echo $orcamento['data_fim']; ?></td>
			<td><?php echo $orcamento['user_id']; ?></td>
			<td><?php echo $orcamento['empresa_id']; ?></td>
			<td><?php echo $orcamento['created']; ?></td>
			<td><?php echo $orcamento['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'orcamentos', 'action' => 'view', $orcamento['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'orcamentos', 'action' => 'edit', $orcamento['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'orcamentos', 'action' => 'delete', $orcamento['id']), null, __('Are you sure you want to delete # %s?', $orcamento['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Orcamento'), array('controller' => 'orcamentos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
