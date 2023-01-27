<div class="container emp-profile">
    <div class="row">
        <div class="col-md-4">
            <div class="profile-img">
                <?= $this->Html->image(h($user->image), array('width' => '200px')) ?>
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
                <h6 class="proile-rating">Total No Of Posts: <span>
                    <?= h($count) ?>
                </span></h6>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <span class="nav-link active" id="Posts" data-toggle="tab" role="tab" >Posts</span>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link " id="About" data-toggle="tab" role="tab"
                        aria-controls="home" aria-selected="true">About</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-2">
            <?= $this->Html->link(__('Edit Profile'), ['action' => 'edit', $user->id], ['class' => 'nav-link profile-edit-btn']) ?>
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
            <div class="tab-content profile-tab" id="about_user" >
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <label>User Id</label>
                        </div>
                        <div class="col-md-6">
                            <p>
                                <?= $this->Number->format($user->id) ?>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Name</label>
                        </div>
                        <div class="col-md-6">
                            <p>
                                <?= h($user->name) ?>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Gender</label>
                        </div>
                        <div class="col-md-6">
                            <p>
                                <?= h($user->gender) ?>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Email</label>
                        </div>
                        <div class="col-md-6">
                            <p>
                                <?= h($user->email) ?>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Address</label>
                        </div>
                        <div class="col-md-6">
                            <p>
                                <?= h($user->address) ?>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Created Date</label>
                        </div>
                        <div class="col-md-6">
                            <p>
                                <?= h($user->created_date->format('Y-m-d H:i:s')) ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content profile-tab" id="post_user">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        <?php foreach ($user->posts as $post) : ?>
                            <div class="col-md-3 polaroid">

                            <?php echo $this->Html->link(
                            $this->Html->image($post->image,array('height' => '200', 'width' => '150','class'=>'abc'))
                            ,array(
                                'controller' => 'Users', 
                                'action' => 'viewpost',$post->id
                            )
                            , array('escape' => false)
                            );?>
                                <p class="text-center"><?= h($post->title) ?></p>
                            </div>
                        


                        <?php endforeach ; ?>
                    </div>
                </div>
            </div>
    </div>
</div>