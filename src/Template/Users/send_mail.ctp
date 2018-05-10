<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Examount $examount
 */echo $this->Html->script('ckeditor/ckeditor', array('inline' => false));

?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
         <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="examount form large-9 medium-8 columns content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Send Mail') ?></legend>
        <?php
            echo $this->Form->control('name', ['options' => $usernames]);
              echo $this->Form->control('subject');
            echo $this->Form->label('message');
            echo $this->Form->textarea('message', array('class'=>'ckeditor'));
            
        ?>
    </fieldset>
    <?= $this->Form->button(__('Send')) ?>
    <?= $this->Form->end() ?>
</div>
