<!-- <div class="container" id="bottom">
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
                            <?= $this->Form->control('token'); ?>
                        </div>
                    </div>
                </fieldset>
                <?= $this->Form->button(__('Submit')) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div> -->

<div class="d-flex justify-content-center align-items-center container">
    <div class="card py-5 px-3">
            <?= $this->Form->create($user) ?>
            <h5 class="m-0">Email verification</h5>
            <span class="mobile-text">Enter the code we just send on your E-mail <b class="text-danger"> <?= h($user->email)?></b></span>
            <div class="d-flex flex-row mt-5">
            <?= $this->Form->control('token'); ?>
            </div>
            <?= $this->Form->button(__('Submit')) ?>
                    <?= $this->Form->end() ?>
        </div>
    </div>
    <?= $this->Html->css('getotp', ['block' => 'css']); ?>