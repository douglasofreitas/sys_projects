<div class="meioPagamentos form">
<?php echo $this->Form->create('MeioPagamento'); ?>
	<fieldset>
		<legend><?php echo __('Edit Meio Pagamento'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nome');
		echo $this->Form->input('descricao');
		echo $this->Form->input('campo_1');
		echo $this->Form->input('campo_2');
		echo $this->Form->input('campo_3');
		echo $this->Form->input('campo_4');
		echo $this->Form->input('campo_5');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('MeioPagamento.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('MeioPagamento.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Meio Pagamentos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Empresas Meiopagamentos'), array('controller' => 'empresas_meiopagamentos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresas Meiopagamento'), array('controller' => 'empresas_meiopagamentos', 'action' => 'add')); ?> </li>
	</ul>
</div>
