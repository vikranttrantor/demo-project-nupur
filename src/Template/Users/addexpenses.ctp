<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Expense Categories'), ['controller'=>'Excategories','action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?php //$this->Form->create($excategorieslist)?>
    <form action="addamount" method="post">
        
    <fieldset>
        <legend><?= __('Add Expenses') ?></legend>
        <?php
       // pr($excategorieslist);die;
        echo $this->Form->select('field', $optionsArr);
        echo $this->Form->control('amount',['required'=>'true']);
       ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?php //$this->Form->end() ?>
    </form>
</div>
