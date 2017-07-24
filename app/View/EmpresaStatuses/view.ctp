<div class="empresaStatuses view">
<h2><?php  echo __('Empresa Status'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($empresaStatus['EmpresaStatus']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($empresaStatus['EmpresaStatus']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($empresaStatus['EmpresaStatus']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($empresaStatus['EmpresaStatus']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Empresa Status'), array('action' => 'edit', $empresaStatus['EmpresaStatus']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Empresa Status'), array('action' => 'delete', $empresaStatus['EmpresaStatus']['id']), null, __('Are you sure you want to delete # %s?', $empresaStatus['EmpresaStatus']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Empresa Statuses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa Status'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Empresas'), array('controller' => 'empresas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa'), array('controller' => 'empresas', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Empresas'); ?></h3>
	<?php if (!empty($empresaStatus['Empresa'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Empresa Status Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Descricao'); ?></th>
		<th><?php echo __('Observacao'); ?></th>
		<th><?php echo __('Logo Img'); ?></th>
		<th><?php echo __('Ativo'); ?></th>
		<th><?php echo __('Chave Url'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($empresaStatus['Empresa'] as $empresa): ?>
		<tr>
			<td><?php echo $empresa['id']; ?></td>
			<td><?php echo $empresa['empresa_status_id']; ?></td>
			<td><?php echo $empresa['nome']; ?></td>
			<td><?php echo $empresa['descricao']; ?></td>
			<td><?php echo $empresa['observacao']; ?></td>
			<td><?php echo $empresa['logo_img']; ?></td>
			<td><?php echo $empresa['ativo']; ?></td>
			<td><?php echo $empresa['chave_url']; ?></td>
			<td><?php echo $empresa['created']; ?></td>
			<td><?php echo $empresa['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'empresas', 'action' => 'view', $empresa['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'empresas', 'action' => 'edit', $empresa['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'empresas', 'action' => 'delete', $empresa['id']), null, __('Are you sure you want to delete # %s?', $empresa['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Empresa'), array('controller' => 'empresas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
