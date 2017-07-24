<div class="cidadesEmpresas view">
<h2><?php  echo __('Cidades Empresa'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cidadesEmpresa['CidadesEmpresa']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estado'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cidadesEmpresa['Estado']['id'], array('controller' => 'estados', 'action' => 'view', $cidadesEmpresa['Estado']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Empresa'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cidadesEmpresa['Empresa']['id'], array('controller' => 'empresas', 'action' => 'view', $cidadesEmpresa['Empresa']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($cidadesEmpresa['CidadesEmpresa']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?php echo h($cidadesEmpresa['CidadesEmpresa']['descricao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($cidadesEmpresa['CidadesEmpresa']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($cidadesEmpresa['CidadesEmpresa']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cidades Empresa'), array('action' => 'edit', $cidadesEmpresa['CidadesEmpresa']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cidades Empresa'), array('action' => 'delete', $cidadesEmpresa['CidadesEmpresa']['id']), null, __('Are you sure you want to delete # %s?', $cidadesEmpresa['CidadesEmpresa']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Cidades Empresas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cidades Empresa'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Estados'), array('controller' => 'estados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estado'), array('controller' => 'estados', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Empresas'), array('controller' => 'empresas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa'), array('controller' => 'empresas', 'action' => 'add')); ?> </li>
	</ul>
</div>
