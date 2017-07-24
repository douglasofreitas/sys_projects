<div class="orcamentoArquivos form">
<?php echo $this->Form->create('OrcamentoArquivo'); ?>
	<fieldset>
		<legend><?php echo __('Edit Orcamento Arquivo'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('orcamento_id');
		echo $this->Form->input('nome');
		echo $this->Form->input('descricao');
		echo $this->Form->input('arquivo_nome');
		echo $this->Form->input('arquivo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('OrcamentoArquivo.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('OrcamentoArquivo.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Orcamento Arquivos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Orcamentos'), array('controller' => 'orcamentos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Orcamento'), array('controller' => 'orcamentos', 'action' => 'add')); ?> </li>
	</ul>
</div>
