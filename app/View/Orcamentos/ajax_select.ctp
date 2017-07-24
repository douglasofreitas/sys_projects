<?php
foreach ($orcamentos as $item){
?>
    <option value="<?php echo $item['codigo'] ?>"> <?php echo $item['nome'] ?> </option>
<?php
}
?>
