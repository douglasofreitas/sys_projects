<?php
echo $this->Form->create('User', array('url' => '/users/login', 'class' => 'tForm', 'id'=>'formulario_page', 'inputDefaults' => array('label' => false,'div' => false)));
?>


<table>
    <tr>
        <td><label>Usuário</label></td>
        <td><?php echo $this->Form->input('username', array( 'style' => 'width: 150px;')); ?></td>
    </tr>
    <tr>
        <td><label>Senha</label></td>
        <td><?php echo $this->Form->input('password', array( 'style' => 'width: 150px;')); ?></td>
    </tr>
</table>

<input class="submit" type="submit" value="Login" />

<?php
echo '</form>';
?>