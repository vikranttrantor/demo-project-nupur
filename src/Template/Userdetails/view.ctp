<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Userdetail $userdetail
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Userdetail'), ['action' => 'edit', $userdetail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Userdetail'), ['action' => 'delete', $userdetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userdetail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Userdetails'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Userdetail'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userdetails view large-9 medium-8 columns content">
    <h3><?= h($userdetail->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $userdetail->has('user') ? $this->Html->link($userdetail->user->name, ['controller' => 'Users', 'action' => 'view', $userdetail->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($userdetail->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Course') ?></th>
            <td><?= h($userdetail->course) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= h($userdetail->image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($userdetail->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Roll') ?></th>
            <td><?= $this->Number->format($userdetail->roll) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Duration') ?></th>
            <td><?= $this->Number->format($userdetail->duration) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('TotalFee') ?></th>
            <td><?= $this->Number->format($userdetail->totalFee) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FeePaid') ?></th>
            <td><?= $this->Number->format($userdetail->feePaid) ?></td>
        </tr>
    </table>
</div>
