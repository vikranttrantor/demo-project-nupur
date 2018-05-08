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
	<h2><legend><?= __('Get Students Enroll') ?></legend></h2>


	<?php echo $this->Form->control('enroll', array(
		'options' => ['Select Category','Current Month','Get By Course'],
		'id' => 'enroll',
		'class' => 'enroll'
		)); ?>

	<div class="showdata"></div>
	<div class="chart" id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

</div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="https://code.highcharts.com/modules/export-data.js"></script>
	<script type="text/javascript">

		$('#enroll').change(function(){ 
			var url= '<?php echo $this->Url->build(['controller'=>'Reports','action' =>'studentEnroll'])?>';
		 	//alert(url);
		 	var data=$(this).val();
		 	
		 	$.ajax({
		 		url : url,
		 		type: 'POST',
		 		data :data,
		 		success : function(data){
		 			console.log(data);
		 			var htmlCourse = '';
		 			var enrolledByCourse = [];
		 			if(jQuery.type(data)=="array")
		 			{
			 			
			 			$.each(data, function( index, value ) {
			 				htmlCourse = htmlCourse + '<h1>'+value.course.name+'</h1>';
			 				htmlCourse = htmlCourse + '<h3>'+value.count+'</h3>';
			 				htmlCourse = htmlCourse + '<hr>';
			 				 enrolledByCourse.push({name:value.course.name , y:value.count});
			 			});
						$(".showdata").html(htmlCourse);

						//console.log(enrolledByCourse);						


						Highcharts.chart('container', {
						  chart: {
						    plotBackgroundColor: null,
						    plotBorderWidth: null,
						    plotShadow: false,
						    type: 'pie'
						  },
						  title: {
						    text: ''
						  },
						  tooltip: {
						    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
						  },
						  plotOptions: {
						    pie: {
						      allowPointSelect: true,
						      cursor: 'pointer',
						      dataLabels: {
						        enabled: true,
						        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
						        style: {
						          color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
						        }
						      }
						    }
						  },
						  series: [{
						    name: 'Brands',
						    colorByPoint: true,
						    data: enrolledByCourse
						  }]
						});
						$('.chart').show();

					}
					else
					{	$('.chart').hide();
						htmlCourse = htmlCourse + '<h1>'+"Current Month User Count"+'</h1>';
						htmlCourse = htmlCourse + '<h3>'+data+'</h3>';
						$(".showdata").html(htmlCourse);
					}
				}

			});
		 });

		

		

		</script>


