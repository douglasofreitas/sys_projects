<div class="orcamentoItems form">
<?php echo $this->Form->create('OrcamentoItem'); ?>
	<fieldset>
		<legend><?php echo __('Edit Orcamento Item'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('orcamento_id');
		echo $this->Form->input('nome');
		echo $this->Form->input('descricao');
		echo $this->Form->input('observacao');
		echo $this->Form->input('valor');
		echo $this->Form->input('quantidade');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('OrcamentoItem.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('OrcamentoItem.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Orcamento Items'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Orcamentos'), array('controller' => 'orcamentos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Orcamento'), array('controller' => 'orcamentos', 'action' => 'add')); ?> </li>
	</ul>
</div>
