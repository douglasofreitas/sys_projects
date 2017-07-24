<div class="orcamentoItems view">
<h2><?php  echo __('Orcamento Item'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($orcamentoItem['OrcamentoItem']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Orcamento'); ?></dt>
		<dd>
			<?php echo $this->Html->link($orcamentoItem['Orcamento']['id'], array('controller' => 'orcamentos', 'action' => 'view', $orcamentoItem['Orcamento']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($orcamentoItem['OrcamentoItem']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?php echo h($orcamentoItem['OrcamentoItem']['descricao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Observacao'); ?></dt>
		<dd>
			<?php echo h($orcamentoItem['OrcamentoItem']['observacao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor'); ?></dt>
		<dd>
			<?php echo h($orcamentoItem['OrcamentoItem']['valor']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quantidade'); ?></dt>
		<dd>
			<?php echo h($orcamentoItem['OrcamentoItem']['quantidade']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($orcamentoItem['OrcamentoItem']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($orcamentoItem['OrcamentoItem']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Orcamento Item'), array('action' => 'edit', $orcamentoItem['OrcamentoItem']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Orcamento Item'), array('action' => 'delete', $orcamentoItem['OrcamentoItem']['id']), null, __('Are you sure you want to delete # %s?', $orcamentoItem['OrcamentoItem']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Orcamento Items'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Orcamento Item'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orcamentos'), array('controller' => 'orcamentos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Orcamento'), array('controller' => 'orcamentos', 'action' => 'add')); ?> </li>
	</ul>
</div>
