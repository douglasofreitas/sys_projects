<div class="empresaConfigs view">
<h2><?php  echo __('Empresa Config'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($empresaConfig['EmpresaConfig']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Empresa'); ?></dt>
		<dd>
			<?php echo $this->Html->link($empresaConfig['Empresa']['id'], array('controller' => 'empresas', 'action' => 'view', $empresaConfig['Empresa']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dias Chamado Vencimento'); ?></dt>
		<dd>
			<?php echo h($empresaConfig['EmpresaConfig']['dias_chamado_vencimento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($empresaConfig['EmpresaConfig']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($empresaConfig['EmpresaConfig']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mail Username'); ?></dt>
		<dd>
			<?php echo h($empresaConfig['EmpresaConfig']['mail_username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mail Password'); ?></dt>
		<dd>
			<?php echo h($empresaConfig['EmpresaConfig']['mail_password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mail Host'); ?></dt>
		<dd>
			<?php echo h($empresaConfig['EmpresaConfig']['mail_host']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mail Tsl'); ?></dt>
		<dd>
			<?php echo h($empresaConfig['EmpresaConfig']['mail_tsl']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Empresa Config'), array('action' => 'edit', $empresaConfig['EmpresaConfig']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Empresa Config'), array('action' => 'delete', $empresaConfig['EmpresaConfig']['id']), null, __('Are you sure you want to delete # %s?', $empresaConfig['EmpresaConfig']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Empresa Configs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa Config'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Empresas'), array('controller' => 'empresas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa'), array('controller' => 'empresas', 'action' => 'add')); ?> </li>
	</ul>
</div>
