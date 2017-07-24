<div class="acessos view">
<h2><?php  echo __('Acesso'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($acesso['Acesso']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($acesso['User']['id'], array('controller' => 'users', 'action' => 'view', $acesso['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Empresa'); ?></dt>
		<dd>
			<?php echo $this->Html->link($acesso['Empresa']['id'], array('controller' => 'empresas', 'action' => 'view', $acesso['Empresa']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ip'); ?></dt>
		<dd>
			<?php echo h($acesso['Acesso']['ip']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ativo'); ?></dt>
		<dd>
			<?php echo h($acesso['Acesso']['ativo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($acesso['Acesso']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($acesso['Acesso']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Acesso'), array('action' => 'edit', $acesso['Acesso']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Acesso'), array('action' => 'delete', $acesso['Acesso']['id']), null, __('Are you sure you want to delete # %s?', $acesso['Acesso']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Acessos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Acesso'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Empresas'), array('controller' => 'empresas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa'), array('controller' => 'empresas', 'action' => 'add')); ?> </li>
	</ul>
</div>
