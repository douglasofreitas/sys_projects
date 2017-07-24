
<div class="span12">
	<div class="widget-box">
		<div class="widget-title">
			<span class="icon">
				<i class="icon-th"></i>
			</span>
			<h5>Chamados em desenvolvimento (Total: <?php echo count($chamados_desenvolvimento) ?>)</h5>
			
		</div>
		<div class="widget-content nopadding">
			<?php
                        echo $this->Chamado->exibe_lista($chamados_desenvolvimento);
			?>
		</div>
	</div>
</div>

