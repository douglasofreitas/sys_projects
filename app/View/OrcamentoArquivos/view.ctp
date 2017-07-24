<div class="orcamentoArquivos view">
<h2><?php  echo __('Orcamento Arquivo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($orcamentoArquivo['OrcamentoArquivo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Orcamento'); ?></dt>
		<dd>
			<?php echo $this->Html->link($orcamentoArquivo['Orcamento']['id'], array('controller' => 'orcamentos', 'action' => 'view', $orcamentoArquivo['Orcamento']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($orcamentoArquivo['OrcamentoArquivo']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?php echo h($orcamentoArquivo['OrcamentoArquivo']['descricao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Arquivo Nome'); ?></dt>
		<dd>
			<?php echo h($orcamentoArquivo['OrcamentoArquivo']['arquivo_nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Arquivo'); ?></dt>
		<dd>
			<?php echo h($orcamentoArquivo['OrcamentoArquivo']['arquivo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($orcamentoArquivo['OrcamentoArquivo']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($orcamentoArquivo['OrcamentoArquivo']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Orcamento Arquivo'), array('action' => 'edit', $orcamentoArquivo['OrcamentoArquivo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Orcamento Arquivo'), array('action' => 'delete', $orcamentoArquivo['OrcamentoArquivo']['id']), null, __('Are you sure you want to delete # %s?', $orcamentoArquivo['OrcamentoArquivo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Orcamento Arquivos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Orcamento Arquivo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orcamentos'), array('controller' => 'orcamentos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Orcamento'), array('controller' => 'orcamentos', 'action' => 'add')); ?> </li>
	</ul>
</div>
