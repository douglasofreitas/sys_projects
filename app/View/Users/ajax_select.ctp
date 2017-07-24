<?php
foreach ($usuarios as $user){
?>
    <option value="<?php echo $user['id'] ?>"> <?php echo $user['nome'] ?> </option>
<?php
}
?>



