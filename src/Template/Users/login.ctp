<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>

<div class="employees form large-9 medium-8 columns content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Please Login to continue') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('password');
            /*echo $this->Form->label('Login As');
           echo $this->Form->select('role',['Admin','Student']);*/
            
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

