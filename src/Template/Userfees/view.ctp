<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Userfee $userfee
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Userfee'), ['action' => 'edit', $userfee->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Userfee'), ['action' => 'delete', $userfee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userfee->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Userfees'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Userfee'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userfees view large-9 medium-8 columns content">
    <h3><?= h($userfee->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $userfee->has('user') ? $this->Html->link($userfee->user->name, ['controller' => 'Users', 'action' => 'view', $userfee->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($userfee->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FeePaid') ?></th>
            <td><?= $this->Number->format($userfee->feePaid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($userfee->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($userfee->modified) ?></td>
        </tr>
    </table>
</div>
