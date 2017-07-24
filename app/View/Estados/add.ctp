<div class="estados form">
<?php echo $this->Form->create('Estado'); ?>
	<fieldset>
		<legend><?php echo __('Add Estado'); ?></legend>
	<?php
		echo $this->Form->input('nome');
		echo $this->Form->input('sigla');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Estados'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Cidades'), array('controller' => 'cidades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cidade'), array('controller' => 'cidades', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cidades Empresas'), array('controller' => 'cidades_empresas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cidades Empresa'), array('controller' => 'cidades_empresas', 'action' => 'add')); ?> </li>
	</ul>
</div>
