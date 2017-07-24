<div class="empresaConfigs form">
<?php echo $this->Form->create('EmpresaConfig'); ?>
	<fieldset>
		<legend><?php echo __('Add Empresa Config'); ?></legend>
	<?php
		echo $this->Form->input('empresa_id');
		echo $this->Form->input('dias_chamado_vencimento');
		echo $this->Form->input('mail_username');
		echo $this->Form->input('mail_password');
		echo $this->Form->input('mail_host');
		echo $this->Form->input('mail_tsl');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Empresa Configs'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Empresas'), array('controller' => 'empresas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa'), array('controller' => 'empresas', 'action' => 'add')); ?> </li>
	</ul>
</div>
