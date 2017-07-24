<div class="span12">
		<div class="widget-box">
			<div class="widget-title">
				<span class="icon">
					<i class="icon-search"></i>									
				</span>
				<h5>User - Código <?php echo $user['User']['codigo']; ?></h5>
				
				<div class="buttons">
					<?php



                    if( $perfil_atual == 4 & $user['User']['id'] == $_SESSION['User']['id']){  // Desenvolvedores
                        echo $this->Html->link(
                            'Pagamentos',
                            '/faturas/index/',
                            array('escape' => true, 'class' => 'btn btn-mini tip-bottom', 'title' => 'Visualizar pagamentos', 'style' => '')
                        );
                    }

                    if(  $perfil_atual == 2 | $perfil_atual == 3  | $user['User']['id'] == $_SESSION['User']['id']){
                        echo $this->Html->link(
                            '<i class="icon-pencil"></i>',
                            '/users/edit/'.$user['User']['codigo'],
                            array('escape' => false, 'class' => 'btn btn-mini tip-bottom', 'title' => 'Editar', 'style' => '')
                        );
                        echo $this->Html->link(
                            '<i class="icon-lock"></i>',
                            '/users/mudar_senha/'.$user['User']['codigo'],
                            array('escape' => false, 'class' => 'btn btn-mini tip-bottom', 'title' => 'Mudar senha', 'style' => '')
                        );
                    }


                    if( $perfil_atual == 2 | $perfil_atual == 3){
                        echo $this->Html->link(
                            '<i class="icon-trash"></i>',
                            '/users/delete/'.$user['User']['codigo'],
                            array('escape' => false, 'class' => 'btn btn-mini tip-bottom', 'title' => 'Remover usuário', 'style' => ''),
                            'Deseja realmente remover este usuário?'
                        );
                    }

					?>
				</div>
				
			</div>
			<div class="widget-content nopadding">
				<?php
				echo $this->Form->create('User', array('url' => '/users/', 'class' => 'form-horizontal', 'id'=>'formulario_page', 'inputDefaults' => array('label' => false,'div' => false)));
				echo $this->Form->hidden('1');
				?>
					<div class="control-group">
						<label class="control-label">Nome</label>
						<div class="controls">
							<?php echo $this->Form->input('nome', array('style' => '', 'value' => $user['User']['nome'], 'disabled')); ?>
						</div>
					</div>
					
					<div class="control-group">
						<table>
							<tr>
								<td>
									<label class="control-label">E_mail</label>
									<div class="controls">
										<?php echo $this->Form->input('email', array('style' => '', 'value' => $user['User']['email'], 'disabled')); ?>
									</div>
								</td>
								<td>
									<label class="control-label">E_mail alternativo</label>
									<div class="controls">
										<?php echo $this->Form->input('email2', array('style' => '', 'value' => $user['User']['email2'], 'disabled')); ?>
									</div>
								</td>
							</tr>
						</table>
					</div>
					<div class="control-group">
						<table>
							<tr>
								<td>
									<label class="control-label">Telefone</label>
									<div class="controls">
										<?php echo $this->Form->input('telefone', array('style' => '', 'value' => $user['User']['telefone'], 'disabled')); ?>
									</div>
								</td>
								<td>
									<label class="control-label">Comercial</label>
									<div class="controls">
										<?php echo $this->Form->input('telefone_comercial', array('style' => '', 'value' => $user['User']['telefone_comercial'], 'disabled')); ?>
									</div>
								</td>
							</tr>
						</table>
					</div>
                            
                                        <div class="control-group">
						<table>
							<tr>
								<td>
									<label class="control-label">Celular</label>
									<div class="controls">
										<?php echo $this->Form->input('celular', array('style' => '', 'value' => $user['User']['celular'], 'disabled')); ?>
									</div>
								</td>
								<td>
									
								</td>
							</tr>
						</table>
					</div>
                            
					<div class="control-group">
						<table>
							<tr>
								<td>
									<label class="control-label">Profissão / Instituição</label>
									<div class="controls">
										<?php echo $this->Form->input('profissao', array('style' => '', 'value' => $user['User']['profissao'], 'disabled')); ?>
									</div>
								</td>
								<td>
									<label class="control-label">CPF</label>
									<div class="controls">
										<?php echo $this->Form->input('cpf', array('style' => '', 'value' => $user['User']['cpf'], 'disabled')); ?>
									</div>
								</td>
							</tr>
						</table>
					</div>
					
					<div class="control-group">
						<label class="control-label">Endereço</label>
						<div class="controls">
							<?php echo $this->Form->textarea('endereco', array('style' => 'height: 100px;', 'value' => $user['User']['endereco'], 'disabled')); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Observação</label>
						<div class="controls">
							<?php echo $this->Form->textarea('observacao', array('style' => 'height: 100px;', 'value' => $user['User']['observacao'], 'disabled')); ?>
						</div>
					</div>
					
					<div class="control-group">
                                                <table>
							<tr>
								<td>
									<label class="control-label">Ativo</label>
                                                                        <div class="controls">
                                                                                <?php 
                                                                                if ($user['User']['ativo'])
                                                                                    echo $this->Form->checkbox('ativo', array('hiddenField' => true, 'style' => 'width: 30px;', 'value' => $user['User']['ativo'], 'disabled', 'checked'));	 
                                                                                else
                                                                                    echo $this->Form->checkbox('ativo', array('hiddenField' => true, 'style' => 'width: 30px;', 'value' => $user['User']['ativo'], 'disabled'));	 
                                                                                ?>
                                                                        </div>
								</td>
								<td>
									<label class="control-label">Login</label>
									<div class="controls">
										<?php echo $this->Form->input('username', array('style' => '', 'value' => $user['User']['username'], 'disabled')); ?>
									</div>
								</td>
							</tr>
						</table>
					</div>

                    <?php if($perfil_atual == 2 | $perfil_atual == 3): ?>

                    <div class="control-group">
                        <label class="control-label">Perfis</label>
                        <div class="controls">
                        <table>

                            <tr>
                                <td>Administrador</td>
                                <td style="width: 63px;text-align: center;"><?php if($administrador) echo '<span style="color:green;">SIM</span>'; else echo '<span style="color:red;">NÃO</span>'; ?></td>
                                <td>
                                    <?php
                                    if($administrador)
                                        echo $this->Html->link('Remover perfil', '/users/remove_perfil/'.$user['User']['codigo'].'/2', array( 'class' => 'btn'));
                                    else
                                        echo $this->Html->link('Adiciona perfil', '/users/add_perfil/'.$user['User']['codigo'].'/2', array( 'class' => 'btn'));
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Gerente</td>
                                <td style="width: 63px;text-align: center;"><?php if($gerente) echo '<span style="color:green;">SIM</span>'; else echo '<span style="color:red;">NÃO</span>'; ?></td>
                                <td>
                                    <?php
                                    if($gerente)
                                        echo $this->Html->link('Remover perfil', '/users/remove_perfil/'.$user['User']['codigo'].'/3', array( 'class' => 'btn'));
                                    else
                                        echo $this->Html->link('Adiciona perfil', '/users/add_perfil/'.$user['User']['codigo'].'/3', array( 'class' => 'btn'));
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Desenvolvedor</td>
                                <td style="width: 63px;text-align: center;"><?php if($desenvolvedor) echo '<span style="color:green;">SIM</span>'; else echo '<span style="color:red;">NÃO</span>'; ?></td>
                                <td>
                                    <?php
                                    if($desenvolvedor)
                                        echo $this->Html->link('Remover perfil', '/users/remove_perfil/'.$user['User']['codigo'].'/4', array( 'class' => 'btn'));
                                    else
                                        echo $this->Html->link('Adiciona perfil', '/users/add_perfil/'.$user['User']['codigo'].'/4', array( 'class' => 'btn'));
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Cliente</td>
                                <td style="width: 63px;text-align: center;"><?php if($cliente) echo '<span style="color:green;">SIM</span>'; else echo '<span style="color:red;">NÃO</span>'; ?></td>
                                <td>
                                    <?php
                                    if($cliente)
                                        echo $this->Html->link('Remover perfil', '/users/remove_perfil/'.$user['User']['codigo'].'/5', array( 'class' => 'btn'));
                                    else
                                        echo $this->Html->link('Adiciona perfil', '/users/add_perfil/'.$user['User']['codigo'].'/5', array( 'class' => 'btn'));
                                    ?>
                                </td>
                            </tr>
                        </table>

                        </div>
                    </div>

                    <?php endif; ?>

					<div class="control-group">
						<label class="control-label">Criação</label>
						<div class="controls">
							<?php echo $this->Form->input('created_form', array('style' => 'width: 136px;', 'value' => (!empty($user['User']['created']))?date('d/m/Y', strtotime($user['User']['created'])):'', 'disabled')); ?>
						</div>
					</div>
					
				</form>
			</div>
		</div>			
</div>




