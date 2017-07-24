<div class="interacaoArquivos form">
<?php echo $this->Form->create('InteracaoArquivo'); ?>
	<fieldset>
		<legend><?php echo __('Edit Interacao Arquivo'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('interacao_id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('InteracaoArquivo.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('InteracaoArquivo.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Interacao Arquivos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Interacaos'), array('controller' => 'interacaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Interacao'), array('controller' => 'interacaos', 'action' => 'add')); ?> </li>
	</ul>
</div>
