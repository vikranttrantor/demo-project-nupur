<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Userfee[]|\Cake\Collection\CollectionInterface $userfees
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        
        <li><?= $this->Html->link(__('Goto Your Profile'), ['action' => 'index']) ?></li>
        
    </ul>
</nav>
<div class="userfees index large-9 medium-8 columns content">
    <h3><?= __('Userfees') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('feePaid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
               
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userfees as $userfee): ?>
            <tr>
                <td><?= $this->Number->format($userfee->id) ?></td>
                <td><?= $userfee->has('user') ? $this->Html->link($userfee->user->name, ['controller' => 'Users', 'action' => 'view', $userfee->user->id]) : '' ?></td>
                <td><?= $this->Number->format($userfee->feePaid) ?></td>
                <td><?= h($this->Time->format($userfee->created, \IntlDateFormatter::LONG, null, 'Asia/Kolkata')) ?></td>
                <td><?=h($this->Time->format($userfee->modified, \IntlDateFormatter::LONG, null, 'Asia/Kolkata'))  ?></td>
               
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
