<div class="chamadoArquivos view">
<h2><?php  echo __('Chamado Arquivo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($chamadoArquivo['ChamadoArquivo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Chamado'); ?></dt>
		<dd>
			<?php echo $this->Html->link($chamadoArquivo['Chamado']['id'], array('controller' => 'chamados', 'action' => 'view', $chamadoArquivo['Chamado']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($chamadoArquivo['ChamadoArquivo']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?php echo h($chamadoArquivo['ChamadoArquivo']['descricao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Arquivo Nome'); ?></dt>
		<dd>
			<?php echo h($chamadoArquivo['ChamadoArquivo']['arquivo_nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Arquivo'); ?></dt>
		<dd>
			<?php echo h($chamadoArquivo['ChamadoArquivo']['arquivo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($chamadoArquivo['ChamadoArquivo']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($chamadoArquivo['ChamadoArquivo']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Chamado Arquivo'), array('action' => 'edit', $chamadoArquivo['ChamadoArquivo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Chamado Arquivo'), array('action' => 'delete', $chamadoArquivo['ChamadoArquivo']['id']), null, __('Are you sure you want to delete # %s?', $chamadoArquivo['ChamadoArquivo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Chamado Arquivos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chamado Arquivo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Chamados'), array('controller' => 'chamados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chamado'), array('controller' => 'chamados', 'action' => 'add')); ?> </li>
	</ul>
</div>
