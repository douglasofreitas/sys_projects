<?php 

if(empty($user_auth)){
	//sem usuário não exibe obções de perfil
	
}else{
	if(count($user_perfil))
	foreach($user_perfil as $perfil){
            if($_SESSION['perfil_atual'] = $perfil['Perfil']['id'])
                echo $this->Html->link($perfil['Perfil']['nome'], $perfil['Perfil']['url'], array('class' => 'active'));
            else
                echo $this->Html->link($perfil['Perfil']['nome'], $perfil['Perfil']['url']);
            
	}
	
}
?> 
