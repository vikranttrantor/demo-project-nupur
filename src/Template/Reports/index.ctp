<?php
?>




<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
      <li><?= $this->Html->link(__(' List Users'), ['controller'=>'Users','action' => 'index']) ?></li>
        <li class="heading"><?= __('Reporting') ?></li>
        <li><?= $this->Html->link(__(' Get By Students Enrolled'), ['action' => 'studentEnroll']) ?></li>
        <li><?= $this->Html->link(__('Get By Fee Collected'), ['action' => 'feeCollected']) ?></li>
        <li><?= $this->Html->link(__('Get By Fee Balance'), ['action' => 'feeBalance']) ?></li>
        <li><?= $this->Html->link(__('Get By Profit'), ['action' => 'profit']) ?></li>
       
    </ul>
</nav>


  






