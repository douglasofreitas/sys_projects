<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Sistema de projetos</title>
		<meta charset="UTF-8" />
		
		<meta name="title" content="" />
		<meta name="url" content="" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="charset" content="UTF-8" />
		<meta name="autor" content="Grupo DF" />
		<meta name="company" content="Grupo DF" />
		<meta name="revisit-after" content="5" />
		<link rev="made" href="" />
		
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		
		<?php
		echo $this->Html->css('bootstrap.min.css');	
		echo $this->Html->css('colorpicker.css');
		echo $this->Html->css('datepicker.css');
		echo $this->Html->css('uniform.css');
		echo $this->Html->css('chosen.css');
		echo $this->Html->css('fullcalendar.css');
                //echo $this->Html->css('select2.css');
		echo $this->Html->css('unicorn.main.css');
		echo '<link rel="stylesheet" href="' . $this->Html->url('/css/unicorn.grey.css') . '" class="skin-color" />';
		echo $this->Html->css('uniform.css');
		echo $this->Html->css('sistema.css');
		echo '<script type="text/javascript" src="' . $this->Html->url('/js/jquery.min.js') . '"></script>';
                echo '<script type="text/javascript" src="' . $this->Html->url('/js/jquery.validate.js') . '"></script>';
		?>
		<script type="text/javascript">
				function exibe_filtro() {
						if ( $("#filtro_div").is(":visible") )
								$("#filtro_div").hide("fast");
						else
								$("#filtro_div").show("fast");
						return false;
				}
		</script>
		
	</head>
	<body>
		
		
		<div id="header">
			<h1>
				<?php   
				if(!empty($empresa_core['Empresa'])){
                                        //carrega a imagem da empresa
                                        if(!empty($empresa_core['Empresa']['logo_img'])){
                                                        echo $this->Html->link(
                                                                        $this->Html->image('logos/'.$empresa_core['Empresa']['logo_img'], array('style' => 'width: 100%;position: absolute;top: 0px;;')),
                                                                        '/empresas/index',
                                                                        array('escape' => false)
                                                        ); 	
                                        }else{
                                                        //ainda não tem logo, usar uma imagem padrão
                                                        echo $this->Html->link(
                                                                        $this->Html->image('logos/default.png', array('style' => 'width: 100%;position: absolute;top: 0px;;')),
                                                                        '/empresas/index',
                                                                        array('escape' => false)
                                                        ); 	
                                        }
				}else{
						//sem evento selecionado
						echo $this->Html->link(
								$this->Html->image('logos/default.png', array('style' => 'width: 100%;position: absolute;top: 0px;')),
								'/empresas/index',
								array('escape' => false)
						); 							
				}
				?>
			</h1>
		</div>
		
		<div id="search">
			<?php //echo $this->element('perfil_bar');  ?>
		</div>
		<div id="user-nav" class="navbar navbar-inverse">
            <ul class="nav btn-group">
                <li class="btn btn-inverse dropdown" id="menu-messages">
                    <a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle">
                        <i class="icon icon-user"></i> <span class="text">Perfis</span>  <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <?php 
                        //exibir lista de perfis do usuário.
                        foreach($_SESSION['UserPerfil'] as $perfil){
                            echo '<li>'.$this->Html->link(
                                $perfil['Perfil']['nome'], 
                                '/users/muda_perfil/'.$perfil['Perfil']['id'], 
                                array('escape' => false, 'class' => 'sAdd')).'</li>';
                        }
                        ?>
                    </ul>
                </li>
                
                <li class="btn btn-inverse">
					<?php echo $this->Html->link('<i class="icon icon-share-alt"></i> <span class="text">Sair</span>', '/users/logout', array('escape' => false)) ?>
				</li>
            </ul>
        </div>
                
		<?php echo $this->element('side_bar');  ?>
		
		<div id="content">
			<div id="content-header">
				
				<?php
					echo '<h1>'.$this->getVar('titulo_page').'</h1>'; 
				?>
				
				<div class="btn-group" id="atalhos">
					<?php echo $this->element('atalhos');  ?>
				
				</div>
			</div>
			<div id="breadcrumb">
                            
                                
                            
				<?php echo $this->element('navegacao');  ?>
				
				
			</div>
			<div class="container-fluid">
					<?php 
					//verifica existência de mensagem em popup
					echo $this->Session->flash();
					
					?>
				
                                <div class="row-fluid" >
					
					
					
					<?php echo $this->fetch('content'); ?>
					
				</div>
				
				<div class="row-fluid" style="position: absolute;bottom: 0px;">
					<div id="footer" class="span12">
						<?php echo date('Y'); ?> &copy; Sistema de projetos. Por <a href="https://www.grupodf.com">Grupo DF</a>
					</div>
				</div>
			</div>
		</div>
		
			<?php
			echo '<script type="text/javascript" src="' . $this->Html->url('/js/excanvas.min.js') . '"></script>';
			
			echo '<script type="text/javascript" src="' . $this->Html->url('/js/jquery.ui.custom.js') . '"></script>';
			echo '<script type="text/javascript" src="' . $this->Html->url('/js/bootstrap.min.js') . '"></script>';
			
			echo '<script type="text/javascript" src="' . $this->Html->url('/js/bootstrap-colorpicker.js') . '"></script>';
			echo '<script type="text/javascript" src="' . $this->Html->url('/js/bootstrap-datepicker.js') . '"></script>';
			echo '<script type="text/javascript" src="' . $this->Html->url('/js/jquery.uniform.js') . '"></script>';
			echo '<script type="text/javascript" src="' . $this->Html->url('/js/jquery.chosen.js') . '"></script>';
			
			echo '<script type="text/javascript" src="' . $this->Html->url('/js/jquery.flot.min.js') . '"></script>';
			echo '<script type="text/javascript" src="' . $this->Html->url('/js/jquery.flot.resize.js') . '"></script>';
			echo '<script type="text/javascript" src="' . $this->Html->url('/js/jquery.peity.min.js') . '"></script>';
			echo '<script type="text/javascript" src="' . $this->Html->url('/js/fullcalendar.min.js') . '"></script>';
			echo '<script type="text/javascript" src="' . $this->Html->url('/js/unicorn.js') . '"></script>';
			//echo '<script type="text/javascript" src="' . $this->Html->url('/js/unicorn.dashboard.js') . '"></script>';
			echo '<script type="text/javascript" src="' . $this->Html->url('/js/unicorn.form_common.js') . '"></script>';
                        //echo '<script type="text/javascript" src="' . $this->Html->url('/js/select2.js') . '"></script>';
			
			
			?>
            
            <?php echo $this->element('sql_dump'); ?>
	</body>
</html>
