<div class="loginBox">
    <img class="user" src="/img/loginbc.jpg" height="100px" width="100px">
    <?= $this->Flash->render() ?>
    <h3>Login</h3>
    <?= $this->Form->create() ?>

    <div class="inputBox">
    <?= $this->Form->control('email', ['required' => false, 'label' => false, 'placeholder' => 'E-mail']) ?>
<?= $this->Form->control('password', ['required' => false, 'label' => false, 'placeholder' => 'Password']) ?>
    </div>
    <?= $this->Form->submit(__('Login')); ?>
    <?= $this->Form->end() ?>

    <?= $this->Html->link("forgotpassword", ['action' => 'forgot', 'class' => 'forgotcolor: #59238F']) ?>
    <div class="text-center">

        <?= $this->Html->link("Sign Up", ['action' => 'add', 'class' => 'signcolor: #59238F']) ?>
    </div>

</div>
<?= $this->Html->css('login', ['block' => 'css']); ?>