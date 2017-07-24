<div class="estados view">
<h2><?php  echo __('Estado'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($estado['Estado']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($estado['Estado']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sigla'); ?></dt>
		<dd>
			<?php echo h($estado['Estado']['sigla']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($estado['Estado']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($estado['Estado']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Estado'), array('action' => 'edit', $estado['Estado']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Estado'), array('action' => 'delete', $estado['Estado']['id']), null, __('Are you sure you want to delete # %s?', $estado['Estado']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Estados'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estado'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cidades'), array('controller' => 'cidades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cidade'), array('controller' => 'cidades', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cidades Empresas'), array('controller' => 'cidades_empresas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cidades Empresa'), array('controller' => 'cidades_empresas', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Cidades'); ?></h3>
	<?php if (!empty($estado['Cidade'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Estado Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($estado['Cidade'] as $cidade): ?>
		<tr>
			<td><?php echo $cidade['id']; ?></td>
			<td><?php echo $cidade['estado_id']; ?></td>
			<td><?php echo $cidade['nome']; ?></td>
			<td><?php echo $cidade['created']; ?></td>
			<td><?php echo $cidade['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'cidades', 'action' => 'view', $cidade['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'cidades', 'action' => 'edit', $cidade['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'cidades', 'action' => 'delete', $cidade['id']), null, __('Are you sure you want to delete # %s?', $cidade['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Cidade'), array('controller' => 'cidades', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Cidades Empresas'); ?></h3>
	<?php if (!empty($estado['CidadesEmpresa'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Estado Id'); ?></th>
		<th><?php echo __('Empresa Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Descricao'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($estado['CidadesEmpresa'] as $cidadesEmpresa): ?>
		<tr>
			<td><?php echo $cidadesEmpresa['id']; ?></td>
			<td><?php echo $cidadesEmpresa['estado_id']; ?></td>
			<td><?php echo $cidadesEmpresa['empresa_id']; ?></td>
			<td><?php echo $cidadesEmpresa['nome']; ?></td>
			<td><?php echo $cidadesEmpresa['descricao']; ?></td>
			<td><?php echo $cidadesEmpresa['created']; ?></td>
			<td><?php echo $cidadesEmpresa['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'cidades_empresas', 'action' => 'view', $cidadesEmpresa['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'cidades_empresas', 'action' => 'edit', $cidadesEmpresa['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'cidades_empresas', 'action' => 'delete', $cidadesEmpresa['id']), null, __('Are you sure you want to delete # %s?', $cidadesEmpresa['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Cidades Empresa'), array('controller' => 'cidades_empresas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
