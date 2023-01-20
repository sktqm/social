<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?php
            echo $this->Html->link(__('List Post'), ['controller' => 'users', 'action' => 'view', $post->userid], ['class' => 'side-nav-item']);
            ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="post form content">
            <?= $this->Form->create($post, ['enctype' => 'multipart/form-data']) ?>
            <fieldset>
                <legend><?= __('Edit Post') ?></legend>
                <div class="row">
                    <div class="col-md-6">
                        <?php echo $this->Form->control('post_image', ['type' => 'file', 'required' => 'false']); ?>
                    </div>
                    <div class="col-md-6">
                        <td><?= $this->Html->image(h($post->post_image), array('width' => '300px')) ?></td>
                    </div>
                </div>
                <?php
                echo $this->Form->control('title');
                echo $this->Form->control('body');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>