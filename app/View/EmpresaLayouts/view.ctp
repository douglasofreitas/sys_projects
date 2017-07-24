<div class="empresaLayouts view">
<h2><?php  echo __('Empresa Layout'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($empresaLayout['EmpresaLayout']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Empresa'); ?></dt>
		<dd>
			<?php echo $this->Html->link($empresaLayout['Empresa']['id'], array('controller' => 'empresas', 'action' => 'view', $empresaLayout['Empresa']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Background'); ?></dt>
		<dd>
			<?php echo h($empresaLayout['EmpresaLayout']['background']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($empresaLayout['EmpresaLayout']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($empresaLayout['EmpresaLayout']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Empresa Layout'), array('action' => 'edit', $empresaLayout['EmpresaLayout']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Empresa Layout'), array('action' => 'delete', $empresaLayout['EmpresaLayout']['id']), null, __('Are you sure you want to delete # %s?', $empresaLayout['EmpresaLayout']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Empresa Layouts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa Layout'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Empresas'), array('controller' => 'empresas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa'), array('controller' => 'empresas', 'action' => 'add')); ?> </li>
	</ul>
</div>
