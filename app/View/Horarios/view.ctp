<div class="horarios view">
<h2><?php  echo __('Horario'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($horario['Horario']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($horario['User']['id'], array('controller' => 'users', 'action' => 'view', $horario['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Empresa'); ?></dt>
		<dd>
			<?php echo $this->Html->link($horario['Empresa']['id'], array('controller' => 'empresas', 'action' => 'view', $horario['Empresa']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sistema'); ?></dt>
		<dd>
			<?php echo h($horario['Horario']['sistema']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ativo'); ?></dt>
		<dd>
			<?php echo h($horario['Horario']['ativo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($horario['Horario']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($horario['Horario']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Horario'), array('action' => 'edit', $horario['Horario']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Horario'), array('action' => 'delete', $horario['Horario']['id']), null, __('Are you sure you want to delete # %s?', $horario['Horario']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Horarios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Horario'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Empresas'), array('controller' => 'empresas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa'), array('controller' => 'empresas', 'action' => 'add')); ?> </li>
	</ul>
</div>
