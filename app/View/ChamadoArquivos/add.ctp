<div class="chamadoArquivos form">
<?php echo $this->Form->create('ChamadoArquivo'); ?>
	<fieldset>
		<legend><?php echo __('Add Chamado Arquivo'); ?></legend>
	<?php
		echo $this->Form->input('chamado_id');
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

		<li><?php echo $this->Html->link(__('List Chamado Arquivos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Chamados'), array('controller' => 'chamados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chamado'), array('controller' => 'chamados', 'action' => 'add')); ?> </li>
	</ul>
</div>
