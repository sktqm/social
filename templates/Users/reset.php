<!-- <div class="container">
    <div class="row">
        <aside class="column">
            <div class="" style="text-align:center;">
                <h1 class="heading mt-3"><?= __('Reset your Password Here') ?></h1>
            </div>
        </aside>
        <div class="container">
            <div class="users form content">
                <fieldset>
                    <div class="row">
                        <div class="col-md-6">
                            <?= $this->Form->control('password', ['required' => false]) ?>
                            <span class="error-message" id="password-error"></span>
                        </div>
                        <div class="col-md-6">
                            <?= $this->Form->control('confirm_password', ['type' => 'password', 'required' => false,'id'=>'confirm_password']) ?>
                            <span class="error-message" id="confirm_password-error"></span>
                        </div>
                    </div>
                </fieldset>
                <?= $this->Form->button(__('Submit')) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div> -->
<div class="card login-form">
    <div class="card-body">
        <h3 class="card-title text-center">Change password</h3>
        <?= $this->Form->create($user) ?>
		<!--Password must contain one lowercase letter, one number, and be at least 7 characters long.-->
				<div class="form-group">
					<span>Your new password</span>
                    <?= $this->Form->control('password', ['required' => false]) ?>
				</div>
				<div class="form-group">
					<span>Repeat password</span>
				    <?= $this->Form->control('confirm_password', ['type' => 'password', 'required' => false,'id'=>'confirm_password']) ?>
				</div>
                <?= $this->Form->button(__('Confirm')) ?>
                <?= $this->Form->end() ?>
		</div>
	</div>
</div>
<?= $this->Html->css('reset', ['block' => 'css']); ?>