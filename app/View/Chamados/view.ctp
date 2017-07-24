<?php
echo $this->Chamado->exibe_filtro($select_chamadoStatus, $select_chamadoPrioridade, $select_chamadoTipo, $select_projetos);

$atrasado = false;
if($chamado['Chamado']['chamado_status_id'] == 1 || $chamado['Chamado']['chamado_status_id'] == 2){
    if(!empty($chamado['Chamado']['data_finalizacao'])){
        $tempo_atual = strtotime(date('Y-m-d'));
        $tempo_chamado = strtotime($chamado['Chamado']['data_finalizacao']);
        //echo $datetime1.'----'.$datetime2;
        $interval = $tempo_chamado - $tempo_atual;

        //se o tempo for menor que 1 dia, destacar título
        if($interval < 0){
            $atrasado = 'chamado_atrasado';
        }elseif($interval < 60*60*24){
            $atrasado = 'chamado_prazo_curto';
        }
    }
}
?>

<div class="span12">
		<div class="widget-box">
			<div class="widget-title">
				<span class="icon">
					<i class="icon-search"></i>									
				</span>
				<h5>Chamado - Código <?php echo $chamado['Chamado']['codigo']; ?></h5>
				
				<div class="buttons">
					
					<?php
                    if( $perfil_atual == 2 | $perfil_atual == 3 | $perfil_atual == 4){
                        if($chamado['Chamado']['chamado_status_id'] == 1 || $chamado['Chamado']['chamado_status_id'] == 3)
                        echo $this->Html->link(
                            'Fazer chamado',
                            '/chamados/fazer_chamado/'.$chamado['Chamado']['codigo'],
                            array('escape' => false, 'class' => 'btn btn-mini btn-primary')
                        );


                        if($exibe_link_editar)
                            echo $this->Html->link(
                                '<i class="icon-pencil"></i>',
                                '/chamados/edit/'.$chamado['Chamado']['codigo'],
                                array('escape' => false, 'class' => 'btn btn-mini tip-bottom', 'title' => 'Editar', 'style' => '')
                            );
                    }
					?>
					
				</div>
				
				
			</div>
			<div class="widget-content nopadding">
				<?php
				echo $this->Form->create('Interacao', array('url' => '/interacaos/add', 'class' => 'form-horizontal', 'id'=>'formulario_page_2', 'type' => 'file', 'inputDefaults' => array('label' => false,'div' => false)));
				echo $this->Form->hidden('1');
				?>
					<div class="control-group">
						<label class="control-label">Título</label>
						<div class="controls">
							<?php echo $this->Form->input('2', array('style' => '', 'value' => $chamado['Chamado']['nome'], 'disabled', 'style' => ';')); ?>
						</div>
					</div>
					<div class="control-group">
                        <label class="control-label">Projeto</label>
                        <div class="controls">
                            <?php
                            if( $perfil_atual == 2 | $perfil_atual == 3 | $perfil_atual == 4)
                                echo $this->Html->link(
                                    $chamado['Projeto']['nome'],
                                    '/projetos/view/'.$chamado['Projeto']['codigo'],
                                    array('escape' => false, 'class' => 'destaque tip-bottom', 'title' => 'Visualizar Projeto')
                                );
                            else
                                echo $chamado['Projeto']['nome'];
                            ?>
                        </div>
                    </div>



                <div class="control-group">
                    <label class="control-label">Status</label>
                    <div class="controls">

                        <?php echo $this->Form->select('234', $select_chamadoStatus,  array('empty' => false, 'value' => $chamado['ChamadoStatus']['id'], 'disabled'));	 ?>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Tipo</label>
                    <div class="controls">

                        <?php echo $this->Form->select('345', $select_chamadoTipo,  array('empty' => false, 'value' => $chamado['ChamadoTipo']['id'], 'disabled'));	 ?>
                    </div>
                </div>

					<div class="control-group">
                        <label class="control-label">Prioridade</label>
                        <div class="controls">
                            <?php echo $this->Form->select('456', $select_chamadoPrioridade,  array('empty' => false, 'value' => $chamado['ChamadoPrioridade']['id'], 'disabled'));	 ?>
                        </div>
                    </div>
                            
                    <?php if(!empty($chamado['Chamado']['chamado_pai'])): ?>
						
						<div class="control-group">
							<label class="control-label">Chamado Pai</label>
							<div class="controls">
                                    <ul class="site-stats">
                                        <?php echo '<li>'.$this->Html->link(
                                                $chamado['ChamadoPai']['nome'],
                                                '/chamados/view/'.$chamado['ChamadoPai']['codigo'],
                                                array('escape' => true, 'style' => 'font-weight: bold;')
                                        ).'</li>'; ?>

                                    </ul>
                                                            
							</div>
						</div>
					<?php endif; ?>
                                        <?php if(!empty($chamados_filho)): ?>
						<div class="control-group">
                                                    <label class="control-label">Chamados Filho</label>
                                                    <div class="controls">
                                                        <ul class="site-stats">


                                                            <?php 
                                                            foreach($chamados_filho as $filho){
                                                                echo '<li>'.$this->Html->link(
                                                                        $filho['Chamado']['nome'],
                                                                        '/chamados/view/'.$filho['Chamado']['codigo'],
                                                                        array('escape' => true, 'style' => 'font-weight: bold;')
                                                                ).'</li>'; 
                                                            }
                                                            ?>
                                                        </ul>
                                                    </div>
						</div>
					<?php endif; ?>
                            
                            
					<div class="control-group">
						<label class="control-label">Descrição</label>
						<div class="controls">
							<?php 
                                                        //echo $this->Form->textarea('23', array('style' => 'height: 100px;', 'value' => $chamado['Chamado']['descricao'], 'disabled')); 
                                                        echo '<div class="textarea_disable" style=";">'.  nl2br($chamado['Chamado']['descricao']).'</div>';
                                                        ?>
						</div>
					</div>

                    <?php if( $perfil_atual == 2 | $perfil_atual == 3 | $perfil_atual == 4): ?>
                        <div class="control-group">
                            <label class="control-label">Obs. Oculta</label>
                            <div class="controls">
                                <?php

                                                            echo '<div class="textarea_disable" style=";">'.  nl2br($chamado['Chamado']['observacao_oculto']).'</div>';
                                                            ?>

                            </div>
                        </div>
                    <?php endif; ?>

					<div class="control-group">
                        <label class="control-label">Data início</label>
                        <div class="controls">
                            <?php echo $this->Form->input('56', array('style' => '', 'value' => (!empty($chamado['Chamado']['data_inicio']))?date('d/m/Y', strtotime($chamado['Chamado']['data_inicio'])):'', 'disabled')); ?>
                        </div>
                    </div>
                        <div class="control-group">
                            <label class="control-label">
                                <span class="<?php echo $atrasado; ?>">Data final</span>
                            </label>
                            <div class="controls">
                                <?php echo $this->Form->input('76', array('style' => '', 'value' => (!empty($chamado['Chamado']['data_finalizacao']))?date('d/m/Y', strtotime($chamado['Chamado']['data_finalizacao'])):'', 'disabled')); ?>
                            </div>
                        </div>

                    <?php if( $perfil_atual == 2 | $perfil_atual == 3 | $perfil_atual == 4): ?>
					<div class="control-group">
						<label class="control-label">Oculto</label>
						<div class="controls">
							<?php 
							if($chamado['Chamado']['oculto'] == 1)
								echo $this->Form->checkbox('66', array('hiddenField' => true, 'style' => 'width: 30px;', 'disabled', 'checked'));	 
							else
								echo $this->Form->checkbox('66', array('hiddenField' => true, 'style' => 'width: 30px;', 'disabled'));	 
							?>
						</div>
					</div>

                    <?php endif; ?>

					<?php if(!empty($chamado['Chamado']['desenvolvedor_id'])): ?>
						
						<div class="control-group">
							<label class="control-label">Desenvolvedor</label>
							<div class="controls">
								<?php echo $this->Form->text('87', array('value' => $nome_desenvolvedor, 'disabled', 'style' => 'width: 300px;')); ?>
								
							</div>
						</div>
					<?php endif; ?>

                <div class="control-group">
                    <label class="control-label">Criado por</label>
                    <div class="controls">
                        <?php
                        if( $perfil_atual == 2 | $perfil_atual == 3 | $perfil_atual == 4)
                            echo $this->Html->link(
                                $chamado['User']['nome'],
                                '/users/view/'.$chamado['User']['codigo'],
                                array('escape' => false, 'class' => 'destaque tip-bottom', 'title' => 'Dados do usuário')
                            );
                        else
                            echo $chamado['User']['nome'];
                        ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Criação</label>
                    <div class="controls">
                        <?php echo $this->Form->input('3', array('style' => '', 'value' => date('d/m/Y', strtotime($chamado['Chamado']['created'])), 'disabled')); ?>
                    </div>
                </div>


					<div class="control-group">
						<h3 class="control-label">Interações </h3>
						
					</div>
					
					<?php
					if(count($interacoes) > 0){
						$count = 1;
						foreach($interacoes as $interacao){
							echo $this->Interacao->exibe_interacao($interacao, $select_chamadoStatus, $count, $perfil_atual);
							$count++;
						}
					}else{
						?>
                        <div class="control-group" style="padding-left: 62px;">
							Não há interações
						</div>
						<?php
					}
					?>
					
					<?php
					if($chamado['ChamadoStatus']['id'] != 7)
						echo $this->Interacao->form_interacao($chamado['Chamado']['codigo'], $select_chamadoStatus, $chamado['ChamadoStatus']['id'], $associados, $perfil_atual);
					?>
					
					
				</form>
					
					
			</div>
		</div>			
</div>
