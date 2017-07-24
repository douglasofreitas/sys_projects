<div class="chamados form">
<?php echo $this->Form->create('Chamado'); ?>
	<fieldset>
		<legend><?php echo __('Add Chamado'); ?></legend>
	<?php
		echo $this->Form->input('codigo');
		echo $this->Form->input('projeto_id');
		echo $this->Form->input('chamado_status_id');
		echo $this->Form->input('chamado_tipo_id');
		echo $this->Form->input('chamado_prioridade_id');
		echo $this->Form->input('nome');
		echo $this->Form->input('descricao');
		echo $this->Form->input('observacao_oculto');
		echo $this->Form->input('data_finalizacao');
		echo $this->Form->input('date_inicio');
		echo $this->Form->input('oculto');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Chamados'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Projetos'), array('controller' => 'projetos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projeto'), array('controller' => 'projetos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Chamado Statuses'), array('controller' => 'chamado_statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chamado Status'), array('controller' => 'chamado_statuses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Chamado Tipos'), array('controller' => 'chamado_tipos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chamado Tipo'), array('controller' => 'chamado_tipos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Chamado Prioridades'), array('controller' => 'chamado_prioridades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chamado Prioridade'), array('controller' => 'chamado_prioridades', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Chamado Arquivos'), array('controller' => 'chamado_arquivos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chamado Arquivo'), array('controller' => 'chamado_arquivos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Interacaos'), array('controller' => 'interacaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Interacao'), array('controller' => 'interacaos', 'action' => 'add')); ?> </li>
	</ul>
</div>
