
<script type="text/javascript">
    $(document).ready(function(){
        $("#formulario_page").validate({
		rules:{
                    'data[Fornecedor][nome]':{
                            required:true
                    },
                    'data[Fornecedor][descricao]':{
                            required:true
                    }
		},
                messages: {
                    'data[Fornecedor][nome]':{
                            required: "Campo obrigatório!"
                    },
                    'data[Fornecedor][descricao]':{
                            required: "Campo obrigatório!"
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

﻿<div class="span12">
	<div class="widget-box">
		<div class="widget-title">
			<span class="icon">
				<i class="icon-pencil"></i>									
			</span>
			<h5>Fornecedor</h5>
		</div>
		<div class="widget-content nopadding">
			<?php
			echo $this->Form->create('Fornecedor', array('url' => '/fornecedors/'.$action, 'class' => 'form-horizontal', 'id'=>'formulario_page', 'inputDefaults' => array('label' => false,'div' => false)));
			echo $this->Form->hidden('id');
			?>
				<div class="control-group">
					<label class="control-label">Nome</label>
					<div class="controls">
						<?php echo $this->Form->input('nome', array('style' => '')); ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Descrição</label>
					<div class="controls">
						<?php echo $this->Form->textarea('descricao', array('style' => 'height:120px'));	 ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Ativo</label>
					<div class="controls">
						<?php echo $this->Form->checkbox('ativo', array('hiddenField' => true, 'style' => 'width: 30px;'));	 ?>
					</div>
				</div>
				
				<div class="form-actions">
					<button type="submit" class="btn btn-primary">Salvar</button>
				</div>
			</form>
		</div>
	</div>			
</div>



