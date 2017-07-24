<div class="interacaos view">
<h2><?php  echo __('Interacao'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($interacao['Interacao']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Codigo'); ?></dt>
		<dd>
			<?php echo h($interacao['Interacao']['codigo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Chamado'); ?></dt>
		<dd>
			<?php echo $this->Html->link($interacao['Chamado']['id'], array('controller' => 'chamados', 'action' => 'view', $interacao['Chamado']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?php echo h($interacao['Interacao']['descricao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Oculto'); ?></dt>
		<dd>
			<?php echo h($interacao['Interacao']['oculto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status Chamado Atual'); ?></dt>
		<dd>
			<?php echo h($interacao['Interacao']['status_chamado_atual']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status Chamado Novo'); ?></dt>
		<dd>
			<?php echo h($interacao['Interacao']['status_chamado_novo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($interacao['User']['id'], array('controller' => 'users', 'action' => 'view', $interacao['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($interacao['Interacao']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($interacao['Interacao']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Interacao'), array('action' => 'edit', $interacao['Interacao']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Interacao'), array('action' => 'delete', $interacao['Interacao']['id']), null, __('Are you sure you want to delete # %s?', $interacao['Interacao']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Interacaos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Interacao'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Chamados'), array('controller' => 'chamados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chamado'), array('controller' => 'chamados', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Interacao Arquivos'), array('controller' => 'interacao_arquivos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Interacao Arquivo'), array('controller' => 'interacao_arquivos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Interacao Arquivos'); ?></h3>
	<?php if (!empty($interacao['InteracaoArquivo'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Interacao Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Descricao'); ?></th>
		<th><?php echo __('Arquivo Nome'); ?></th>
		<th><?php echo __('Arquivo'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($interacao['InteracaoArquivo'] as $interacaoArquivo): ?>
		<tr>
			<td><?php echo $interacaoArquivo['id']; ?></td>
			<td><?php echo $interacaoArquivo['interacao_id']; ?></td>
			<td><?php echo $interacaoArquivo['nome']; ?></td>
			<td><?php echo $interacaoArquivo['descricao']; ?></td>
			<td><?php echo $interacaoArquivo['arquivo_nome']; ?></td>
			<td><?php echo $interacaoArquivo['arquivo']; ?></td>
			<td><?php echo $interacaoArquivo['created']; ?></td>
			<td><?php echo $interacaoArquivo['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'interacao_arquivos', 'action' => 'view', $interacaoArquivo['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'interacao_arquivos', 'action' => 'edit', $interacaoArquivo['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'interacao_arquivos', 'action' => 'delete', $interacaoArquivo['id']), null, __('Are you sure you want to delete # %s?', $interacaoArquivo['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Interacao Arquivo'), array('controller' => 'interacao_arquivos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
