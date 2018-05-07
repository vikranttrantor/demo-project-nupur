

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
$this->loadHelper('Report');
echo $this->Html->script('/js/jspdf.min.js');
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

<div class="users form large-9 medium-8 columns content">
	<h2><legend><?= __('Balance') ?></legend></h2> 
    

    <?php echo $this->Form->control('download', array(
        'options' => ['Select Category','PDF','XLS'],
        'id' => 'dwnld',
        'class' => 'dwnld'
        )); ?>
        <a id="btn_dwnld"> <button id="btnExport" onclick="write_to_sheet();"> Download</button></a>

    <div id="dwn">
    <?php
    $data=$this->Report->getBalance(); ?>
    <h4> Total:</h4><?php pr($data[0]); ?>
    <h4> Total Paid:</h4><?php pr($data[1]); ?>
    <h4> Total Balance:</h4><?php pr($data[2]); ?>
    </div>
    
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">

    function write_to_sheet() 
    {
        var type=$("#dwnld").val();
        console.log(type);
       
         var dt = new Date();
        var day = dt.getDate();
        var month = dt.getMonth() + 1;
        var year = dt.getFullYear();
        var hour = dt.getHours();
        var mins = dt.getMinutes();
        var name="fee_balance";
        
        var postfix = day + "." + month + "." + year + "_" + hour + "." + mins;

        if(type=="2")
        {   var dwn_name=name+"_"+ postfix + '.xls';
            var data_type = 'data:application/vnd.ms-excel';
                    var a = document.getElementById('btn_dwnld');

            var table_div = document.getElementById('dwn');
            var table_html = table_div.outerHTML.replace(/ /g, '%20');
            a.href = data_type + ', ' + table_html;
            
           // document.body.appendChild(a);
            a.download = dwn_name;
            //triggering the function
            //a.click();

        }
        if(type=="1")
        {   var dwnpdf= name+"_" +postfix + '.pdf';
             var pdf = new jsPDF('p', 'pt', 'ledger');
               
                source = $('#dwn')[0];
               margins = {
                    top : 80,
                    bottom : 60,
                    left : 60,
                    width : 522
                };
               
                pdf.fromHTML(source, 
                margins.left, // x coord
                margins.top, { // y coord
                    'width' : margins.width// max width of content on PDF
                    
                },

                function(dispose) {
                   
                    pdf.save(dwnpdf);
                }, margins);
        }

       
       
        
       
 
}
</script>
  






