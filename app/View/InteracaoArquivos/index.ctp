<div class="interacaoArquivos index">
	<h2><?php echo __('Interacao Arquivos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('interacao_id'); ?></th>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th><?php echo $this->Paginator->sort('descricao'); ?></th>
			<th><?php echo $this->Paginator->sort('arquivo_nome'); ?></th>
			<th><?php echo $this->Paginator->sort('arquivo'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($interacaoArquivos as $interacaoArquivo): ?>
	<tr>
		<td><?php echo h($interacaoArquivo['InteracaoArquivo']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($interacaoArquivo['Interacao']['id'], array('controller' => 'interacaos', 'action' => 'view', $interacaoArquivo['Interacao']['id'])); ?>
		</td>
		<td><?php echo h($interacaoArquivo['InteracaoArquivo']['nome']); ?>&nbsp;</td>
		<td><?php echo h($interacaoArquivo['InteracaoArquivo']['descricao']); ?>&nbsp;</td>
		<td><?php echo h($interacaoArquivo['InteracaoArquivo']['arquivo_nome']); ?>&nbsp;</td>
		<td><?php echo h($interacaoArquivo['InteracaoArquivo']['arquivo']); ?>&nbsp;</td>
		<td><?php echo h($interacaoArquivo['InteracaoArquivo']['created']); ?>&nbsp;</td>
		<td><?php echo h($interacaoArquivo['InteracaoArquivo']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $interacaoArquivo['InteracaoArquivo']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $interacaoArquivo['InteracaoArquivo']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $interacaoArquivo['InteracaoArquivo']['id']), null, __('Are you sure you want to delete # %s?', $interacaoArquivo['InteracaoArquivo']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Interacao Arquivo'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Interacaos'), array('controller' => 'interacaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Interacao'), array('controller' => 'interacaos', 'action' => 'add')); ?> </li>
	</ul>
</div>
