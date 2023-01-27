<div class="container padding-bottom-3x mb-2 mt-5">
<?= $this->Form->create($user) ?>
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
          <div class="forgot">
              
          	<h2>Please enter your password</h2>
              <p>Change your password!</p>
              <ol class="list-unstyled">
                  <li><span class="text-primary text-medium">1. </span>Enter your password.</li>
            <li><span class="text-primary text-medium">2. </span>Do not share your password</li>
            <li><span class="text-primary text-medium">3. </span>We do not save your passwords</li>
          </ol>

        </div>	
        <div class="card mt-4">
            <div class="card-body">
                <div class="form-control">
                    <?= $this->Form->control('password', ['required' => false, 'class' => 'form-control','type'=>'password']) ?>
                    <?= $this->Form->control('confirm_password', ['required' => false, 'class' => 'form-control','type'=>'password']) ?>
              </div>
            </div>
            <div class="card-footer">
              <?= $this->Form->button(__('Confirm '), ['class' => 'btn btn-success']) ?>
              <?= $this->Html->link(__('Back to Login!'), ['action' => 'login'], ['class' => 'btn btn-danger']) ?>
              <?= $this->Form->end() ?>
            </div>
    </div>
</div>
</div>
</div>
<?= $this->Html->css('forgot', ['block' => 'css']); ?>