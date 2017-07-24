<div class="interacaoArquivos view">
<h2><?php  echo __('Interacao Arquivo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($interacaoArquivo['InteracaoArquivo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Interacao'); ?></dt>
		<dd>
			<?php echo $this->Html->link($interacaoArquivo['Interacao']['id'], array('controller' => 'interacaos', 'action' => 'view', $interacaoArquivo['Interacao']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($interacaoArquivo['InteracaoArquivo']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?php echo h($interacaoArquivo['InteracaoArquivo']['descricao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Arquivo Nome'); ?></dt>
		<dd>
			<?php echo h($interacaoArquivo['InteracaoArquivo']['arquivo_nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Arquivo'); ?></dt>
		<dd>
			<?php echo h($interacaoArquivo['InteracaoArquivo']['arquivo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($interacaoArquivo['InteracaoArquivo']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($interacaoArquivo['InteracaoArquivo']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Interacao Arquivo'), array('action' => 'edit', $interacaoArquivo['InteracaoArquivo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Interacao Arquivo'), array('action' => 'delete', $interacaoArquivo['InteracaoArquivo']['id']), null, __('Are you sure you want to delete # %s?', $interacaoArquivo['InteracaoArquivo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Interacao Arquivos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Interacao Arquivo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Interacaos'), array('controller' => 'interacaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Interacao'), array('controller' => 'interacaos', 'action' => 'add')); ?> </li>
	</ul>
</div>
