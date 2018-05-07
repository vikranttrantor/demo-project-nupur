<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
$this->loadHelper('Report');
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
	<h2><legend><?= __('Fee Collected') ?></legend></h2>


	<?php echo $this->Form->control('feeCollected', array(
		'options' => ['Select Category','Current Month','Get By Course'],
		'id' => 'feeCollected',
		'class' => 'feeCollected'
		)); ?>

	<div class="showdata"></div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript">

		$('#feeCollected').change(function(){ 
			var url= '<?php echo $this->Url->build(['controller'=>'Reports','action' =>'feeCollected'])?>';
		 	//alert(url);
		 	var data=$(this).val();
		 	
		 	$.ajax({
		 		url : url,
		 		type: 'POST',
		 		data :data,
		 		success : function(data){
		 			console.log(data);
		 			var htmlCourse = '';
		 			if(jQuery.type(data)=="array")
		 			{
			 			htmlCourse = htmlCourse + '<h1>'+" Fee Paid "+'</h1>';
			 			$.each(data, function( index, value ) {
			 				if(value.course)
			 				{
			 					htmlCourse = htmlCourse + '<h3>'+value.course+'</h3>';
			 				}
			 				
			 				htmlCourse = htmlCourse + '<h3>'+value.sum+'</h3>';
			 				htmlCourse = htmlCourse + '<hr>';
			 			});
						$(".showdata").html(htmlCourse);
					}
					else
					{	
						htmlCourse = htmlCourse + '<h1>'+"Total Fee Paid Till Now"+'</h1>';
						htmlCourse = htmlCourse + '<h3>'+data+'</h3>';
						$(".showdata").html(htmlCourse);
					}
				}

			});
		 });

		</script>