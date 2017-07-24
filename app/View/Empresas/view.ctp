<div class="empresas view">
<h2><?php  echo __('Empresa'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($empresa['Empresa']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Empresa Status'); ?></dt>
		<dd>
			<?php echo $this->Html->link($empresa['EmpresaStatus']['id'], array('controller' => 'empresa_statuses', 'action' => 'view', $empresa['EmpresaStatus']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($empresa['Empresa']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?php echo h($empresa['Empresa']['descricao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Observacao'); ?></dt>
		<dd>
			<?php echo h($empresa['Empresa']['observacao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Logo Img'); ?></dt>
		<dd>
			<?php echo h($empresa['Empresa']['logo_img']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ativo'); ?></dt>
		<dd>
			<?php echo h($empresa['Empresa']['ativo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Chave Url'); ?></dt>
		<dd>
			<?php echo h($empresa['Empresa']['chave_url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($empresa['Empresa']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($empresa['Empresa']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Empresa'), array('action' => 'edit', $empresa['Empresa']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Empresa'), array('action' => 'delete', $empresa['Empresa']['id']), null, __('Are you sure you want to delete # %s?', $empresa['Empresa']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Empresas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Empresa Statuses'), array('controller' => 'empresa_statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa Status'), array('controller' => 'empresa_statuses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Caixas'), array('controller' => 'caixas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Caixa'), array('controller' => 'caixas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Empresa Configs'), array('controller' => 'empresa_configs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa Config'), array('controller' => 'empresa_configs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Empresa Layouts'), array('controller' => 'empresa_layouts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa Layout'), array('controller' => 'empresa_layouts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Fornecedors'), array('controller' => 'fornecedors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fornecedor'), array('controller' => 'fornecedors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orcamento Item Defaults'), array('controller' => 'orcamento_item_defaults', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Orcamento Item Default'), array('controller' => 'orcamento_item_defaults', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orcamentos'), array('controller' => 'orcamentos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Orcamento'), array('controller' => 'orcamentos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projetos'), array('controller' => 'projetos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projeto'), array('controller' => 'projetos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cidades'), array('controller' => 'cidades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cidade'), array('controller' => 'cidades', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Meiopagamentos'), array('controller' => 'meiopagamentos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meiopagamento'), array('controller' => 'meiopagamentos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Caixas'); ?></h3>
	<?php if (!empty($empresa['Caixa'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Codigo'); ?></th>
		<th><?php echo __('Conta Pagar Id'); ?></th>
		<th><?php echo __('Conta Receber Id'); ?></th>
		<th><?php echo __('Empresa Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Descricao'); ?></th>
		<th><?php echo __('Valor Entrada'); ?></th>
		<th><?php echo __('Valor Saida'); ?></th>
		<th><?php echo __('Saldo'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($empresa['Caixa'] as $caixa): ?>
		<tr>
			<td><?php echo $caixa['id']; ?></td>
			<td><?php echo $caixa['codigo']; ?></td>
			<td><?php echo $caixa['conta_pagar_id']; ?></td>
			<td><?php echo $caixa['conta_receber_id']; ?></td>
			<td><?php echo $caixa['empresa_id']; ?></td>
			<td><?php echo $caixa['nome']; ?></td>
			<td><?php echo $caixa['descricao']; ?></td>
			<td><?php echo $caixa['valor_entrada']; ?></td>
			<td><?php echo $caixa['valor_saida']; ?></td>
			<td><?php echo $caixa['saldo']; ?></td>
			<td><?php echo $caixa['created']; ?></td>
			<td><?php echo $caixa['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'caixas', 'action' => 'view', $caixa['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'caixas', 'action' => 'edit', $caixa['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'caixas', 'action' => 'delete', $caixa['id']), null, __('Are you sure you want to delete # %s?', $caixa['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Caixa'), array('controller' => 'caixas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Clientes'); ?></h3>
	<?php if (!empty($empresa['Cliente'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Codigo'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Cnpj'); ?></th>
		<th><?php echo __('Descricao'); ?></th>
		<th><?php echo __('Observacao'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Empresa Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($empresa['Cliente'] as $cliente): ?>
		<tr>
			<td><?php echo $cliente['id']; ?></td>
			<td><?php echo $cliente['codigo']; ?></td>
			<td><?php echo $cliente['nome']; ?></td>
			<td><?php echo $cliente['cnpj']; ?></td>
			<td><?php echo $cliente['descricao']; ?></td>
			<td><?php echo $cliente['observacao']; ?></td>
			<td><?php echo $cliente['user_id']; ?></td>
			<td><?php echo $cliente['empresa_id']; ?></td>
			<td><?php echo $cliente['created']; ?></td>
			<td><?php echo $cliente['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'clientes', 'action' => 'view', $cliente['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'clientes', 'action' => 'edit', $cliente['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'clientes', 'action' => 'delete', $cliente['id']), null, __('Are you sure you want to delete # %s?', $cliente['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Empresa Configs'); ?></h3>
	<?php if (!empty($empresa['EmpresaConfig'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Empresa Id'); ?></th>
		<th><?php echo __('Dias Chamado Vencimento'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Mail Username'); ?></th>
		<th><?php echo __('Mail Password'); ?></th>
		<th><?php echo __('Mail Host'); ?></th>
		<th><?php echo __('Mail Tsl'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($empresa['EmpresaConfig'] as $empresaConfig): ?>
		<tr>
			<td><?php echo $empresaConfig['id']; ?></td>
			<td><?php echo $empresaConfig['empresa_id']; ?></td>
			<td><?php echo $empresaConfig['dias_chamado_vencimento']; ?></td>
			<td><?php echo $empresaConfig['created']; ?></td>
			<td><?php echo $empresaConfig['modified']; ?></td>
			<td><?php echo $empresaConfig['mail_username']; ?></td>
			<td><?php echo $empresaConfig['mail_password']; ?></td>
			<td><?php echo $empresaConfig['mail_host']; ?></td>
			<td><?php echo $empresaConfig['mail_tsl']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'empresa_configs', 'action' => 'view', $empresaConfig['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'empresa_configs', 'action' => 'edit', $empresaConfig['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'empresa_configs', 'action' => 'delete', $empresaConfig['id']), null, __('Are you sure you want to delete # %s?', $empresaConfig['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Empresa Config'), array('controller' => 'empresa_configs', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Empresa Layouts'); ?></h3>
	<?php if (!empty($empresa['EmpresaLayout'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Empresa Id'); ?></th>
		<th><?php echo __('Background'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($empresa['EmpresaLayout'] as $empresaLayout): ?>
		<tr>
			<td><?php echo $empresaLayout['id']; ?></td>
			<td><?php echo $empresaLayout['empresa_id']; ?></td>
			<td><?php echo $empresaLayout['background']; ?></td>
			<td><?php echo $empresaLayout['created']; ?></td>
			<td><?php echo $empresaLayout['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'empresa_layouts', 'action' => 'view', $empresaLayout['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'empresa_layouts', 'action' => 'edit', $empresaLayout['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'empresa_layouts', 'action' => 'delete', $empresaLayout['id']), null, __('Are you sure you want to delete # %s?', $empresaLayout['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Empresa Layout'), array('controller' => 'empresa_layouts', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Fornecedors'); ?></h3>
	<?php if (!empty($empresa['Fornecedor'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Codigo'); ?></th>
		<th><?php echo __('Empresa Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Ativo'); ?></th>
		<th><?php echo __('Descricao'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($empresa['Fornecedor'] as $fornecedor): ?>
		<tr>
			<td><?php echo $fornecedor['id']; ?></td>
			<td><?php echo $fornecedor['codigo']; ?></td>
			<td><?php echo $fornecedor['empresa_id']; ?></td>
			<td><?php echo $fornecedor['nome']; ?></td>
			<td><?php echo $fornecedor['ativo']; ?></td>
			<td><?php echo $fornecedor['descricao']; ?></td>
			<td><?php echo $fornecedor['user_id']; ?></td>
			<td><?php echo $fornecedor['created']; ?></td>
			<td><?php echo $fornecedor['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'fornecedors', 'action' => 'view', $fornecedor['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'fornecedors', 'action' => 'edit', $fornecedor['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'fornecedors', 'action' => 'delete', $fornecedor['id']), null, __('Are you sure you want to delete # %s?', $fornecedor['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Fornecedor'), array('controller' => 'fornecedors', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Orcamento Item Defaults'); ?></h3>
	<?php if (!empty($empresa['OrcamentoItemDefault'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Codigo'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Descricao'); ?></th>
		<th><?php echo __('Observacao'); ?></th>
		<th><?php echo __('Valor'); ?></th>
		<th><?php echo __('Quantidade'); ?></th>
		<th><?php echo __('Empresa Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($empresa['OrcamentoItemDefault'] as $orcamentoItemDefault): ?>
		<tr>
			<td><?php echo $orcamentoItemDefault['id']; ?></td>
			<td><?php echo $orcamentoItemDefault['codigo']; ?></td>
			<td><?php echo $orcamentoItemDefault['nome']; ?></td>
			<td><?php echo $orcamentoItemDefault['descricao']; ?></td>
			<td><?php echo $orcamentoItemDefault['observacao']; ?></td>
			<td><?php echo $orcamentoItemDefault['valor']; ?></td>
			<td><?php echo $orcamentoItemDefault['quantidade']; ?></td>
			<td><?php echo $orcamentoItemDefault['empresa_id']; ?></td>
			<td><?php echo $orcamentoItemDefault['created']; ?></td>
			<td><?php echo $orcamentoItemDefault['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'orcamento_item_defaults', 'action' => 'view', $orcamentoItemDefault['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'orcamento_item_defaults', 'action' => 'edit', $orcamentoItemDefault['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'orcamento_item_defaults', 'action' => 'delete', $orcamentoItemDefault['id']), null, __('Are you sure you want to delete # %s?', $orcamentoItemDefault['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Orcamento Item Default'), array('controller' => 'orcamento_item_defaults', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Orcamentos'); ?></h3>
	<?php if (!empty($empresa['Orcamento'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Codigo'); ?></th>
		<th><?php echo __('Orcamento Status Id'); ?></th>
		<th><?php echo __('Projeto Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Descricao'); ?></th>
		<th><?php echo __('Observacao'); ?></th>
		<th><?php echo __('Data Aprovacao'); ?></th>
		<th><?php echo __('Data Inicio'); ?></th>
		<th><?php echo __('Data Fim'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Empresa Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($empresa['Orcamento'] as $orcamento): ?>
		<tr>
			<td><?php echo $orcamento['id']; ?></td>
			<td><?php echo $orcamento['codigo']; ?></td>
			<td><?php echo $orcamento['orcamento_status_id']; ?></td>
			<td><?php echo $orcamento['projeto_id']; ?></td>
			<td><?php echo $orcamento['nome']; ?></td>
			<td><?php echo $orcamento['descricao']; ?></td>
			<td><?php echo $orcamento['observacao']; ?></td>
			<td><?php echo $orcamento['data_aprovacao']; ?></td>
			<td><?php echo $orcamento['data_inicio']; ?></td>
			<td><?php echo $orcamento['data_fim']; ?></td>
			<td><?php echo $orcamento['user_id']; ?></td>
			<td><?php echo $orcamento['empresa_id']; ?></td>
			<td><?php echo $orcamento['created']; ?></td>
			<td><?php echo $orcamento['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'orcamentos', 'action' => 'view', $orcamento['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'orcamentos', 'action' => 'edit', $orcamento['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'orcamentos', 'action' => 'delete', $orcamento['id']), null, __('Are you sure you want to delete # %s?', $orcamento['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Orcamento'), array('controller' => 'orcamentos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Projetos'); ?></h3>
	<?php if (!empty($empresa['Projeto'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Codigo'); ?></th>
		<th><?php echo __('Cliente Id'); ?></th>
		<th><?php echo __('Projeto Status Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Descricao'); ?></th>
		<th><?php echo __('Observacao'); ?></th>
		<th><?php echo __('Dados Conexao'); ?></th>
		<th><?php echo __('Data Inicio Desenvolvimento'); ?></th>
		<th><?php echo __('Data Fim Desenvolvimento'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Empresa Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($empresa['Projeto'] as $projeto): ?>
		<tr>
			<td><?php echo $projeto['id']; ?></td>
			<td><?php echo $projeto['codigo']; ?></td>
			<td><?php echo $projeto['cliente_id']; ?></td>
			<td><?php echo $projeto['projeto_status_id']; ?></td>
			<td><?php echo $projeto['nome']; ?></td>
			<td><?php echo $projeto['descricao']; ?></td>
			<td><?php echo $projeto['observacao']; ?></td>
			<td><?php echo $projeto['dados_conexao']; ?></td>
			<td><?php echo $projeto['data_inicio_desenvolvimento']; ?></td>
			<td><?php echo $projeto['data_fim_desenvolvimento']; ?></td>
			<td><?php echo $projeto['user_id']; ?></td>
			<td><?php echo $projeto['empresa_id']; ?></td>
			<td><?php echo $projeto['created']; ?></td>
			<td><?php echo $projeto['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'projetos', 'action' => 'view', $projeto['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'projetos', 'action' => 'edit', $projeto['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'projetos', 'action' => 'delete', $projeto['id']), null, __('Are you sure you want to delete # %s?', $projeto['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Projeto'), array('controller' => 'projetos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Cidades'); ?></h3>
	<?php if (!empty($empresa['Cidade'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Estado Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($empresa['Cidade'] as $cidade): ?>
		<tr>
			<td><?php echo $cidade['id']; ?></td>
			<td><?php echo $cidade['estado_id']; ?></td>
			<td><?php echo $cidade['nome']; ?></td>
			<td><?php echo $cidade['created']; ?></td>
			<td><?php echo $cidade['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'cidades', 'action' => 'view', $cidade['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'cidades', 'action' => 'edit', $cidade['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'cidades', 'action' => 'delete', $cidade['id']), null, __('Are you sure you want to delete # %s?', $cidade['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Cidade'), array('controller' => 'cidades', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Meiopagamentos'); ?></h3>
	<?php if (!empty($empresa['Meiopagamento'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Descricao'); ?></th>
		<th><?php echo __('Campo 1'); ?></th>
		<th><?php echo __('Campo 2'); ?></th>
		<th><?php echo __('Campo 3'); ?></th>
		<th><?php echo __('Campo 4'); ?></th>
		<th><?php echo __('Campo 5'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($empresa['Meiopagamento'] as $meiopagamento): ?>
		<tr>
			<td><?php echo $meiopagamento['id']; ?></td>
			<td><?php echo $meiopagamento['nome']; ?></td>
			<td><?php echo $meiopagamento['descricao']; ?></td>
			<td><?php echo $meiopagamento['campo_1']; ?></td>
			<td><?php echo $meiopagamento['campo_2']; ?></td>
			<td><?php echo $meiopagamento['campo_3']; ?></td>
			<td><?php echo $meiopagamento['campo_4']; ?></td>
			<td><?php echo $meiopagamento['campo_5']; ?></td>
			<td><?php echo $meiopagamento['created']; ?></td>
			<td><?php echo $meiopagamento['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'meiopagamentos', 'action' => 'view', $meiopagamento['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'meiopagamentos', 'action' => 'edit', $meiopagamento['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'meiopagamentos', 'action' => 'delete', $meiopagamento['id']), null, __('Are you sure you want to delete # %s?', $meiopagamento['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Meiopagamento'), array('controller' => 'meiopagamentos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($empresa['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Grupo'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Telefone'); ?></th>
		<th><?php echo __('Telefone2'); ?></th>
		<th><?php echo __('Celular'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Email2'); ?></th>
		<th><?php echo __('Endereco'); ?></th>
		<th><?php echo __('Profissao'); ?></th>
		<th><?php echo __('Cpf'); ?></th>
		<th><?php echo __('Observation'); ?></th>
		<th><?php echo __('Ativo'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($empresa['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['grupo']; ?></td>
			<td><?php echo $user['nome']; ?></td>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['telefone']; ?></td>
			<td><?php echo $user['telefone2']; ?></td>
			<td><?php echo $user['celular']; ?></td>
			<td><?php echo $user['email']; ?></td>
			<td><?php echo $user['email2']; ?></td>
			<td><?php echo $user['endereco']; ?></td>
			<td><?php echo $user['profissao']; ?></td>
			<td><?php echo $user['cpf']; ?></td>
			<td><?php echo $user['observation']; ?></td>
			<td><?php echo $user['ativo']; ?></td>
			<td><?php echo $user['created']; ?></td>
			<td><?php echo $user['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), null, __('Are you sure you want to delete # %s?', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
