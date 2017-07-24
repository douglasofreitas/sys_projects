<div class="projetosUsers view">
<h2><?php  echo __('Projetos User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($projetosUser['ProjetosUser']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projetosUser['User']['id'], array('controller' => 'users', 'action' => 'view', $projetosUser['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Projeto'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projetosUser['Projeto']['id'], array('controller' => 'projetos', 'action' => 'view', $projetosUser['Projeto']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Inicio'); ?></dt>
		<dd>
			<?php echo h($projetosUser['ProjetosUser']['data_inicio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Final'); ?></dt>
		<dd>
			<?php echo h($projetosUser['ProjetosUser']['data_final']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ativo'); ?></dt>
		<dd>
			<?php echo h($projetosUser['ProjetosUser']['ativo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($projetosUser['ProjetosUser']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($projetosUser['ProjetosUser']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Projetos User'), array('action' => 'edit', $projetosUser['ProjetosUser']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Projetos User'), array('action' => 'delete', $projetosUser['ProjetosUser']['id']), null, __('Are you sure you want to delete # %s?', $projetosUser['ProjetosUser']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Projetos Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projetos User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projetos'), array('controller' => 'projetos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projeto'), array('controller' => 'projetos', 'action' => 'add')); ?> </li>
	</ul>
</div>
