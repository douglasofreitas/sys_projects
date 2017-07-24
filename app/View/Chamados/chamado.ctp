

<script type="text/javascript">
    $(document).ready(function(){
        jQuery.validator.addMethod("dateBR", function(value, element) {
                //contando chars
                if(value.length==0) return true;
                if(value.length!=10) return false;
                // verificando data
                var data 		= value;
                var dia 		= data.substr(0,2);
                var barra1		= data.substr(2,1);
                var mes 		= data.substr(3,2);
                var barra2		= data.substr(5,1);
                var ano 		= data.substr(6,4);
                if(data.length!=10||barra1!="/"||barra2!="/"||isNaN(dia)||isNaN(mes)||isNaN(ano)||dia>31||mes>12)return false;
                if((mes==4||mes==6||mes==9||mes==11)&&dia==31)return false;
                if(mes==2 && (dia>29||(dia==29&&ano%4!=0)))return false;
                if(ano < 1900)return false;
                return true;
        }, "Informe uma data válida!");  // Mensagem padrão
        jQuery.validator.addMethod("valorBR", function(value, element) {
                if(value.length==0) return true;

                var preco = value;
                preco = preco.replace(",", ".");
                var decimalRegExp = /^-?(0|[1-9]{1}\d{0,})(\.(\d{1}\d{0,}))?$/
                return decimalRegExp.test(preco);
                return true;
        }, "Informe um valor válido!");  // Mensagem padrão
        
        $("#formulario_page").validate({
		rules:{
                    'data[Chamado][nome]':{
                            required:true
                    },
                    'data[Chamado][descricao]':{
                            required:true
                    },
                    'data[Chamado][data_inicio_form]':{
                            dateBR: true
                    },
                    'data[Chamado][data_finalizacao_form]':{
                            dateBR: true
                    }
		},
                messages: {
                    'data[Chamado][nome]':{
                            required: "Campo obrigatório!"
                    },
                    'data[Chamado][descricao]':{
                            required: "Campo obrigatório!"
                    },
                    'data[Chamado][data_inicio_form]':{
                            dateBR: "Formato correto: dd/mm/aaaa!"
                    },
                    'data[Chamado][data_finalizacao_form]':{
                            dateBR: "Formato correto: dd/mm/aaaa!"
                    }
                    
            },
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			//$(element).parents('.control-group').addClass('success');
		}
	});
    });
</script>

<div class="span12">
	<div class="widget-box">
		<div class="widget-title">
			<span class="icon">
				<i class="icon-pencil"></i>									
			</span>
			<h5>Chamado</h5>
		</div>
		<div class="widget-content nopadding">
			<?php
			echo $this->Form->create('Chamado', array('url' => '/chamados/'.$action, 'class' => 'form-horizontal', 'id'=>'formulario_page', 'inputDefaults' => array('label' => false,'div' => false)));
			echo $this->Form->hidden('id');
			?>
				<div class="control-group">
					<label class="control-label">Título</label>
					<div class="controls">
						<?php echo $this->Form->input('nome', array('style' => '')); ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Projeto</label>
					<div class="controls">
						<?php
                        if(!empty($this->request->data))
                            echo $this->Form->select('codigo_projeto', $select_projetos,  array('empty' => false, 'value' => $this->request->data['Projeto']['codigo']));
                        else
                            echo $this->Form->select('codigo_projeto', $select_projetos,  array('empty' => false));
                        ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Tipo</label>
					<div class="controls">
						<?php echo $this->Form->select('chamado_tipo_id', $select_chamadoTipo,  array('empty' => false));	 ?>
					</div>
				</div>
				
                                <div class="control-group">
                                    <label class="control-label">Prioridade</label>
                                    <div class="controls">
                                        <?php echo $this->Form->select('chamado_prioridade_id', $select_chamadoPrioridade,  array('empty' => false));	 ?>
                                    </div>
                                </div>


                <?php if($perfil_atual != 5): ?>
                    <div class="control-group">
                        <label class="control-label">Chamado pai (código)</label>
                        <div class="controls">
                            <?php echo $this->Form->input('codigo_chamado_pai', array('style' => 'width:70px')); ?>
                        </div>
                    </div>
                <?php endif; ?>


                    
				<div class="control-group">
					<label class="control-label">Descrição</label>
					<div class="controls">
						<?php echo $this->Form->textarea('descricao', array('style' => 'height:120px'));	 ?>
					</div>
				</div>

                <?php if($perfil_atual != 5): ?>

				<div class="control-group">
					<label class="control-label">Obs. oculta</label>
					<div class="controls">
						<?php echo $this->Form->textarea('observacao_oculto', array('style' => 'height:120px'));	 ?>
					</div>
				</div>
                                
                <div class="control-group">
					<table>
						<tr>
							<td>
								<label class="control-label">Data de início</label>
							</td>
							<td>
								<div class="controls" style="margin-left: 18px;">
									<?php
                                    if(!empty($this->request->data['Chamado']['data_inicio']))
                                        echo $this->Form->text('data_inicio_form', array('style' => 'width:150px', 'data-date-format' => 'dd/mm/yyyy', 'class' => 'datepicker', 'value' => date('d/m/Y', strtotime($this->request->data['Chamado']['data_inicio'])) ));
                                    else
                                        echo $this->Form->text('data_inicio_form', array('style' => 'width:150px', 'data-date-format' => 'dd/mm/yyyy', 'class' => 'datepicker'));
                                    echo $this->Html->link('<i class="icon-remove"></i>', '#', array('escape' => false, 'title' => 'Limpar', 'onclick' => "$('#ChamadoDataInicioForm').val(''); return false;" ));
                                    ?>

								</div>			
							</td>
							<td>
								<label class="control-label">Data de término</label>
							</td>
							<td>
								<div class="controls" style="margin-left: 18px;">
                                    <?php
                                    if(!empty($this->request->data['Chamado']['data_finalizacao']))
                                        echo $this->Form->text('data_finalizacao_form', array('style' => 'width:150px', 'data-date-format' => 'dd/mm/yyyy', 'class' => 'datepicker', 'value' => date('d/m/Y', strtotime($this->request->data['Chamado']['data_finalizacao'])) ));
                                    else
                                        echo $this->Form->text('data_finalizacao_form', array('style' => 'width:150px', 'data-date-format' => 'dd/mm/yyyy', 'class' => 'datepicker'));
                                    echo $this->Html->link('<i class="icon-remove"></i>', '#', array('escape' => false, 'title' => 'Limpar', 'onclick' => "$('#ChamadoDataFinalizacaoForm').val(''); return false;" ));
                                    ?>
								</div>
							</td>
						</tr>
					</table>
				</div>
                    
				<div class="control-group">
					<label class="control-label">Oculto</label>
					<div class="controls">
						<?php echo $this->Form->checkbox('oculto', array('hiddenField' => true, 'style' => 'width: 30px;'));	 ?>
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






