<?php 
echo $this->Html->link(
	'<i class="icon-home"></i> Home',
	'/users/info',
	array('escape' => false, 'class' => 'tip-bottom', 'title' => '')
);

if($menu_area == 'chamados'){
	echo $this->Html->link(
		'Chamados',
		'/chamados/index',
		array('escape' => false, 'class' => 'current', 'title' => '')
	);
}elseif($menu_area == 'projetos'){
	echo $this->Html->link(
		'Projetos',
		'/projetos/index',
		array('escape' => false, 'class' => 'current', 'title' => '')
	);
}elseif($menu_area == 'orcamentos'){
	echo $this->Html->link(
		'Orçamentos',
		'/orcamentos/index',
		array('escape' => false, 'class' => 'current', 'title' => '')
	);
}elseif($menu_area == 'horarios'){
	echo $this->Html->link(
		'Horários',
		'/horarios/index',
		array('escape' => false, 'class' => 'current', 'title' => '')
	);
}elseif($menu_area == 'relatorios'){
	echo $this->Html->link(
		'Relatórios',
		'/relatorios/index',
		array('escape' => false, 'class' => 'current', 'title' => '')
	);
}elseif($menu_area == 'clientes'){
	echo $this->Html->link(
		'Clientes',
		'/clientes/index',
		array('escape' => false, 'class' => 'current', 'title' => '')
	);
}elseif($menu_area == 'fornecedors'){
	echo $this->Html->link(
		'Fornecedores',
		'/fornecedors/index',
		array('escape' => false, 'class' => 'current', 'title' => '')
	);
}elseif($menu_area == 'users'){
	echo $this->Html->link(
		'Pessoas',
		'/users/index',
		array('escape' => false, 'class' => 'current', 'title' => '')
	);
}

?>