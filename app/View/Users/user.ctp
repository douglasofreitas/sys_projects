<div class="span12">
	<div class="widget-box">
		<div class="widget-title">
			<span class="icon">
				<i class="icon-pencil"></i>									
			</span>
			<h5>Pessoa</h5>
		</div>
		<div class="widget-content nopadding">
			<?php
			echo $this->Form->create('User', array('url' => '/users/'.$action, 'class' => 'form-horizontal', 'type' => 'file', 'id'=>'formulario_page', 'inputDefaults' => array('label' => false,'div' => false)));
			echo $this->Form->hidden('id');
			?>
				<div class="control-group">
					<label class="control-label">Nome</label>
                                        <div class="controls">
                                                <?php echo $this->Form->input('nome', array('style' => '')); ?>
                                        </div>
				</div>
                                <?php if(true): ?>
                                <div class="control-group">
					<table>
						<tr>
							<td>
								<label class="control-label">Foto</label>
								<div class="controls">
									<input type="file" name="data[User][arquivo][]" />
								</div>
							</td>
							<td>
                                                            
								
                                                            
							</td>
						</tr>
					</table>
				</div>
				<?php endif; ?>
                    
				<?php if($action == 'add'): ?>
				
				<div class="control-group">
					<table>
						<tr>
							<td>
								<label class="control-label">Username</label>
								<div class="controls">
									<?php echo $this->Form->input('username', array('style' => '')); ?>
								</div>
							</td>
							<td>
								<label class="control-label">Senha</label>
								<div class="controls">
									<?php echo $this->Form->input('password', array('style' => '', 'value' => '')); ?>
								</div>
							</td>
						</tr>
					</table>
				</div>
				
				<?php endif; ?>
				
				<div class="control-group">
					<table>
						<tr>
							<td>
								<label class="control-label">Telefone</label>
								<div class="controls">
									<?php echo $this->Form->input('telefone', array('style' => '')); ?>
								</div>
							</td>
							<td>
								<label class="control-label">Tel. Comercial</label>
								<div class="controls">
									<?php echo $this->Form->input('telefone_comercial', array('style' => '')); ?>
								</div>
							</td>
						</tr>
					</table>
				</div>
				
				<label class="control-label">Celular</label>
				<div class="controls">
					<?php echo $this->Form->input('celular', array('style' => 'width: 134px;')); ?>
				</div>
				
				<div class="control-group">
					<table>
						<tr>
							<td>
								<label class="control-label">E-mail</label>
								<div class="controls">
									<?php echo $this->Form->input('email', array('style' => '')); ?>
								</div>
							</td>
							<td>
								<label class="control-label">E-mail alternativo</label>
								<div class="controls">
									<?php echo $this->Form->input('email2', array('style' => '')); ?>
								</div>
							</td>
						</tr>
					</table>
				</div>
				
				<div class="control-group">
					<table>
						<tr>
							<td>
								<label class="control-label">CPF</label>
								<div class="controls">
									<?php echo $this->Form->input('cpf', array('style' => '')); ?>
								</div>
							</td>
							<td>
								<label class="control-label">Profissão</label>
								<div class="controls">
									<?php echo $this->Form->input('profissao', array('style' => '')); ?>
								</div>
							</td>
						</tr>
					</table>
				</div>
                <div class="control-group">
                    <table>
                        <tr>
                            <td>
                                <label class="control-label">Login</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('username', array('style' => '')); ?>
                                </div>
                            </td>
                            <td>
                            </td>
                        </tr>
                    </table>
                </div>
				
				<div class="control-group">
					<label class="control-label">Endereço</label>
					<div class="controls">
						<?php echo $this->Form->textarea('endereco', array('style' => 'height:120px'));	 ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Observação</label>
					<div class="controls">
						<?php echo $this->Form->textarea('observacao', array('style' => 'height:120px'));	 ?>
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
