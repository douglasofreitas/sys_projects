
    <?php if(count($orcamentos)): ?>
    
    <table class="table table-bordered table-striped" style="">
                <thead>
            <tr>
                <th style="width: 51px;">Código</th>
                <th>Nome</th>
                <th>Valor</th>
                <th style="width: 50px;text-align: center;">Ações</th>
            </tr>
            </thead>
                <tbody>
            <?php
            $i = 0;
            foreach ($orcamentos as $orcamento){
                $class = null;
                if ($i++ % 2 == 0) {
                        $class = ' class="linha_impar"';
                }else{
                        $class = ' class="linha_par"';
                }
            ?>
            <tr<?php echo $class;?>>
                <td><?php echo $orcamento['codigo'] ?></td>
                <td><?php echo $orcamento['nome'] ?></td>
                <td>R$ <?php echo $orcamento['valor'] ?></td>
                <td>
                    <?php
                                echo $this->Html->link(
                                        'Associar',
                                        '/projetos/associa_orcamento/'.$id_item.'/'.$orcamento['codigo'],
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
    <?php else: ?>
        Não há orçamentos
    <?php endif; ?>
