<!-- <div class="container" id="top">
    <div class="row">
        <aside class="column">
            <div class="" style="text-align:center;">
                <h1 class="heading mt-3"><?= __('Reset Password Here') ?></h1>
            </div>
        </aside>
        <div class="container">
            <div class="users form content">
                <fieldset>
                    <div class="row">
                        <div class="col">
                            <span class="error-message" id="email-error"></span>
                            <?= $this->Form->control('email', ['required' => false]) ?>
                        </div>
                    </div>
                </fieldset>
                <?= $this->Form->button(__('Submit')) ?>
                <?= $this->Form->end() ?>
                <hr>
                <div class="text-center">
                    <?= $this->Html->link(__('Create an Account!'), ['action' => 'signup'], ['class' => 'nav-link active']) ?>
                </div>
                <div class="text-center">
                    <?= $this->Html->link(__('Already have an account? Login!'), ['action' => 'login'], ['class' => 'nav-link active']) ?>
                </div>
            </div>
        </div>
    </div>
</div>-->
<div class="form-gap"></div>
<?= $this->Form->create($user) ?>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="text-center">
                        <h3><i class="fa fa-lock fa-4x"></i></h3>
                        <h1 class="heading mt-3">
                            <?= __('Reset Password Here') ?>
                        </h1>
                        <p>Change your password in three easy steps. This will help you to secure your password!</p>
                        <ol class="list-unstyled">
                            <li><span class="text-primary text-medium">1.</span>Enter your email address below.</li>
                            <li><span class="text-primary text-medium">2.</span>Our system will send you a OTP</li>
                            <li><span class="text-primary text-medium">3.</span>Use OTP to reset your password</li>
                        </ol>
                        <div class="panel-body">
                            <div class="form-group">
                                <?= $this->Form->control('email', ['required' => false, 'class' => 'glyphicon glyphicon-envelope color-blue']) ?>
                            </div>
                            <div class="form-group">
                                <?= $this->Form->button(__('RESET PASSWORD'), ['class' => 'btn btn-lg btn-primary btn-block']) ?>
                                <?= $this->Form->end() ?>
                            </div>
                            <div class="text-center">
                                <?= $this->Html->link(__('Create an Account!'), ['action' => 'add'], ['class' => 'nav-link active']) ?>
                            </div>
                            <div class="text-center">
                                <?= $this->Html->link(__('Already have an account? Login!'), ['action' => 'login'], ['class' => 'nav-link active']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->Html->css('forgot', ['block' => 'css']); ?>