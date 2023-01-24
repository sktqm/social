<div class="loginBox">
    <img class="user" src="/img/default.png" width="150px">
    <?= $this->Flash->render() ?>
    <h3>Login</h3>
    <?= $this->Form->create($user, ['enctype' => "multipart/form-data"]) ?>
    <div class="inputBox">
        <div class="row">
            <div class="col-md-12 ">
                <?= $this->Form->control('image', ['required' => false, 'label' => false, 'type' => 'file', 'aria-label' => "File browser example"]) ?>
            </div>
            <div class="col-md-6 ">
                <?= $this->Form->control('username', ['required' => false, 'label' => false, 'placeholder' => 'UserName']) ?>
            </div>
            <div class="col-md-6 ">
                <?= $this->Form->control('email', ['required' => false, 'label' => false, 'placeholder' => 'E-mail']) ?>
            </div>
            <div class="col-md-6 ">
                <?= $this->Form->control('password', ['required' => false, 'label' => false, 'placeholder' => 'Password']) ?>
            </div>
            <div class="col-md-6 ">
                <?= $this->Form->control('confirm-password', ['required' => false, 'label' => false, 'placeholder' => 'Confirm-Password']) ?>
            </div>
            <div class="col-md-12">
                <h3>Personal Details</h3>
            </div>
            <div class="col-md-6 ">
                <?= $this->Form->control('name', ['required' => false, 'label' => false, 'placeholder' => 'Name']) ?>
            </div>
            <div class="col-md-6">
                <?= $this->Form->select(
                    'gender',
                    ['male' => 'Male', 'female' => 'Female'],
                    ['empty' => 'Gender']
                ); ?>
            </div>
            <div class="col-md-6 ">
                <?= $this->Form->control('dob', ['required' => false, 'label' => false, 'type' => 'date', 'placeholder' => 'DD/MM/YYYY']) ?>
            </div>
            <div class="col-md-6 ">
                <?= $this->Form->control('phone', ['required' => false, 'label' => false, 'type' => 'text', 'placeholder' => 'Phone-Number']) ?>
            </div>
            <div class="col-md-12 ">
                <?= $this->Form->control('address', ['required' => false, 'label' => false, 'placeholder' => 'Addresss']) ?>
            </div>
        </div>
        <?= $this->Form->submit(__('Sign-In')); ?>
        <?= $this->Form->end() ?>

        <?= $this->Html->link("forgotpassword", ['action' => 'forgot', 'class' => 'forgotcolor: #59238F']) ?>
        <div class="text-center">

            <?= $this->Html->link("Sign Up", ['action' => 'login', 'class' => 'signcolor: #59238F']) ?>
        </div>
    </div>
</div>
<?= $this->Html->css('signup', ['block' => 'css']); ?>