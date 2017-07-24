<div class="empresas form">
<?php echo $this->Form->create('Empresa'); ?>
	<fieldset>
		<legend><?php echo __('Edit Empresa'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('empresa_status_id');
		echo $this->Form->input('nome');
		echo $this->Form->input('descricao');
		echo $this->Form->input('observacao');
		echo $this->Form->input('logo_img');
		echo $this->Form->input('ativo');
		echo $this->Form->input('chave_url');
		echo $this->Form->input('Cidade');
		echo $this->Form->input('Meiopagamento');
		echo $this->Form->input('User');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Empresa.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Empresa.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Empresas'), array('action' => 'index')); ?></li>
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
