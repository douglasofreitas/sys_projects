<div class="projetos form">
<?php echo $this->Form->create('Projeto'); ?>
	<fieldset>
		<legend><?php echo __('Edit Projeto'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('codigo');
		echo $this->Form->input('cliente_id');
		echo $this->Form->input('projeto_status_id');
		echo $this->Form->input('nome');
		echo $this->Form->input('descricao');
		echo $this->Form->input('observacao');
		echo $this->Form->input('dados_conexao');
		echo $this->Form->input('data_inicio_desenvolvimento');
		echo $this->Form->input('data_fim_desenvolvimento');
		echo $this->Form->input('user_id');
		echo $this->Form->input('empresa_id');
		echo $this->Form->input('User');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Projeto.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Projeto.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Projetos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projeto Statuses'), array('controller' => 'projeto_statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projeto Status'), array('controller' => 'projeto_statuses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Empresas'), array('controller' => 'empresas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa'), array('controller' => 'empresas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Chamados'), array('controller' => 'chamados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chamado'), array('controller' => 'chamados', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orcamentos'), array('controller' => 'orcamentos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Orcamento'), array('controller' => 'orcamentos', 'action' => 'add')); ?> </li>
	</ul>
</div>
