<div class="orcamentoArquivos index">
	<h2><?php echo __('Orcamento Arquivos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('orcamento_id'); ?></th>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th><?php echo $this->Paginator->sort('descricao'); ?></th>
			<th><?php echo $this->Paginator->sort('arquivo_nome'); ?></th>
			<th><?php echo $this->Paginator->sort('arquivo'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($orcamentoArquivos as $orcamentoArquivo): ?>
	<tr>
		<td><?php echo h($orcamentoArquivo['OrcamentoArquivo']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($orcamentoArquivo['Orcamento']['id'], array('controller' => 'orcamentos', 'action' => 'view', $orcamentoArquivo['Orcamento']['id'])); ?>
		</td>
		<td><?php echo h($orcamentoArquivo['OrcamentoArquivo']['nome']); ?>&nbsp;</td>
		<td><?php echo h($orcamentoArquivo['OrcamentoArquivo']['descricao']); ?>&nbsp;</td>
		<td><?php echo h($orcamentoArquivo['OrcamentoArquivo']['arquivo_nome']); ?>&nbsp;</td>
		<td><?php echo h($orcamentoArquivo['OrcamentoArquivo']['arquivo']); ?>&nbsp;</td>
		<td><?php echo h($orcamentoArquivo['OrcamentoArquivo']['created']); ?>&nbsp;</td>
		<td><?php echo h($orcamentoArquivo['OrcamentoArquivo']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $orcamentoArquivo['OrcamentoArquivo']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $orcamentoArquivo['OrcamentoArquivo']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $orcamentoArquivo['OrcamentoArquivo']['id']), null, __('Are you sure you want to delete # %s?', $orcamentoArquivo['OrcamentoArquivo']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Orcamento Arquivo'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Orcamentos'), array('controller' => 'orcamentos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Orcamento'), array('controller' => 'orcamentos', 'action' => 'add')); ?> </li>
	</ul>
</div>
