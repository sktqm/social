
<div class="container padding-bottom-3x mb-2 mt-5">
<?= $this->Form->create($user) ?>
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
          <div class="forgot">
              
          	<h2>Please enter your O.T.P</h2>
              <ol class="list-unstyled">
                  <li><span class="text-primary text-medium">1. </span>Your otp is send to your registered Email Address</li>
                  <li><span class="text-primary text-medium">2. </span>Do not share your O.T.P to anyone</li>
                  <li><span class="text-primary text-medium">3. </span>if not recieved O.T.P then check your spam</li>
                 </ol>
                 
                 <div class="card mt-4">
                         <div class="form-control">
                             <label for="email-for-pass"></label>
                             <?= $this->Form->control('token', ['required' => false, 'class' => 'form-control']) ?>
                            </div>
                        </div>
                        <div class="card-footer mt-4">
                            <?= $this->Form->button(__('Confirm'), ['class' => 'btn btn-success']) ?>
                            <?= $this->Html->link(__('Back to Login!'), ['action' => 'login'], ['class' => 'btn btn-danger']) ?>
                            <?= $this->Form->end() ?>
                        </div>

                    
        </div>	
</div>
</div>
</div>
<?= $this->Html->css('forgot', ['block' => 'css']); ?>