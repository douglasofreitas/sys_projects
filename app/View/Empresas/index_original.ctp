<div class="empresas index">
	<h2><?php echo __('Empresas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('empresa_status_id'); ?></th>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th><?php echo $this->Paginator->sort('descricao'); ?></th>
			<th><?php echo $this->Paginator->sort('observacao'); ?></th>
			<th><?php echo $this->Paginator->sort('logo_img'); ?></th>
			<th><?php echo $this->Paginator->sort('ativo'); ?></th>
			<th><?php echo $this->Paginator->sort('chave_url'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($empresas as $empresa): ?>
	<tr>
		<td><?php echo h($empresa['Empresa']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($empresa['EmpresaStatus']['id'], array('controller' => 'empresa_statuses', 'action' => 'view', $empresa['EmpresaStatus']['id'])); ?>
		</td>
		<td><?php echo h($empresa['Empresa']['nome']); ?>&nbsp;</td>
		<td><?php echo h($empresa['Empresa']['descricao']); ?>&nbsp;</td>
		<td><?php echo h($empresa['Empresa']['observacao']); ?>&nbsp;</td>
		<td><?php echo h($empresa['Empresa']['logo_img']); ?>&nbsp;</td>
		<td><?php echo h($empresa['Empresa']['ativo']); ?>&nbsp;</td>
		<td><?php echo h($empresa['Empresa']['chave_url']); ?>&nbsp;</td>
		<td><?php echo h($empresa['Empresa']['created']); ?>&nbsp;</td>
		<td><?php echo h($empresa['Empresa']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $empresa['Empresa']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $empresa['Empresa']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $empresa['Empresa']['id']), null, __('Are you sure you want to delete # %s?', $empresa['Empresa']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Empresa'), '/'.$this->request->params['empresa'].'/empresas/add'); ?></li>
		<li><?php echo $this->Html->link(__('List Empresa Statuses'), array('controller' => 'empresa_statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa Status'), array('controller' => 'empresa_statuses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Caixas'), array('controller' => 'caixas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Caixa'), array('controller' => 'caixas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Empresa Configs'), array('controller' => 'empresa_configs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa Config'), array('controller' => 'empresa_configs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Empresa Layouts'), array('controller' => 'empresa_layouts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa Layout'), array('controller' => 'empresa_layouts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Fornecedors'), array('controller' => 'fornecedors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fornecedor'), array('controller' => 'fornecedors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orcamento Item Defaults'), array('controller' => 'orcamento_item_defaults', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Orcamento Item Default'), array('controller' => 'orcamento_item_defaults', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orcamentos'), array('controller' => 'orcamentos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Orcamento'), array('controller' => 'orcamentos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projetos'), array('controller' => 'projetos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projeto'), array('controller' => 'projetos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cidades'), array('controller' => 'cidades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cidade'), array('controller' => 'cidades', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Meiopagamentos'), array('controller' => 'meiopagamentos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meiopagamento'), array('controller' => 'meiopagamentos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
