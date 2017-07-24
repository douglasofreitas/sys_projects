

<div id="sidebar">
    
    <section class="user-profile">
            <figure>
                    <?php
                    if($user_auth['image_perfil'] == 'default_user.png')
                        echo $this->Html->image($user_auth['image_perfil'], array('style' => ''));
                    else
                        echo $this->Html->image('users/'.$user_auth['image_perfil'], array('style' => ''));
                    ?>
                    
                    
                    <figcaption>
                            <strong>
                                <?php 
                                $prim_nome = split(' ', trim($user_auth['nome']));
                                echo $this->Html->link($prim_nome[0], '/users/view_data', array('escape' => false, 'class' => ''));
                                ?>
                            </strong>
                            <em>
                                <?php
                                if($_SESSION['perfil_atual'] == 1)
                                    echo 'ROOT';
                                if($_SESSION['perfil_atual'] == 2)
                                    echo 'Administrador';
                                if($_SESSION['perfil_atual'] == 3)
                                    echo 'Gerente';
                                if($_SESSION['perfil_atual'] == 4)
                                    echo 'Desenvolvedor';
                                if($_SESSION['perfil_atual'] == 5)
                                    echo 'Cliente';
                                ?>
                            </em>
                            <ul>
                                    <li>
                                        <?php echo $this->Html->link('Perfil', '/users/view_data', array('escape' => false, 'class' => 'label')) ?>
                                    </li>
                                    <li>
                                        <?php echo $this->Html->link('Sair', '/users/logout', array('escape' => false, 'class' => 'label')) ?>
                                    </li>
                            </ul>
                    </figcaption>
            </figure>
    </section>
    
    
	<?php
	//echo $this->Html->link(
	//	'<i class="icon-home"></i> Home',
	//	'/empresas/index',
	//	array('escape' => false, 'class' => 'visible-phone')
	//);
	?>


<?php 
if(empty($user_auth)){

    ?>
		<ul>
			<li class="<?php if($menu_area == 'home' ) echo 'active'; ?>">
				<?php echo $this->Html->link('<i class="icon icon-home"></i> <span>Home</span>','/users/info',array('escape' => false, 'class' => '')); ?>
			</li>
		</ul>
    <?php   
}else{
	//
	//verificar o perfil atual do usuário
	
	if($perfil_atual == 1){  // Root
		?>
		<ul>
			<li class="">
				<?php echo $this->Html->link('<i class="icon icon-home"></i> <span>Perfil 1</span>','/empresas/index',array('escape' => false, 'class' => '')); ?>
			</li>
		</ul>


		<?php
	}elseif($perfil_atual == 2){  // Administrador
		?>

		
		<ul>
			<li class="<?php if($menu_area == 'users_home' ) echo 'active'; ?>">
				<?php 
                                if($num_chamados_desenvolvimento > 0)
                                    $num_chamados_text = '<span class="label">'.$num_chamados_desenvolvimento.'</span>';
                                else
                                    $num_chamados_text = '';
                                echo $this->Html->link('<i class="icon icon-home"></i> <span>Home</span>'.$num_chamados_text,'/users/info',array('escape' => false, 'class' => '')); 
                                ?>
			</li>
			<li class="<?php if($menu_area == 'horarios' ) echo 'active'; ?>">
				<?php echo $this->Html->link('<i class="icon icon-time"></i> <span>Horário</span>','/horarios/index',array('escape' => false, 'class' => '')); ?>
			</li>


            <li class="<?php if($menu_area == 'chamados'  ) echo 'active submenu open'; else echo 'submenu'; ?>">
                <a href="#"><i class="icon icon-bookmark"></i>
                    <span>Chamados</span>
                    <?php
                    if($num_chamados_analise > 0)
                        echo '<span class="label">'.$num_chamados_analise.'</span>';
                    ?>
                </a>
                <ul>
                    <li class=""><?php echo $this->Html->link('Criar chamado','/chamados/add',array()); ?></li>
                    <li class=""><?php echo $this->Html->link('Listar todos','/chamados/index',array()); ?></li>
                </ul>
            </li>

			<li class="<?php if($menu_area == 'projetos' ) echo 'active'; ?>">
				<?php echo $this->Html->link('<i class="icon icon-asterisk"></i> <span>Projetos</span>','/projetos/index',array('escape' => false, 'class' => '')); ?>
			</li>
			<li class="<?php if($menu_area == 'orcamentos' ) echo 'active'; ?>">
				<?php echo $this->Html->link('<i class="icon icon-tag"></i> <span>Orçamentos</span>','/orcamentos/index',array('escape' => false, 'class' => '')); ?>
			</li>
			<li class="<?php if($menu_area == 'users' || $menu_area == 'clientes' || $menu_area == 'fornecedors'  ) echo 'active submenu open'; else echo 'submenu'; ?>">
				<a href="#"><i class="icon icon-user"></i> <span>Entidades</span></a>
				<ul>
					<li class="<?php if($menu_area == 'clientes' ) echo 'active'; ?>"><?php echo $this->Html->link('Clientes','/clientes/index',array()); ?></li>
					<li class="<?php if($menu_area == 'fornecedors' ) echo 'active'; ?>"><?php echo $this->Html->link('Fornecedores','/fornecedors/index',array()); ?></li>
					<li class="<?php if($menu_area == 'users' ) echo 'active'; ?>"><?php echo $this->Html->link('Pessoas','/users/index',array()); ?></li>
				</ul>
			</li>
			
			<li class="<?php if($menu_area == 'faturas' ) echo 'active'; ?>">
				<?php echo $this->Html->link('<i class="icon icon-barcode"></i> <span>Faturas</span>','/faturas/index',array('escape' => false, 'class' => '')); ?>
			</li>
			<li class="<?php if($menu_area == 'relatorios' ) echo 'active'; ?>">
				<?php echo $this->Html->link('<i class="icon icon-check"></i> <span>Relatórios</span>','/relatorios/index',array('escape' => false, 'class' => '')); ?>
			</li>
			<li class="<?php if($menu_area == 'config' ) echo 'active'; ?>">
				<?php echo $this->Html->link('<i class="icon icon-cog"></i> <span>Configurações</span>','/empresas/config',array('escape' => false, 'class' => '')); ?>
			</li>
			
		</ul>



		<?php
	}elseif($perfil_atual == 3){ // Gerente
		?>


		<ul>
			<li class="">
				<?php echo $this->Html->link('<i class="icon icon-home"></i> <span>Perfil 3</span>','/users/info',array('escape' => false, 'class' => '')); ?>
			</li>
		</ul>


		<?php
	}elseif($perfil_atual == 4){  // Desenvolvedor
		?>


        <ul>
            <li class="">
                <?php echo $this->Html->link('<i class="icon icon-home"></i> <span>Home</span>','/users/info',array('escape' => false, 'class' => '')); ?>
            </li>
            <li class="<?php if($menu_area == 'chamados' ) echo 'active'; ?>">
                <?php
                echo $this->Html->link('<i class="icon icon-bookmark"></i> <span>Chamados</span>','/chamados/index',array('escape' => false, 'class' => ''));
                ?>
            </li>
            <li class="<?php if($menu_area == 'projetos' ) echo 'active'; ?>">
                <?php echo $this->Html->link('<i class="icon icon-asterisk"></i> <span>Projetos</span>','/projetos/index',array('escape' => false, 'class' => '')); ?>
            </li>

            <li class="<?php if($menu_area == 'users' ) echo 'active'; ?>">
                <?php echo $this->Html->link('<i class="icon icon-user"></i> <span>Pessoas</span>','/users/index',array('escape' => false, 'class' => '')); ?>
            </li>

        </ul>



		<?php
	}elseif($perfil_atual == 5){   //Cliente
		?>




		<ul>
			<li class="">
				<?php echo $this->Html->link('<i class="icon icon-home"></i> <span>Home</span>','/users/info',array('escape' => false, 'class' => '')); ?>
			</li>
            <li class="<?php if($menu_area == 'chamados' ) echo 'active'; ?>">
                <?php
                echo $this->Html->link('<i class="icon icon-bookmark"></i> <span>Chamados</span>','/chamados/index',array('escape' => false, 'class' => ''));
                ?>
            </li>
            <li class="<?php if($menu_area == 'projetos' ) echo 'active'; ?>">
                <?php echo $this->Html->link('<i class="icon icon-asterisk"></i> <span>Projetos</span>','/projetos/index',array('escape' => false, 'class' => '')); ?>
            </li>
            <li class="<?php if($menu_area == 'orcamentos' ) echo 'active'; ?>">
                <?php echo $this->Html->link('<i class="icon icon-tag"></i> <span>Orçamentos</span>','/orcamentos/index',array('escape' => false, 'class' => '')); ?>
            </li>
            <li class="<?php if($menu_area == 'faturas' ) echo 'active'; ?>">
                <?php echo $this->Html->link('<i class="icon icon-barcode"></i> <span>Faturas</span>','/faturas/index',array('escape' => false, 'class' => '')); ?>
            </li>
		</ul>




		<?php
	}else{    // Sem perfil
		?>




		<ul>
			<li class="">
				<?php echo $this->Html->link('<i class="icon icon-home"></i> <span>Home</span>','/users/info',array('escape' => false, 'class' => '')); ?>
			</li>
		</ul>
		<?php
        }
}
?> 

</div>