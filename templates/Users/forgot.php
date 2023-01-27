<div class="container padding-bottom-3x mb-2 mt-5">
<?= $this->Form->create($user) ?>
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
          <div class="forgot">
              
          	<h2>Forgot your password?</h2>
              <p>Change your password in three easy steps. This will help you to secure your password!</p>
              <ol class="list-unstyled">
                  <li><span class="text-primary text-medium">1. </span>Enter your email address below.</li>
            <li><span class="text-primary text-medium">2. </span>Our system will send you a O.T.P</li>
            <li><span class="text-primary text-medium">3. </span>Use that O.T.P to reset your password</li>
          </ol>

        </div>	
        
        <div class="card mt-4">
            <div class="card-body">
                <div class="form-control">
                    <label for="email-for-pass"></label>
                    <?= $this->Form->control('email', ['required' => false, 'class' => 'form-control','id'=>'email-for-pass']) ?>
              </div>
            </div>
            <div class="card-footer">
              <?= $this->Form->button(__('RESET PASSWORD'), ['class' => 'btn btn-success']) ?>
              <?= $this->Html->link(__('Back to Login!'), ['action' => 'login'], ['class' => 'btn btn-danger']) ?>
              <?= $this->Form->end() ?>
            </div>
    </div>
</div>
</div>
</div>
<?= $this->Html->css('forgot', ['block' => 'css']); ?>