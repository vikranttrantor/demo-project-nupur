<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>

  


<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Create New Student'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Logout'), ['action' => 'logout']) ?></li>
    </ul>
</nav>
<div class="users index large-9 medium-8 columns content">
    <h3><?= __('Student Listing') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('emailId') ?></th>
                <th scope="col"><?= $this->Paginator->sort('roll') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('course') ?></th>
                <th scope="col"><?= $this->Paginator->sort('duration') ?></th>
                <th scope="col"><?= $this->Paginator->sort('totalFee') ?></th>
                <th scope="col"><?= $this->Paginator->sort('feePaid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('feeLeft') ?></th>
                
                
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fee') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                
                <td><?= h($user->name) ?></td>
                <td><?= h($user->emailId) ?></td>
                <td><?= h($user->userdetail->roll) ?></td>
                <td><?= h($user->userdetail->address) ?></td>
                <td><?= h($user->userdetail->course) ?></td>
                <td><?= h($user->userdetail->duration) ?></td>
                <td><?= h($user->userdetail->totalFee) ?></td>
                <td><?= h($user->userdetail->feePaid) ?></td>
                <td><?= h($user->userdetail->totalFee-$user->userdetail->feePaid) ?></td>
                <td><?= h($user->created) ?></td>
                <td><?= h($user->modified) ?></td>
                <td><a  class="modale" data-toggle="modal" data-target="#exampleModal" data-id="<?=$user->id?>" >pay</a>
                <?= $this->Html->link(__('View Pay Summary'), ['controller'=>'Userfees','action' => 'index', $user->id]) ?>  </td>
                <td class="actions">

                    <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>   
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>             
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pay Course Fee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
             <?php echo $this->Form->create('', ['url' => ['controller'=>'Userfees','action' => 'add']]); ?>
                      <?php  echo $this->Form->label('Amount'); ?>
                      <input type="text" name="feePaid" id="feePaid" value=""/>

            <div class="amount">
           
            <input type="hidden" name="user_id" id="user_id" value=""/>
             </div>
  

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       <!-- <button type="button" class="btn btn-primary">Save changes</button>-->
        <?= $this->Form->button(__('Submit')) ?>
         <?= $this->Form->end() ?>
       <!--<?= $this->Html->link(__('Save'), ['controller'=>'Userfees','action' => 'add']) ?>-->
      </div>
    </div>
  </div>
</div>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>


<script>
$(document).on("click", ".modale", function () {
     var userid = $(this).data('id');
     $(".amount #user_id").val( userid );
   
});
</script>