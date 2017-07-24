<?php
foreach ($fornecedors as $item){
?>
    <option value="<?php echo $item['codigo'] ?>"> <?php echo $item['nome'] ?> </option>
<?php
}
?>
