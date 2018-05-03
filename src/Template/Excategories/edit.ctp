<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Excategory $excategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $excategory->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $excategory->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Expense Categories'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Amount under Categories'), ['controller' => 'Examount', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Add expense'), ['controller' => 'Examount', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="excategories form large-9 medium-8 columns content">
    <?= $this->Form->create($excategory) ?>
    <fieldset>
        <legend><?= __('Edit Expense Category') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
