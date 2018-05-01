<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user, ['enctype' => 'multipart/form-data']) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('emailId');
            echo $this->Form->control('password');
            echo $this->Form->control('userdetail.roll');
            echo $this->Form->control('userdetail.address');
            echo $this->Form->control('userdetail.course');
            echo $this->Form->control('userdetail.duration');
            echo $this->Form->control('userdetail.totalFee');
            echo  $this->Form->control('userdetail.image', ['type' => 'file', 'required'=>false]);
           echo $this->Html->image('upload/studentImage/'.$user->userdetail->image, array('alt' => 'CakePHP', 'height'=>'200','width'=>'200')) ;
              
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
