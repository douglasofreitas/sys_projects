<div class="chamadoTipos view">
<h2><?php  echo __('Chamado Tipo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($chamadoTipo['ChamadoTipo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($chamadoTipo['ChamadoTipo']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Img'); ?></dt>
		<dd>
			<?php echo h($chamadoTipo['ChamadoTipo']['img']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?php echo h($chamadoTipo['ChamadoTipo']['descricao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($chamadoTipo['ChamadoTipo']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($chamadoTipo['ChamadoTipo']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Chamado Tipo'), array('action' => 'edit', $chamadoTipo['ChamadoTipo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Chamado Tipo'), array('action' => 'delete', $chamadoTipo['ChamadoTipo']['id']), null, __('Are you sure you want to delete # %s?', $chamadoTipo['ChamadoTipo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Chamado Tipos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chamado Tipo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Chamados'), array('controller' => 'chamados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chamado'), array('controller' => 'chamados', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Chamados'); ?></h3>
	<?php if (!empty($chamadoTipo['Chamado'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Codigo'); ?></th>
		<th><?php echo __('Projeto Id'); ?></th>
		<th><?php echo __('Chamado Status Id'); ?></th>
		<th><?php echo __('Chamado Tipo Id'); ?></th>
		<th><?php echo __('Chamado Prioridade Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Descricao'); ?></th>
		<th><?php echo __('Observacao Oculto'); ?></th>
		<th><?php echo __('Data Finalizacao'); ?></th>
		<th><?php echo __('Date Inicio'); ?></th>
		<th><?php echo __('Oculto'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($chamadoTipo['Chamado'] as $chamado): ?>
		<tr>
			<td><?php echo $chamado['id']; ?></td>
			<td><?php echo $chamado['codigo']; ?></td>
			<td><?php echo $chamado['projeto_id']; ?></td>
			<td><?php echo $chamado['chamado_status_id']; ?></td>
			<td><?php echo $chamado['chamado_tipo_id']; ?></td>
			<td><?php echo $chamado['chamado_prioridade_id']; ?></td>
			<td><?php echo $chamado['nome']; ?></td>
			<td><?php echo $chamado['descricao']; ?></td>
			<td><?php echo $chamado['observacao_oculto']; ?></td>
			<td><?php echo $chamado['data_finalizacao']; ?></td>
			<td><?php echo $chamado['data_inicio']; ?></td>
			<td><?php echo $chamado['oculto']; ?></td>
			<td><?php echo $chamado['user_id']; ?></td>
			<td><?php echo $chamado['created']; ?></td>
			<td><?php echo $chamado['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'chamados', 'action' => 'view', $chamado['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'chamados', 'action' => 'edit', $chamado['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'chamados', 'action' => 'delete', $chamado['id']), null, __('Are you sure you want to delete # %s?', $chamado['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Chamado'), array('controller' => 'chamados', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
