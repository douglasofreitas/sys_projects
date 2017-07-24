
<?php if($fatura['Fatura']['fatura_status_id'] == 1 & ($perfil_atual == 2 | $perfil_atual == 3) ): ?>
    <div class="span12" style="display: none" id="form_fatura_baixa">
        <div class="widget-box">
            <div class="widget-title">
            <span class="icon">
                    <i class="icon-search"></i>									
            </span>
                <h5>Baixa Manual </h5>

            </div>
            <div class="widget-content nopadding">
                <?php
                echo $this->Form->create('Fatura', array('url' => '/faturas/baixa_manual', 'class' => 'form-horizontal', 'id'=>'formulario_page', 'inputDefaults' => array('label' => false,'div' => false)));
                echo $this->Form->hidden('codigo', array('value' => $fatura['Fatura']['codigo']));
                ?>
                <div class="control-group">
                    <label class="control-label">Forma de pagamento </label>
                    <div class="controls">
                        <?php echo $this->Form->select('empresas_meiopagamento_id', $select_meioPagamentos,  array('empty' => false));	  ?>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Data do pagamento</label>
                    <div class="controls">
                        <?php echo $this->Form->text('data_pagamento_form', array('class' => 'datepicker', 'style' => 'width:100px', 'value' => date('d/m/Y'), 'data-date-format' => 'dd/mm/yyyy', 'data-date' =>  date('d/m/Y') )); ?>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Observação</label>
                    <div class="controls">
                        <?php echo $this->Form->textarea('observacao', array('style' => 'height: 60px;', 'value' => $fatura['Fatura']['observacao'])); ?>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>

                </form>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="span12" style="margin-left: 0px;">
    <div class="widget-box">
        <div class="widget-title">
            <span class="icon">
                    <i class="icon-search"></i>									
            </span>
            <h5>Fatura <?php echo $fatura['Fatura']['codigo']; ?></h5>

            <div class="buttons">

                <?php
                if($fatura['Fatura']['fatura_status_id'] == 1){
                    if($perfil_atual == 2 | $perfil_atual == 3){
                        echo $this->Html->link(
                            'Baixa Manual',
                            '#',
                            array('escape' => false, 'class' => 'btn btn-mini btn-primary', 'data-toggle' => 'modal', 'onclick' => 'exibe_form_fatura(); return false;')
                        );
                        echo $this->Html->link(
                            '<i class="icon-pencil"></i>',
                            '/faturas/edit/'.$fatura['Fatura']['codigo'],
                            array('escape' => false, 'class' => 'btn btn-mini tip-bottom', 'title' => 'Editar', 'style' => '')
                        );
                        echo $this->Html->link(
                            '<i class="icon-trash"></i>',
                            '/faturas/delete/'.$fatura['Fatura']['codigo'],
                            array('escape' => false, 'class' => 'btn btn-mini tip-bottom', 'title' => 'Remover', 'style' => ''),
                            'Deseja realmente remover a fatura do sistema? '
                        );
                    }
                }
                ?>

            </div>


        </div>
        <div class="widget-content nopadding">
            <?php
            echo $this->Form->create('Fatura', array('url' => '/faturas/', 'class' => 'form-horizontal', 'id'=>'formulario_page', 'inputDefaults' => array('label' => false,'div' => false)));
            echo $this->Form->hidden('1');
            ?>
            <div class="control-group">
                <label class="control-label">Nome</label>
                <div class="controls">
                    <?php echo $this->Form->text('nome', array('style' => 'width: 100%;', 'value' => $fatura['Fatura']['nome'], 'disabled')); ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Tipo</label>
                <div class="controls">
                    <?php
                    if($fatura['Fatura']['tipo_fatura'])
                        echo '<span class="badge badge-success">Entrada</span>';
                    else
                        echo '<span class="badge badge-important">Saída</span>';

                    ?>
                </div>

            </div>

            <div class="control-group">
                <label class="control-label">Descrição</label>
                <div class="controls">
                    <?php echo $this->Form->textarea('descricao', array('style' => 'height: 100px;', 'value' => $fatura['Fatura']['descricao'], 'disabled')); ?>
                </div>
            </div>

            <div class="control-group">
                <table>
                    <tr>
                        <td>
                            <label class="control-label">Valor</label>
                            <div class="controls">
                                <?php echo $this->Form->text('valor', array('style' => 'width: 100px;', 'value' => 'R$ '.number_format($fatura['Fatura']['valor'], 2, ',', '.'), 'disabled')); ?>

                            </div>
                        </td>
                        <td>
                            <label class="control-label">Vencimento</label>
                            <div class="controls">
                                <?php echo $this->Form->text('valor', array('style' => 'width: 100px;', 'value' => (!empty($fatura['Fatura']['data_vencimento']))?date('d/m/Y', strtotime($fatura['Fatura']['data_vencimento'])):'', 'disabled')); ?>

                            </div>
                        </td>
                        <td>
                            <label class="control-label"><?php echo $origem; ?></label>
                            <div class="controls">
                                <?php
                                echo $this->Html->link(
                                    $origem_link_nome,
                                    $origem_link_url,
                                    array('escape' => true, 'style' => 'font-weight: bold;')
                                );
                                ?>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="control-group">
                <table>
                    <tr>
                        <td>
                            <label class="control-label">Status</label>
                            <div class="controls">
                                <?php echo $this->Form->select('fatura_status_id', $select_faturaStatus,  array('empty' => false, 'value' => $fatura['Fatura']['fatura_status_id'], 'style' => 'width: 115px;', 'disabled'));	  ?>

                            </div>
                        </td>
                        <td>
                            <label class="control-label">Pagamento</label>
                            <div class="controls">
                                <?php echo $this->Form->text('desconto', array('style' => 'width: 100px;', 'value' => (!empty($fatura['Fatura']['data_pagamento']))?date('d/m/Y', strtotime($fatura['Fatura']['data_pagamento'])):'', 'disabled')); ?>
                            </div>
                        </td>
                        <td>
                            <?php if(!empty($fatura['EmpresasMeiopagamento']['id'])): ?>
                                <label class="control-label">Forma de Pagamento</label>
                                <div class="controls">
                                    <?php echo $this->Form->text('forma_pagamento', array('style' => 'width: 100px;', 'value' => $meioPagamento[$fatura['EmpresasMeiopagamento']['id']]['nome'] , 'disabled')); ?>
                                </div>
                            <?php endif; ?>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="control-group">
                <label class="control-label">Observação</label>
                <div class="controls">
                    <?php echo $this->Form->textarea('observacao', array('style' => 'height: 60px;', 'value' => $fatura['Fatura']['observacao'], 'disabled')); ?>
                </div>
            </div>

            </form>
        </div>
    </div>
</div>


<div class="span12">
    <script type="text/javascript">
        function exibe_form_fatura() {
            if ( $("#form_fatura_baixa").is(":visible") )
                $("#form_fatura_baixa").hide("fast");
            else
                $("#form_fatura_baixa").show("fast");
            return false;
        }
    </script>

</div>