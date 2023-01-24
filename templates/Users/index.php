<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>
<div class="users index content">
    <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Users') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('username') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('image') ?></th>
                    <th><?= $this->Paginator->sort('subtitle') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $post): ?>
                <tr>
                    <td><?= $this->Number->format($post->id) ?></td>
                    
                    <td><?= h($post->user->username) ?></td>
                    <td><?= h($post->title) ?></td>
                    <td><?= h($post->image) ?></td>
                    <td><?= h($post->subtitle) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'viewpost', $post->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'editpost', $post->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'postdelete', $post->id], ['confirm' => __('Are you sure you want to delete # {0}?', $post->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
</div>
