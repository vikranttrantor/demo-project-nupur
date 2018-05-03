<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Excategory $excategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Expense category'), ['action' => 'edit', $excategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Expense category'), ['action' => 'delete', $excategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $excategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Expense Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Create Expense category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Amount under Categories'), ['controller' => 'Examount', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Add expense'), ['controller' => 'Examount', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="excategories view large-9 medium-8 columns content">
    <h3><?= h($excategory->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($excategory->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($excategory->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Expense amount') ?></h4>
        <?php if (!empty($excategory->examount)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Excategory Id') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($excategory->examount as $examount): ?>
            <tr>
                <td><?= h($examount->id) ?></td>
                <td><?= h($examount->excategory_id) ?></td>
                <td><?= h($examount->amount) ?></td>
                <td><?= h($examount->created) ?></td>
                <td><?= h($examount->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Examount', 'action' => 'view', $examount->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Examount', 'action' => 'edit', $examount->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Examount', 'action' => 'delete', $examount->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examount->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
