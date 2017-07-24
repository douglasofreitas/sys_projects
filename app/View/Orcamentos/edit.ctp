<div class="orcamentos form">
<?php echo $this->Form->create('Orcamento'); ?>
	<fieldset>
		<legend><?php echo __('Edit Orcamento'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('codigo');
		echo $this->Form->input('orcamento_status_id');
		echo $this->Form->input('projeto_id');
		echo $this->Form->input('nome');
		echo $this->Form->input('descricao');
		echo $this->Form->input('observacao');
		echo $this->Form->input('data_aprovacao');
		echo $this->Form->input('data_inicio');
		echo $this->Form->input('data_fim');
		echo $this->Form->input('user_id');
		echo $this->Form->input('empresa_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Orcamento.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Orcamento.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Orcamentos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Orcamento Statuses'), array('controller' => 'orcamento_statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Orcamento Status'), array('controller' => 'orcamento_statuses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projetos'), array('controller' => 'projetos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projeto'), array('controller' => 'projetos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Empresas'), array('controller' => 'empresas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa'), array('controller' => 'empresas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Conta Recebers'), array('controller' => 'conta_recebers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conta Receber'), array('controller' => 'conta_recebers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orcamento Arquivos'), array('controller' => 'orcamento_arquivos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Orcamento Arquivo'), array('controller' => 'orcamento_arquivos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orcamento Items'), array('controller' => 'orcamento_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Orcamento Item'), array('controller' => 'orcamento_items', 'action' => 'add')); ?> </li>
	</ul>
</div>
