<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Message $message
 */
echo $this->Html->script('ckeditor/ckeditor', array('inline' => false));

 $unreadMsgCount = $this->Message->getUnreadMessageCountS($usrId); 
 //pr($unreadMsgCount);die;
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        
        <li><?php if($usr=='admin')
        {
            echo $this->Html->link(__('List messages'), ['controller' => 'Messages', 'action' => 'index']); 
        } 
        else
        {
           echo $this->Html->link(__('Goto your profile'), ['controller' => 'Students', 'action' => 'index']); 
        }?>
        </li>
       
    </ul>
</nav>
<div class="messages form large-9 medium-8 columns content">
    <?= $this->Form->create($message) ?>
    <fieldset>
        <legend><?= __('Add Message')?> 
            <?php if($unreadMsgCount>0) {
                                            echo $this->Html->link(__("($unreadMsgCount message received from Admin)"), ['controller' => 'Students', 'action' => 'viewmessage', $usrId ]);  
                                      } ?></legend>
        <?php
        
            
            //echo $this->Form->control('by_id',['options' => $users]);
            //echo $this->Form->control('to_id', ['options' => $users]);
            echo $this->Form->control('message', array('class'=>'ckeditor'));
            //echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
