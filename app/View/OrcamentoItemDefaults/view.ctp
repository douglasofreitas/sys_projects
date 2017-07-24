<div class="orcamentoItemDefaults view">
<h2><?php  echo __('Orcamento Item Default'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($orcamentoItemDefault['OrcamentoItemDefault']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Codigo'); ?></dt>
		<dd>
			<?php echo h($orcamentoItemDefault['OrcamentoItemDefault']['codigo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($orcamentoItemDefault['OrcamentoItemDefault']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?php echo h($orcamentoItemDefault['OrcamentoItemDefault']['descricao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Observacao'); ?></dt>
		<dd>
			<?php echo h($orcamentoItemDefault['OrcamentoItemDefault']['observacao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor'); ?></dt>
		<dd>
			<?php echo h($orcamentoItemDefault['OrcamentoItemDefault']['valor']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quantidade'); ?></dt>
		<dd>
			<?php echo h($orcamentoItemDefault['OrcamentoItemDefault']['quantidade']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Empresa'); ?></dt>
		<dd>
			<?php echo $this->Html->link($orcamentoItemDefault['Empresa']['id'], array('controller' => 'empresas', 'action' => 'view', $orcamentoItemDefault['Empresa']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($orcamentoItemDefault['OrcamentoItemDefault']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($orcamentoItemDefault['OrcamentoItemDefault']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Orcamento Item Default'), array('action' => 'edit', $orcamentoItemDefault['OrcamentoItemDefault']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Orcamento Item Default'), array('action' => 'delete', $orcamentoItemDefault['OrcamentoItemDefault']['id']), null, __('Are you sure you want to delete # %s?', $orcamentoItemDefault['OrcamentoItemDefault']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Orcamento Item Defaults'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Orcamento Item Default'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Empresas'), array('controller' => 'empresas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa'), array('controller' => 'empresas', 'action' => 'add')); ?> </li>
	</ul>
</div>
