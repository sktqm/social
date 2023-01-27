<?= $this->Form->create($user, ['enctype' => 'multipart/form-data']) ?>
<div class="container emp-profile">
    <div class="row">
        <div class="col-md-4">
            <div class="profile-img">
                <?= $this->Html->image(h($user->image), array('width' => '200px')) ?>
                <div class="file btn btn-lg btn-primary">
                    Change Photo
                    <input type="file" name="image" />
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="profile-head">
                <h3>
                    <?= h($user->username) ?>
                </h3>
                <h6>
                    <?= h($user->dob->format('d-m-Y ')) ?>
                </h6>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <span class="nav-link active" id="Postas" data-toggle="tab" role="tab">Edit</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-2">
            <?= $this->Html->link(__('Cancel'), ['action' => 'userprofile', $user->id], ['class' => 'nav-link profile-edit-btn']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="profile-work">
                <p>WORK LINK</p>
                <span>Website Link</span><br />
                <span>Bootsnipp Profile</span><br />
                <span>Bootply Profile</span>
                <p>SKILLS</p>
                <span>PHP</span><br />
                <span>Web Designer</span><br />
                <span>Web Developer</span><br />
                <span>WordPress</span><br />
            </div>
        </div>
        <div class="col-md-8">
            <div class="tab-content profile-tab" id="abosut_user">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
   
                    <div class="row">
                        <div class="col-md-4">
                            <label class='labelname ' >Name :-  </label>
                        </div>
                        <div class="col-md-8">
                            <?= $this->Form->control('name',['label' => false]); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class='labelname ' >UserName :-  </label>
                        </div>
                        <div class="col-md-8">
                            <?= $this->Form->control('username',['label' => false]); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class='labelname ' >Date of Birth :-  </label>
                        </div>
                        <div class="col-md-8">
                            <?= $this->Form->control('dob',['label' => false]); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class='labelname'> Gender :-  </label>
                        </div>
                        <div class="col-md-8">
                            <!-- <?= $this->Form->control('gender',['label' => false]); ?> -->
                            <?= $this->Form->radio(
                    'gender',
                    ['male' => 'Male', 'female' => 'Female']
                ); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class='labelname ' >Email :-  </label>
                        </div>
                        <div class="col-md-8">
                            <?= $this->Form->control('email',['label' => false]); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class='labelname ' >Phone No:-  </label>
                        </div>
                        <div class="col-md-8">
                            <?= $this->Form->control('phone', ['required' => false, 'label' => false, 'type' => 'text', 'placeholder' => 'Phone-Number']) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class='labelname ' >Address :-</label>
                        </div>
                        <div class="col-md-8">
                            <?= $this->Form->control('address',['label' => false]); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<?= $this->Html->css('edit', ['block' => 'css']); ?>