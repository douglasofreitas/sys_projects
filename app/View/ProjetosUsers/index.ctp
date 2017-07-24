<div class="projetosUsers index">
	<h2><?php echo __('Projetos Users'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('projeto_id'); ?></th>
			<th><?php echo $this->Paginator->sort('data_inicio'); ?></th>
			<th><?php echo $this->Paginator->sort('data_final'); ?></th>
			<th><?php echo $this->Paginator->sort('ativo'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($projetosUsers as $projetosUser): ?>
	<tr>
		<td><?php echo h($projetosUser['ProjetosUser']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($projetosUser['User']['id'], array('controller' => 'users', 'action' => 'view', $projetosUser['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($projetosUser['Projeto']['id'], array('controller' => 'projetos', 'action' => 'view', $projetosUser['Projeto']['id'])); ?>
		</td>
		<td><?php echo h($projetosUser['ProjetosUser']['data_inicio']); ?>&nbsp;</td>
		<td><?php echo h($projetosUser['ProjetosUser']['data_final']); ?>&nbsp;</td>
		<td><?php echo h($projetosUser['ProjetosUser']['ativo']); ?>&nbsp;</td>
		<td><?php echo h($projetosUser['ProjetosUser']['created']); ?>&nbsp;</td>
		<td><?php echo h($projetosUser['ProjetosUser']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $projetosUser['ProjetosUser']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $projetosUser['ProjetosUser']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $projetosUser['ProjetosUser']['id']), null, __('Are you sure you want to delete # %s?', $projetosUser['ProjetosUser']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Projetos User'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projetos'), array('controller' => 'projetos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projeto'), array('controller' => 'projetos', 'action' => 'add')); ?> </li>
	</ul>
</div>
