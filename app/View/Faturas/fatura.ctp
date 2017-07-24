
<div class="span12" style="margin-left: 0px;">
    <div class="widget-box">
        <div class="widget-title">
            <span class="icon">
                    <i class="icon-search"></i>									
            </span>
            <h5>Fatura</h5>

            <div class="buttons">

            </div>

        </div>
        <div class="widget-content nopadding">
            <?php
            echo $this->Form->create('Fatura', array('url' => '/faturas/'.$action, 'class' => 'form-horizontal', 'id'=>'formulario_page', 'inputDefaults' => array('label' => false,'div' => false)));
            echo $this->Form->hidden('id');
            ?>
                    <div class="control-group">
                        <label class="control-label">Nome</label>
                        <div class="controls">
                            <?php echo $this->Form->text('nome', array('style' => ';')); ?>
                        </div>
                    </div>

            <div class="control-group">
                <label class="control-label">Origem</label>
                <div class="controls">
                    <?php echo $this->Form->select('origem', array('codigo_orcamento_id' => 'Orçamento', 'codigo_projeto_id' => 'Projeto', 'codigo_fornecedor_id' => 'Fornecedor', 'codigo_pessoa_id' => 'Pessoa'),  array('empty' => true, 'id' => 'select_origem', 'style' => ''));	  ?>
                </div>
            </div>

                    <div class="control-group">
                        <label class="control-label">Tipo</label>
                        <div class="controls">
                            <?php echo $this->Form->select('tipo_fatura', array('1' => 'Entrada', '0' => 'Saída'),  array('empty' => false, 'style' => 'width: 100px;'));	  ?>
                        </div>
                    </div>
            
                    <div class="control-group">
                        <label class="control-label" id="label_origem">Entidade</label>
                        <div class="controls">
                            <?php echo $this->Form->select('origem_id', array(),  array('empty' => true, 'id' => 'select_origem_id', 'style' => ';'));	  ?>
                        </div>
                    </div>

            <?php if($action != 'add'): ?>
            <div class="control-group">
                <label class="control-label">Status</label>
                <div class="controls">
                    <?php echo $this->Form->select('fatura_status_id', $select_faturaStatus,  array('empty' => false, 'style' => 'width: 100px;'));	  ?>

                </div>
            </div>
            <?php endif; ?>





                    <div class="control-group" >
                            <label class="control-label">Descrição</label>
                            <div class="controls">
                                    <?php echo $this->Form->textarea('descricao', array('style' => 'height: 100px;')); ?>
                            </div>
                    </div>

            <div class="control-group">
                <label class="control-label">Valor</label>
                <div class="controls">
                    <?php echo $this->Form->text('valor', array('style' => 'width: 100px;')); ?>

                </div>
            </div>
                    <div class="control-group">
                        <label class="control-label">Vencimento</label>
                        <div class="controls">
                            <?php echo $this->Form->text('data_vencimento_form', array('value' => date('d/m/Y', strtotime($this->request->data['Fatura']['data_vencimento'])),  'class' => 'datepicker', 'style' => 'width:100px', 'data-date-format' => 'dd/mm/yyyy' )); ?>

                        </div>
                    </div>
                    
                    <?php if($action != 'add'): ?>
            <div class="control-group">
                <label class="control-label">Pagamento</label>
                <div class="controls">
                    <?php
                    if(!empty($this->request->data['Fatura']['data_pagamento']))
                        echo $this->Form->text('data_pagamento_form', array('value' => date('d/m/Y', strtotime($this->request->data['Fatura']['data_pagamento'])),  'class' => 'datepicker', 'style' => 'width:100px', 'data-date-format' => 'dd/mm/yyyy' ));
                    else
                        echo $this->Form->text('data_pagamento_form', array('value' => '',  'class' => 'datepicker', 'style' => 'width:100px', 'data-date-format' => 'dd/mm/yyyy' ));
                    echo ' '.$this->Html->link('<i class="icon-remove"></i>', '#', array('escape' => false, 'title' => 'Limpar', 'onclick' => "$('#FaturaDataPagamentoForm').val(''); return false;" ));
                    ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Forma de Pagamento</label>
                <div class="controls">
                    <?php echo $this->Form->select('empresas_meiopagamento_id', $select_meioPagamentos,  array('empty' => true));	  ?>
                </div>
            </div>
                    <?php endif; ?>
            
                    <div class="control-group">
                            <label class="control-label">Observação</label>
                            <div class="controls">
                                    <?php echo $this->Form->textarea('observacao', array('style' => 'height: 60px;')); ?>
                            </div>
                    </div>
                    
                    <?php if($action == 'add'): ?>
                    <div class="control-group">
                        <label class="control-label">Múltiplas faturas?</label>
                        <div class="controls">
                            <?php echo $this->Form->checkbox('multiplas_faturas', array('value' => '1', 'onclick' => 'exibe_campo(\'gerar_parcelas\');')); ?>
                        </div>
                    </div>
                        <div id="gerar_parcelas" style="display:none">
                            <div class="control-group" >
                                <label class="control-label">Número de parcelas</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('num_parcelas', array('style' => 'width:20px', 'value' => '1')); ?>
                                </div>
                            </div>


                            <div class="control-group" >
                                <label class="control-label">Intervalo de meses</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('intervalo_meses', array('style' => 'width:20px', 'value' => '1')); ?>
                                </div>
                            </div>
                        </div>

                    <?php endif; ?>
            
            
                    <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
            
            </form>
        </div>
    </div>			
</div>

<script type="text/javascript">
    function exibe_campo(campo) {
        if ( $("#"+campo).is(":visible") )
            $("#"+campo).hide("fast");
        else
            $("#"+campo).show("fast");
    }
</script>

<script type="text/javascript">
	$(function() {
            
            //verifica se deve atualizar a lista de origem da fatura
            

            <?php if(!empty($this->request->data['Pessoa']['codigo'])): ?>
                $('#label_origem').html('' + <?php echo "'" . $this->Html->image('ajax-loader.gif') . "'" ?> + '');
                $('#select_origem').val('codigo_pessoa_id');
                // ajax para pessoas
                $.ajax({   
                    type: "GET",   
                    url: <?php echo "'" . $this->Html->url('/', true).$_SESSION['Empresa']['chave_url']. '/users/ajax_select' . "'"; ?>, 
                    data: "",   
                    success: function(msg){   
                        $('#select_origem_id').html(msg);
                        $('#label_origem').html('Pessoa');
                        $('#select_origem_id').val(<?php echo $this->request->data['Pessoa']['codigo'] ?>);
                    }
                });
            <?php endif; ?>
            <?php if(!empty($this->request->data['Orcamento']['codigo'])): ?>
                $('#label_origem').html('' + <?php echo "'" . $this->Html->image('ajax-loader.gif') . "'" ?> + '');
                $('#select_origem').val('codigo_orcamento_id');
                // ajax para pessoas
                $.ajax({   
                    type: "GET",   
                    url: <?php echo "'" . $this->Html->url('/', true).$_SESSION['Empresa']['chave_url']. '/orcamentos/ajax_select' . "'"; ?>, 
                    data: "",   
                    success: function(msg){   
                        $('#select_origem_id').html(msg);
                        $('#label_origem').html('Orçamento');
                        $('#select_origem_id').val(<?php echo $this->request->data['Orcamento']['codigo'] ?>);
                    }
                });
            
            <?php endif; ?>
            <?php if(!empty($this->request->data['Projeto']['codigo'])): ?>
                $('#label_origem').html('' + <?php echo "'" . $this->Html->image('ajax-loader.gif') . "'" ?> + '');
                $('#select_origem').val('codigo_projeto_id');
                // ajax para pessoas
                $.ajax({   
                    type: "GET",   
                    url: <?php echo "'" . $this->Html->url('/', true).$_SESSION['Empresa']['chave_url']. '/projetos/ajax_select' . "'"; ?>, 
                    data: "",   
                    success: function(msg){   
                        $('#select_origem_id').html(msg);
                        $('#label_origem').html('Projeto');
                        $('#select_origem_id').val(<?php echo $this->request->data['Projeto']['codigo'] ?>);
                    }
                });
            <?php endif; ?>
            <?php if(!empty($this->request->data['Fornecedor']['codigo'])): ?>
                $('#label_origem').html('' + <?php echo "'" . $this->Html->image('ajax-loader.gif') . "'" ?> + '');
                $('#select_origem').val('codigo_fornecedor_id');
                // ajax para pessoas
                $.ajax({   
                    type: "GET",   
                    url: <?php echo "'" . $this->Html->url('/', true).$_SESSION['Empresa']['chave_url']. '/fornecedors/ajax_select' . "'"; ?>, 
                    data: "",   
                    success: function(msg){   
                        $('#select_origem_id').html(msg);
                        $('#label_origem').html('Fornecedor');
                        $('#select_origem_id').val(<?php echo $this->request->data['Fornecedor']['codigo'] ?>);
                    }
                });
            <?php endif; ?>
            
            $('#select_origem').change(function()
                {   
                    $('#select_origem_id').html('');
                    
                    var origem  = $('#select_origem').val();
                    
                    if(origem == 'codigo_pessoa_id'){
                        $('#label_origem').html('' + <?php echo "'" . $this->Html->image('ajax-loader.gif') . "'" ?> + '');
                        // ajax para pessoas
                        $.ajax({   
                            type: "GET",   
                            url: <?php echo "'" . $this->Html->url('/', true).$_SESSION['Empresa']['chave_url']. '/users/ajax_select' . "'"; ?>, 
                            data: "",   
                            success: function(msg){   
                                $('#select_origem_id').html(msg);
                                $('#label_origem').html('Pessoa');
                            }
                        });
                    }
                    if(origem == 'codigo_orcamento_id'){
                        $('#label_origem').html('' + <?php echo "'" . $this->Html->image('ajax-loader.gif') . "'" ?> + '');
                        // ajax para pessoas
                        $.ajax({   
                            type: "GET",   
                            url: <?php echo "'" . $this->Html->url('/', true).$_SESSION['Empresa']['chave_url']. '/orcamentos/ajax_select' . "'"; ?>, 
                            data: "",   
                            success: function(msg){   
                                $('#select_origem_id').html(msg);
                                $('#label_origem').html('Orçamento');
                            }
                        });
                    }
                    if(origem == 'codigo_projeto_id'){
                        $('#label_origem').html('' + <?php echo "'" . $this->Html->image('ajax-loader.gif') . "'" ?> + '');
                        // ajax para pessoas
                        $.ajax({   
                            type: "GET",   
                            url: <?php echo "'" . $this->Html->url('/', true).$_SESSION['Empresa']['chave_url']. '/projetos/ajax_select' . "'"; ?>, 
                            data: "",   
                            success: function(msg){   
                                $('#select_origem_id').html(msg);
                                $('#label_origem').html('Projeto');
                            }
                        });
                    }
                    if(origem == 'codigo_fornecedor_id'){
                        $('#label_origem').html('' + <?php echo "'" . $this->Html->image('ajax-loader.gif') . "'" ?> + '');
                        // ajax para pessoas
                        $.ajax({   
                            type: "GET",   
                            url: <?php echo "'" . $this->Html->url('/', true).$_SESSION['Empresa']['chave_url']. '/fornecedors/ajax_select' . "'"; ?>, 
                            data: "",   
                            success: function(msg){   
                                $('#select_origem_id').html(msg);
                                $('#label_origem').html('Fornecedor');
                            }
                        });
                    }
                    return false;
                }
            );
            
            
	});
</script>