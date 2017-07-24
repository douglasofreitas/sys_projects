<div class="empresasMeiopagamentos form">
<?php echo $this->Form->create('EmpresasMeiopagamento'); ?>
	<fieldset>
		<legend><?php echo __('Edit Empresas Meiopagamento'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('empresa_id');
		echo $this->Form->input('meio_pagamento_id');
		echo $this->Form->input('desconto');
		echo $this->Form->input('resp_1');
		echo $this->Form->input('resp_2');
		echo $this->Form->input('resp_3');
		echo $this->Form->input('resp_4');
		echo $this->Form->input('resp_5');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('EmpresasMeiopagamento.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('EmpresasMeiopagamento.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Empresas Meiopagamentos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Empresas'), array('controller' => 'empresas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa'), array('controller' => 'empresas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Meio Pagamentos'), array('controller' => 'meio_pagamentos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meio Pagamento'), array('controller' => 'meio_pagamentos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Conta Pagars'), array('controller' => 'conta_pagars', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conta Pagar'), array('controller' => 'conta_pagars', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Conta Recebers'), array('controller' => 'conta_recebers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conta Receber'), array('controller' => 'conta_recebers', 'action' => 'add')); ?> </li>
	</ul>
</div>
