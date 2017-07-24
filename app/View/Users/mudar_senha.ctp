
﻿<div class="span12">
	<div class="widget-box">
		<div class="widget-title">
			<span class="icon">
				<i class="icon-pencil"></i>									
			</span>
			<h5>Mudar senha</h5>
		</div>
		<div class="widget-content nopadding">
			<?php
			echo $this->Form->create('User', array('url' => '/users/mudar_senha/'.$user['User']['codigo'], 'class' => 'form-horizontal', 'id'=>'formulario_page', 'inputDefaults' => array('label' => false,'div' => false)));
			echo $this->Form->hidden('id');
			?>
				<div class="control-group">
					<table>
						<tr>
							<td>
								<label class="control-label">Nova senha</label>
								<div class="controls">
									<?php echo $this->Form->input('password', array('style' => 'width:200px', 'value' => '')); ?>
								</div>
							</td>
							<td>
								<label class="control-label">Confirmar senha</label>
								<div class="controls">
									<?php echo $this->Form->password('password_confirmacao', array('style' => 'width:200px', 'value' => '')); ?>
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
