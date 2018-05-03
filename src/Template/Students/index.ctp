<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
       
        <li><?= $this->Html->link(__('Logout'), ['action' => 'logout']) ?></li>
        
            
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->name) ?></h3>
    <table class="vertical-table">
         <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('EmailId') ?></th>
            <td><?= h($user->emailId) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Roll') ?></th>
            <td><?= h($user->userdetail->roll) ?></td>
        </tr>
       
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($user->userdetail->address) ?></td>
        </tr>
         <tr>
            <th scope="row"><?= __('Course') ?></th>
            <td><?= h($user->userdetail->course) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Fee') ?></th>
            <td><?= h($user->userdetail->totalFee) ?></td>
        </tr>
         <tr>
            <th scope="row"><?= __('Fee Paid') ?></th>
            <td><?= h($user->userdetail->feepaid) ?></td>
        </tr>
         <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= $this->Html->image('upload/studentImage/'.$user->userdetail->image, array('alt' => 'CakePHP', 'height'=>'200','width'=>'200')) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
<script>
 $(".popupButton").click(function(){ 
                //centering with css 
                centerPopup(); 
                //load popup 
                loadPopup(this); 

                return false; 
        }); 
 



</script> 