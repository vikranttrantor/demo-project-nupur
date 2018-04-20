<!--<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Admin[]|\Cake\Collection\CollectionInterface $admins
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Student'), ['controller'=>'Students','action' => 'add']) ?></li>
    </ul>
</nav>
<div class="admins index large-9 medium-8 columns content">
    <h3><?= __('Admins') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('emailId') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($admins as $admin): ?>
            <tr>
                <td><?= $this->Number->format($admin->id) ?></td>
                <td><?= h($admin->name) ?></td>
                <td><?= h($admin->emailId) ?></td>
                <td><?= h($admin->password) ?></td>
                <td><?= h($admin->created) ?></td>
                <td><?= h($admin->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $admin->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $admin->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $admin->id], ['confirm' => __('Are you sure you want to delete # {0}?', $admin->id)]) ?>
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
-->


<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Student[]|\Cake\Collection\CollectionInterface $students
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Student'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="students index large-9 medium-8 columns content">
    <h3><?= __('Students') ?></h3>
    <table cellpadding="0" cellspacing="0" >
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('emailId') ?></th>
                
                <th scope="col"><?= $this->Paginator->sort('rollno') ?></th>
                <th scope="col"><?= $this->Paginator->sort('courseName') ?></th>
                <th scope="col"><?= $this->Paginator->sort('duration') ?></th>
                <th scope="col"><?= $this->Paginator->sort('totalCourseFee') ?></th>
                <th scope="col"><?= $this->Paginator->sort('feePaid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
            <tr>
                <td><?= $this->Number->format($student->id) ?></td>
                <td><?= h($student->name) ?></td>
                <td><?= h($student->emailId) ?></td>
                <td><?= h($student->password) ?></td>
                <td><?= h($student->rollno) ?></td>
                <td><?= h($student->courseName) ?></td>
                <td><?= h($student->duration) ?></td>
                <td><?= h($student->totalCourseFee) ?></td>
                <td><?= h($student->feePaid) ?></td>
                <td><?= h($student->image) ?></td>
                <td><?= h($student->created) ?></td>
                <td><?= h($student->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $student->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $student->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $student->id], ['confirm' => __('Are you sure you want to delete # {0}?', $student->id)]) ?>
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
