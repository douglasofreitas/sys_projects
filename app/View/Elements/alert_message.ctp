<?php 
//alert-error   - vermelho
//alert-success - verde
//alert-info   - azul
//alert-block - amarelo

if(empty($tipo_message))
    $tipo_message = 'alert-info';
?>
<div class="row-fluid">
    <div class="alert <?php echo $tipo_message ?>">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <?php echo $message; ?>
    </div>
</div>