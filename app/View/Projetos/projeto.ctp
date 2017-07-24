
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
                    'data[Projeto][nome]':{
                            required:true
                    },
                    'data[Projeto][descricao]':{
                            required:true
                    },
                    'data[Projeto][dados_conexao]':{
                            required:true
                    },
                    'data[Projeto][data_inicio_desenvolvimento_form]':{
                            dateBR: true
                    },
                    'data[Projeto][data_fim_desenvolvimento_form]':{
                            dateBR: true
                    }
		},
                messages: {
                    'data[Projeto][nome]':{
                            required: "Campo obrigatório!"
                    },
                    'data[Projeto][descricao]':{
                            required: "Campo obrigatório!"
                    },
                    'data[Projeto][dados_conexao]':{
                            required: "Campo obrigatório!"
                    },
                    'data[Projeto][data_inicio_form]':{
                            dateBR: "Formato correto: dd/mm/aaaa!"
                    },
                    'data[Projeto][data_finalizacao_form]':{
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
			<h5>Projeto</h5>
		</div>
		<div class="widget-content nopadding">
			<?php
			echo $this->Form->create('Projeto', array('url' => '/projetos/'.$action, 'class' => 'form-horizontal', 'id'=>'formulario_page', 'inputDefaults' => array('label' => false,'div' => false)));
			echo $this->Form->hidden('id');
			?>
				<div class="control-group">
					<label class="control-label">Nome</label>
					<div class="controls">
						<?php echo $this->Form->input('nome', array('style' => '')); ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Cliente</label>
					<div class="controls">
						<?php 
                                                if(!empty($this->request->data['Cliente']['codigo']))
                                                    echo $this->Form->select('codigo_cliente', $select_clientes,  array('empty' => false, 'value' => $this->request->data['Cliente']['codigo']));	 
                                                else
                                                    echo $this->Form->select('codigo_cliente', $select_clientes,  array('empty' => false));	 
                                                ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Status</label>
					<div class="controls">
						<?php echo $this->Form->select('projeto_status_id', $select_projetoStatuses,  array('empty' => false)); ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Descrição</label>
					<div class="controls">
						<?php echo $this->Form->textarea('descricao', array('style' => 'height:120px')); ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Dados de conexão</label>
					<div class="controls">
						<?php echo $this->Form->textarea('dados_conexao', array('style' => 'height:120px')); ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Observação</label>
					<div class="controls">
						<?php echo $this->Form->textarea('observacao', array('style' => 'height:50px')); ?>
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
									<?php echo $this->Form->text('data_inicio_desenvolvimento_form', array('style' => 'width:150px', 'data-date-format' => 'dd/mm/yyyy', 'class' => 'datepicker')); ?>
								</div>			
							</td>
							<td>
								<label class="control-label">Data de término</label>
							</td>
							<td>
								<div class="controls" style="margin-left: 18px;">
									<?php echo $this->Form->text('data_fim_desenvolvimento_form', array('style' => 'width:150px', 'data-date-format' => 'dd/mm/yyyy', 'class' => 'datepicker')); ?>
								</div>
							</td>
						</tr>
					</table>
				</div>
				
				
				<div class="form-actions">
					<button type="submit" class="btn btn-primary">Salvar</button>
				</div>
			</form>
		</div>
	</div>			
</div>




