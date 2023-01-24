<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user, ['enctype' => 'multipart/form-data']) ?>
            <fieldset>
                <legend><?= __('Edit User') ?></legend>
                <?php
                    echo $this->Form->control('image',['type'=>'file','required'=>false]);
                    echo $this->Html->image(h($user->image), array('width' => '200px'));
                    // echo $this->Html->image(h($user->image),['width' => '200px']);
                    echo $this->Form->control('name');
                    echo $this->Form->control('username');
                    echo $this->Form->control('dob');
                    echo $this->Form->control('gender');
                    echo $this->Form->control('email');
                    echo $this->Form->control('phone');
                    echo $this->Form->control('address');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
