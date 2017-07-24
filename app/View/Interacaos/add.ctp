<div class="interacaos form">
<?php echo $this->Form->create('Interacao'); ?>
	<fieldset>
		<legend><?php echo __('Add Interacao'); ?></legend>
	<?php
		echo $this->Form->input('codigo');
		echo $this->Form->input('chamado_id');
		echo $this->Form->input('descricao');
		echo $this->Form->input('oculto');
		echo $this->Form->input('status_chamado_atual');
		echo $this->Form->input('status_chamado_novo');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Interacaos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Chamados'), array('controller' => 'chamados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chamado'), array('controller' => 'chamados', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Interacao Arquivos'), array('controller' => 'interacao_arquivos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Interacao Arquivo'), array('controller' => 'interacao_arquivos', 'action' => 'add')); ?> </li>
	</ul>
</div>
