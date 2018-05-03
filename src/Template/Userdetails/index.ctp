<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Userdetail[]|\Cake\Collection\CollectionInterface $userdetails
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Userdetail'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userdetails index large-9 medium-8 columns content">
    <h3><?= __('Userdetails') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('roll') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('course') ?></th>
                <th scope="col"><?= $this->Paginator->sort('duration') ?></th>
                <th scope="col"><?= $this->Paginator->sort('totalFee') ?></th>
                <th scope="col"><?= $this->Paginator->sort('feePaid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userdetails as $userdetail): ?>
            <tr>
                <td><?= $this->Number->format($userdetail->id) ?></td>
                <td><?= $userdetail->has('user') ? $this->Html->link($userdetail->user->name, ['controller' => 'Users', 'action' => 'view', $userdetail->user->id]) : '' ?></td>
                <td><?= $this->Number->format($userdetail->roll) ?></td>
                <td><?= h($userdetail->address) ?></td>
                <td><?= h($userdetail->course) ?></td>
                <td><?= $this->Number->format($userdetail->duration) ?></td>
                <td><?= $this->Number->format($userdetail->totalFee) ?></td>
                <td><?= $this->Number->format($userdetail->feePaid) ?></td>
                <td><?= h($userdetail->image) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $userdetail->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userdetail->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userdetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userdetail->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
