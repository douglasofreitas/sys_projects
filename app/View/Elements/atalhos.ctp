<?php
//Inserir ícones de atalho

if(!empty($exibe_filtro))
	echo $this->Html->link(
		'<i class="icon-filter"></i>',
		'#',
		array('escape' => false, 'class' => 'btn btn-large tip-bottom', 'title' => 'Filtrar', 'id' => 'filtrar_link', 'onclick' => 'exibe_filtro(); return false;')
	);

	
if($menu_area == 'chamados' | $menu_area == 'projetos' | $menu_area == 'orcamentos' |
  $menu_area == 'clientes' | $menu_area == 'fornecedors' | $menu_area == 'users' | $menu_area == 'faturas' ){

    //Link para cadastrar novo item, de acordo com o perfil do usuário

    if($perfil_atual == 4){ // Desenvolvedor
        if($menu_area == 'chamados')
            echo $this->Html->link(
                '<i class="icon-plus"></i>',
                '/'.$menu_area.'/add',
                array('escape' => false, 'class' => 'btn btn-large tip-bottom', 'title' => 'Cadastrar novo')
            );
    }elseif($perfil_atual == 5){ // Cliente
        if($menu_area == 'orcamentos' | $menu_area == 'chamados')
            echo $this->Html->link(
                '<i class="icon-plus"></i>',
                '/'.$menu_area.'/add',
                array('escape' => false, 'class' => 'btn btn-large tip-bottom', 'title' => 'Cadastrar novo')
            );
    }elseif($perfil_atual == 3){ // Gerente
        echo $this->Html->link(
            '<i class="icon-plus"></i>',
            '/'.$menu_area.'/add',
            array('escape' => false, 'class' => 'btn btn-large tip-bottom', 'title' => 'Cadastrar novo')
        );
    }else{ // Demais perfis
        echo $this->Html->link(
            '<i class="icon-plus"></i>',
            '/'.$menu_area.'/add',
            array('escape' => false, 'class' => 'btn btn-large tip-bottom', 'title' => 'Cadastrar novo')
        );
    }





	echo $this->Html->link(
		'<i class="icon-list"></i>',
		'/'.$menu_area.'/index',
		array('escape' => false, 'class' => 'btn btn-large tip-bottom', 'title' => 'Listar')
	);	
}

?>