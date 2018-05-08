<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Course $course
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Course'), ['action' => 'edit', $course->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Course'), ['action' => 'delete', $course->id], ['confirm' => __('Are you sure you want to delete # {0}?', $course->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Courses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Userdetails'), ['controller' => 'Userdetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Userdetail'), ['controller' => 'Userdetails', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="courses view large-9 medium-8 columns content">
    <h3><?= h($course->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($course->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($course->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Userdetails') ?></h4>
        <?php if (!empty($course->userdetails)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Roll') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Course Id') ?></th>
                <th scope="col"><?= __('Duration') ?></th>
                <th scope="col"><?= __('TotalFee') ?></th>
                <th scope="col"><?= __('FeePaid') ?></th>
                <th scope="col"><?= __('Image') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($course->userdetails as $userdetails): ?>
            <tr>
                <td><?= h($userdetails->id) ?></td>
                <td><?= h($userdetails->user_id) ?></td>
                <td><?= h($userdetails->roll) ?></td>
                <td><?= h($userdetails->address) ?></td>
                <td><?= h($userdetails->course_id) ?></td>
                <td><?= h($userdetails->duration) ?></td>
                <td><?= h($userdetails->totalFee) ?></td>
                <td><?= h($userdetails->feePaid) ?></td>
                <td><?= h($userdetails->image) ?></td>
                <td><?= h($userdetails->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Userdetails', 'action' => 'view', $userdetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Userdetails', 'action' => 'edit', $userdetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Userdetails', 'action' => 'delete', $userdetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userdetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
