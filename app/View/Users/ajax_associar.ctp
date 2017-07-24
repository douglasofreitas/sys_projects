<table class="table table-bordered table-striped" style="">
	<thead>
    <tr>
        <th style="width: 51px;">Código</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th style="width: 50px;text-align: center;">Ações</th>
    </tr>
	</thead>
	<tbody>
    
    <?php
    $i = 0;
    foreach ($usuarios as $user){
        $class = null;
        if ($i++ % 2 == 0) {
                $class = ' class="linha_impar"';
        }else{
                $class = ' class="linha_par"';
        }
    ?>
    <tr<?php echo $class;?>>
        <td><?php echo $user['codigo'] ?></td>
        <td><?php echo $user['nome'] ?></td>
        <td><?php echo $user['email'] ?></td>
        <td>
            <?php
			echo $this->Html->link(
				'Associar',
				'/'.$controller.'/associa_user/'.$id_item.'/'.$user['codigo'],
				array('escape' => false, 'class' => 'btn btn-mini btn-primary')
			);
            ?>
        </td>
    </tr>
    <?php
    }
    ?>
    
    </tbody>
</table>
