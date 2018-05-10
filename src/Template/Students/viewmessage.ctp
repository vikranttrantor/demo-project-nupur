<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Message $message
 */
$this->loadHelper('Message');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
       
         <li><?= $this->Html->link(__('Goto Your Profile'), ['action' => 'index']) ?></li>
         <li><?= $this->Html->link(__('Write Message'), ['controller'=>'Messages','action' => 'add','student', $userid]) ?></li>

        
    </ul>
</nav>
<div class="messages view large-9 medium-8 columns content">
<table>
    <?php $adminId = $this->Message->getAdminId(); ?>
    <?php foreach ($message as $message): ?>

            <tr>
               
              <td ><?= $message->message ?></td>
                   
            </tr>
            <?php endforeach; ?>
        </table>
        

        <?php //echo $this->Form->Button('Reply',['action'=>'add','admin', $message->by_id]); ?>
       
    </div>


    <style>
    .right{
        align:right;
    }

    .left{
        align:left;
    }
  
</style>

