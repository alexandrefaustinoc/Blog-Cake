<div class="login">
    <fieldset id="entrarlogin">
        <legend class="signin">
            <?php echo __('Sign in'); ?>
        </legend>
<?php 
$login = $this->Form->create('User', array('class' => 'User'));
$login .= $this->Flash->render('auth');
$login .= $this->Form->input('username', array('class' => 'input'));
$login .= $this->Form->input('password', array('class' => 'input'));
$login .= $this->Form->button('Login', array('type' => 'submit', 'class' => 'entrar'));
$login .= $this->Form->end(); 
echo $login;
?>
</fieldset>

</div>