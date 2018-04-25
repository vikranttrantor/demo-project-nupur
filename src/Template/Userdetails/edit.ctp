<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Userdetail $userdetail
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $userdetail->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $userdetail->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Userdetails'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userdetails form large-9 medium-8 columns content">
    <?= $this->Form->create($userdetail) ?>
    <fieldset>
        <legend><?= __('Edit Userdetail') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('roll');
            echo $this->Form->control('address');
            echo $this->Form->control('course');
            echo $this->Form->control('duration');
            echo $this->Form->control('totalFee');
            echo $this->Form->control('feePaid');
            echo $this->Form->control('image');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
