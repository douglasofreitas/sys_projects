<div class="projetoStatuses view">
<h2><?php  echo __('Projeto Status'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($projetoStatus['ProjetoStatus']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($projetoStatus['ProjetoStatus']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($projetoStatus['ProjetoStatus']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($projetoStatus['ProjetoStatus']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Projeto Status'), array('action' => 'edit', $projetoStatus['ProjetoStatus']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Projeto Status'), array('action' => 'delete', $projetoStatus['ProjetoStatus']['id']), null, __('Are you sure you want to delete # %s?', $projetoStatus['ProjetoStatus']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Projeto Statuses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projeto Status'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projetos'), array('controller' => 'projetos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projeto'), array('controller' => 'projetos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Projetos'); ?></h3>
	<?php if (!empty($projetoStatus['Projeto'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Codigo'); ?></th>
		<th><?php echo __('Cliente Id'); ?></th>
		<th><?php echo __('Projeto Status Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Descricao'); ?></th>
		<th><?php echo __('Observacao'); ?></th>
		<th><?php echo __('Dados Conexao'); ?></th>
		<th><?php echo __('Data Inicio Desenvolvimento'); ?></th>
		<th><?php echo __('Data Fim Desenvolvimento'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Empresa Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($projetoStatus['Projeto'] as $projeto): ?>
		<tr>
			<td><?php echo $projeto['id']; ?></td>
			<td><?php echo $projeto['codigo']; ?></td>
			<td><?php echo $projeto['cliente_id']; ?></td>
			<td><?php echo $projeto['projeto_status_id']; ?></td>
			<td><?php echo $projeto['nome']; ?></td>
			<td><?php echo $projeto['descricao']; ?></td>
			<td><?php echo $projeto['observacao']; ?></td>
			<td><?php echo $projeto['dados_conexao']; ?></td>
			<td><?php echo $projeto['data_inicio_desenvolvimento']; ?></td>
			<td><?php echo $projeto['data_fim_desenvolvimento']; ?></td>
			<td><?php echo $projeto['user_id']; ?></td>
			<td><?php echo $projeto['empresa_id']; ?></td>
			<td><?php echo $projeto['created']; ?></td>
			<td><?php echo $projeto['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'projetos', 'action' => 'view', $projeto['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'projetos', 'action' => 'edit', $projeto['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'projetos', 'action' => 'delete', $projeto['id']), null, __('Are you sure you want to delete # %s?', $projeto['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Projeto'), array('controller' => 'projetos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
