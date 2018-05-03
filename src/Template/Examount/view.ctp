<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Examount $examount
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Expense amount'), ['action' => 'edit', $examount->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Expense amount'), ['action' => 'delete', $examount->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examount->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Amount under Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Expense amount'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Expense categories'), ['controller' => 'Excategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Create Expense category'), ['controller' => 'Excategories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="examount view large-9 medium-8 columns content">
    <h3><?= h($examount->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Expense category') ?></th>
            <td><?= $examount->has('excategory') ? $this->Html->link($examount->excategory->name, ['controller' => 'Excategories', 'action' => 'view', $examount->excategory->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($examount->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($examount->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($examount->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($examount->modified) ?></td>
        </tr>
    </table>
</div>
