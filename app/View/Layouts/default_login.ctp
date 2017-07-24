<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sistema de projetos</title>
        <meta charset="UTF-8" />

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <?php
        echo $this->Html->css('bootstrap.min.css');
        echo $this->Html->css('bootstrap-responsive.min.css');
        echo $this->Html->css('unicorn.login.css');
        
        
        $error_messagem =  $this->Session->flash();
        ?>
        
    </head>
    <body>
        <div id="logo">
            <?php   
            if(!empty($empresa_core['Empresa'])){
                //carrega a imagem da empresa
                if(!empty($empresa_core['Empresa']['logo_img'])){
                    echo $this->Html->image('logos/'.$empresa_core['Empresa']['logo_img'], array('style' => 'width: 238px;'));
                }else{
                    //ainda não tem logo, usar uma imagem padrão
                    echo $this->Html->image('logos/default.png', array('style' => 'width: 238px;')); 	
                }
            }else{
                //sem evento selecionado
                echo $this->Html->image('logos/default.png', array('style' => 'width: 238px;')); 							
            }
            ?>
        </div>
        <div id="loginbox" <?php if(!empty($error_messagem)) echo 'style="height: 230px;"' ?> >
            
            <?php 
            $posicao_form = '';
            if(!empty($error_messagem)){
                echo '<div>'.$error_messagem.'</div>';
                $posicao_form = 'top: 34px;';
            }
            ?>
            
            <?php echo $this->Form->create('User', array('style' => $posicao_form, 'url' => '/users/login', 'class' => 'form-vertical', 'id'=>'loginform', 'inputDefaults' => array('label' => false,'div' => false))); ?>
		<p>Informe o usuário e senha.</p>
                <div class="control-group">
                    <div class="controls">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-user"></i></span>
                            <?php echo $this->Form->input('username', array( 'placeholde' => 'Usuário')); ?>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-lock"></i></span>
                            <?php echo $this->Form->input('password', array( 'placeholde' => 'Senha')); ?>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link" id="to-recover">Esqueceu a senha?</a></span>
                    <span class="pull-right"><input type="submit" class="btn btn-inverse" value="Login" /></span>
                </div>
            </form>
            <?php echo $this->Form->create('User', array('style' => $posicao_form, 'url' => '/users/esqueceu_senha', 'class' => 'form-vertical', 'id'=>'recoverform', 'inputDefaults' => array('label' => false,'div' => false))); ?>
                <p>Informe seu e-mail para que as instruções sejam enviadas.</p>
                <div class="control-group">
                    <div class="controls">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-envelope"></i></span>
                            <?php echo $this->Form->input('email', array( 'placeholde' => 'E-mail')); ?>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link" id="to-login">&lt; Voltar para o login</a></span>
                    <span class="pull-right"><input type="submit" class="btn btn-inverse" value="Enviar e-mail" /></span>
                </div>
            </form>
        </div>
        
        
        <?php
        echo '<script type="text/javascript" src="' . $this->Html->url('/js/jquery.min.js') . '"></script>';
        echo '<script type="text/javascript" src="' . $this->Html->url('/js/unicorn.login.js') . '"></script>';

//        echo '<script type="text/javascript" src="' . $this->Html->url('/js/jquery.ui.custom.js') . '"></script>';
//        echo '<script type="text/javascript" src="' . $this->Html->url('/js/bootstrap.min.js') . '"></script>';
//        echo '<script type="text/javascript" src="' . $this->Html->url('/js/jquery.flot.min.js') . '"></script>';
//        echo '<script type="text/javascript" src="' . $this->Html->url('/js/jquery.flot.resize.js') . '"></script>';
//        echo '<script type="text/javascript" src="' . $this->Html->url('/js/jquery.peity.min.js') . '"></script>';
//        echo '<script type="text/javascript" src="' . $this->Html->url('/js/fullcalendar.min.js') . '"></script>';
//        echo '<script type="text/javascript" src="' . $this->Html->url('/js/unicorn.js') . '"></script>';
//        echo '<script type="text/javascript" src="' . $this->Html->url('/js/unicorn.dashboard.js') . '"></script>';

        ?>
    </body>
		
</html>
