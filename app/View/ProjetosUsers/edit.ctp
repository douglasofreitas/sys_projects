<div class="projetosUsers form">
<?php echo $this->Form->create('ProjetosUser'); ?>
	<fieldset>
		<legend><?php echo __('Edit Projetos User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('projeto_id');
		echo $this->Form->input('data_inicio');
		echo $this->Form->input('data_final');
		echo $this->Form->input('ativo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ProjetosUser.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ProjetosUser.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Projetos Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projetos'), array('controller' => 'projetos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projeto'), array('controller' => 'projetos', 'action' => 'add')); ?> </li>
	</ul>
</div>
