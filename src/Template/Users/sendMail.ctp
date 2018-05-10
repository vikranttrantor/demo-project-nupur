<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Examount $examount
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Amount under Categories'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Expense Categories'), ['controller' => 'Excategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Create Expense category'), ['controller' => 'Excategories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="examount form large-9 medium-8 columns content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Send Mail') ?></legend>
        <?php
            echo $this->Form->control('name', ['options' => $usernames]);
            
        ?>
    </fieldset>
    <?= $this->Form->button(__('Send')) ?>
    <?= $this->Form->end() ?>
</div>
