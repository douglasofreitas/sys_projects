<div class="caixas view">
<h2><?php  echo __('Caixa'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($caixa['Caixa']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Codigo'); ?></dt>
		<dd>
			<?php echo h($caixa['Caixa']['codigo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Conta Pagar'); ?></dt>
		<dd>
			<?php echo $this->Html->link($caixa['ContaPagar']['id'], array('controller' => 'conta_pagars', 'action' => 'view', $caixa['ContaPagar']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Conta Receber'); ?></dt>
		<dd>
			<?php echo $this->Html->link($caixa['ContaReceber']['id'], array('controller' => 'conta_recebers', 'action' => 'view', $caixa['ContaReceber']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Empresa'); ?></dt>
		<dd>
			<?php echo $this->Html->link($caixa['Empresa']['id'], array('controller' => 'empresas', 'action' => 'view', $caixa['Empresa']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($caixa['Caixa']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?php echo h($caixa['Caixa']['descricao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor Entrada'); ?></dt>
		<dd>
			<?php echo h($caixa['Caixa']['valor_entrada']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor Saida'); ?></dt>
		<dd>
			<?php echo h($caixa['Caixa']['valor_saida']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Saldo'); ?></dt>
		<dd>
			<?php echo h($caixa['Caixa']['saldo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($caixa['Caixa']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($caixa['Caixa']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Caixa'), array('action' => 'edit', $caixa['Caixa']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Caixa'), array('action' => 'delete', $caixa['Caixa']['id']), null, __('Are you sure you want to delete # %s?', $caixa['Caixa']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Caixas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Caixa'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Conta Pagars'), array('controller' => 'conta_pagars', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conta Pagar'), array('controller' => 'conta_pagars', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Conta Recebers'), array('controller' => 'conta_recebers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conta Receber'), array('controller' => 'conta_recebers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Empresas'), array('controller' => 'empresas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa'), array('controller' => 'empresas', 'action' => 'add')); ?> </li>
	</ul>
</div>
