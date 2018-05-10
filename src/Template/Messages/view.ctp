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
       
        <li><?= $this->Html->link(__('List Messages'), ['action' => 'index']) ?> </li>
        
    </ul>
</nav>
<div class="messages view large-9 medium-8 columns content">
<table>
    <?php $adminId = $this->Message->getAdminId(); ?>
    <?php foreach ($message as $message): ?>

            <tr>
               
              <td class = <?php if($message->by_id == $adminId){ echo "right"; } else { echo "left"; } ?> ><?= $message->message ?></td>
                   
            </tr>
            <?php endforeach; ?>
        </table>
        <?= $this->Html->link('REPLY',['action'=>'add','admin', $userid ]); ?>

        <?php //echo $this->Form->Button('Reply',['action'=>'add','admin', $message->by_id]); ?>
       
    </div>


    <style>
    .right{
        align:right;
         background-color: #DCDCDC;
    }

    .left{
        align:left;
         background-color:#FFDAB9;
    }
  
</style>

