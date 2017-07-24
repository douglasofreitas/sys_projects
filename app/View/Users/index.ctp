<?php
//echo $this->User->exibe_filtro();
?>

<div class="span12">
    <div class="widget-box">
        <div class="widget-title">
			<span class="icon">
				<i class="icon-th"></i>
			</span>
            <h5>Pessoas (Total: <?php echo $this->Paginator->counter(array('format' => __('{:count}'))); ?>)</h5>

            <?php
            echo '<div class="dataTables_paginate fg-buttonset ui-buttonset fg-buttonset-multi ui-buttonset-multi paging_full_numbers">';
            echo $this->Paginator->prev('Anterior', array('class' => 'previous fg-button ui-button ui-state-default '), 'Anterior', array('class' => 'previous fg-button ui-button ui-state-default ui-state-disabled', 'tag' => 'a'));
            echo '<span>';
            echo $this->Paginator->numbers(array('separator' => false, 'class' => 'fg-button ui-button ui-state-default',  'currentClass' => 'fg-button ui-button ui-state-default ui-state-disabled'));
            echo '</span>';
            echo $this->Paginator->next('Próxima', array('class' => 'next fg-button ui-button ui-state-default'), 'Próxima', array('class' => 'next fg-button ui-button ui-state-default ui-state-disabled', 'tag' => 'a'));
            echo '</div>';
            ?>
        </div>
        <div class="widget-content nopadding">

            <?php
            if(count($users)){
                ?>
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th style="width: 51px;"><?php echo $this->Paginator->sort('codigo', 'Código'); ?></th>
                        <th><?php echo $this->Paginator->sort('nome', 'Nome'); ?></th>
                        <th style="width: 235px;">E-mail</th>
                        <th style="width: 166px;">Perfis</th>
                        <th style="width: 60px;text-align: center;">Ações</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    foreach ($users as $user){
//                                            echo '<pre>';
//                                            print_r($user);
//                                            echo '</pre>';
                        ?>

                        <tr>
                            <td>
                                <?php
                                echo $user['User']['codigo'];
                                ?>
                            </td>
                            <td>
                                <?php echo $this->Html->link(
                                    $user['User']['nome'],
                                    '/users/view/'.$user['User']['codigo'],
                                    array('escape' => true, 'style' => 'font-weight: bold;')
                                ); ?>
                            </td>

                            <td><?php echo $user['User']['email'] ?></td>
                            <td>
                                <?php
                                $ponto = '';
                                foreach($user['User']['lista_perfis'] as $perfil){
                                    echo $ponto.$perfil;
                                    $ponto = '; ';
                                }
                                ?>
                            </td>
                            <td style="text-align: center;">
                                <?php
                                echo $this->Html->link(
                                    '<i class="icon-search"></i>',
                                    '/users/view/'.$user['User']['codigo'],
                                    array('escape' => false, 'class' => 'tip-bottom ', 'title' => 'Visualizar')
                                );
                                echo $this->Html->link(
                                    '<i class="icon-pencil"></i>',
                                    '/users/edit/'.$user['User']['codigo'],
                                    array('escape' => false, 'class' => 'tip-bottom ', 'title' => 'Editar')
                                );
                                ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                    </tbody>
                </table>

            <?php
            }else{
                echo '<br/>Não há pessoas<br/><br/>';
            }
            ?>
        </div>
    </div>
</div>

