<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Examount[]|\Cake\Collection\CollectionInterface $examount
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
         <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>

        <li><?= $this->Html->link(__('Add expense'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Expense Categories'), ['controller' => 'Excategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Create Expense category'), ['controller' => 'Excategories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="examount index large-9 medium-8 columns content">
    <h3><?= __('Expense amount Under different Categories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('excategory_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($examount as $examount): ?>
            <tr>
                <td><?= $this->Number->format($examount->id) ?></td>
                <td><?= $examount->has('excategory') ? $this->Html->link($examount->excategory->name, ['controller' => 'Excategories', 'action' => 'view', $examount->excategory->id]) : '' ?></td>
                <td><?= $this->Number->format($examount->amount) ?></td>
                <td><?= h($examount->created) ?></td>
                <td><?= h($examount->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $examount->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $examount->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $examount->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examount->id)]) ?>
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
