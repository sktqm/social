<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="form-bg">
    <div class="container">
<div class="row">
    <div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8">
        <div class="form-container">
            <h3 class="title">User Registration</h3>
            <?= $this->Form->create($user) ?>
            <div class="form-group">
                <?php echo $this->Form->control('name'); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->control('username'); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->control('password'); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->control('confirm_password'); ?>
            </div>
            <h4 class="sub-title">Personal Information</h4>
            <div class="form-group">
                <?php echo $this->Form->control('address'); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->control('phone'); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->control('dob'); ?>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <div class="gender-category ">
                    <?= $this->Form->radio(
                        'gender',
                        ['1' => ' male ', '2' => ' female ', '0' => ' other '],
                        ['required' => false]
                    ) ?>
                </div>
            </div>
            <?= $this->Form->button(__('Create Account'), array('class' => 'btn signin')) ?>
            <span class="user-login">Already Have an Account? Click Here to
                <?= $this->Html->link(__('Login'), ['action' => 'login'], ['class' => 'user-login']) ?>
            </span>
            <?= $this->Form->end() ?>
            <div class="social-links">
                <span>Or Connect With</span>
                <a href="#"><i class="fab fa-twitter"></i> twitter</a>
                <a href="#"><i class="fab fa-facebook-f"></i> facebook</a>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<?= $this->Html->css('signup', ['block' => 'css']); ?>

<?= $this->Html->css('signup', ['block' => 'css']); ?>