<div class="span12">
    <div class="widget-box">
            <div class="widget-title">
                    <span class="icon">
                            <i class="icon-search"></i>									
                    </span>
                    <h5>Configuração </h5>

                    <div class="buttons">

                            <?php 
                            echo $this->Html->link(
                                '<i class="icon-pencil"></i>',
                                '/empresas/edit_geral/',
                                array('escape' => false, 'class' => 'btn btn-mini tip-bottom', 'title' => 'Editar', 'style' => '')
                            );

                            ?>

                    </div>


            </div>
            <div class="widget-content nopadding">
                    <?php
                    echo $this->Form->create('Empresa', array('url' => '/empresas/', 'class' => 'form-horizontal', 'id'=>'formulario_page', 'inputDefaults' => array('label' => false,'div' => false)));
                    ?>
                            
                            <div class="control-group">
                                    <label class="control-label">Descrição</label>
                                    <div class="controls">
                                            <?php echo $this->Form->textarea('23', array('style' => 'height: 100px;', 'value' => $empresa_core['Empresa']['descricao'], 'disabled')); ?>
                                    </div>
                            </div>

                            <div class="control-group">
                                    <label class="control-label">Última modificação</label>
                                    <div class="controls">
                                            <?php echo $this->Form->text('54', array('style' => 'width: 143px;', 'value' => (!empty($empresa_core['Empresa']['modified']))?date('d/m/Y', strtotime($empresa_core['Empresa']['modified'])):'', 'disabled')); ?>

                                    </div>
                            </div>

                    </form>
            </div>
    </div>			
</div>
