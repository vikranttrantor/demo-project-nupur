<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css"></script>
<script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
$this->loadHelper('Report');

//echo $this->Html->script("moment.min.js");
echo $this->Html->script("daterangepicker.js");
echo $this->Html->css("daterangepicker.css");

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
	<h2><legend><?= __('Profit') ?></legend></h2>

 

	
	<?php echo $this->Form->label("Select Date Range"); ?>
	<div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
    <i class="fa fa-calendar"></i>&nbsp;
    <span></span> <i class="fa fa-caret-down"></i>
</div>
<?php echo $this->Form->control('userdetail.course_id', ['options' => $courses, "id"=>'courses']); ?>
<div class="showdata"></div>
</div>


	<script type="text/javascript">
		var start='';
		var end='';

		$(function() {

					    //var start = moment().subtract(29, 'days');
					   
					   // var end = moment();

					    function cb(start, end) {
					        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
					    }

					    $('#reportrange').daterangepicker({
					    	 autoUpdateInput: false,
						      locale: {
						          cancelLabel: 'Clear'
						      },
					        //startDate: start,
					       // endDate: end,
					        ranges: {
					           
					           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
					           'This Month': [moment().startOf('month'), moment()],
					           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
					           'Last 3 Months': [moment().subtract(3, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
					           'Last 6 Months': [moment().subtract(6, 'month').startOf('month'),moment().subtract(1, 'month').endOf('month')]
					        }
					    }, cb);

					    

					    cb(start, end);
					    //console.log(start);



					});

		
		
		$('#reportrange').on('apply.daterangepicker', function(ev, picker) {
               
              	  start = picker.startDate.format('YYYY-MM-DD');
                  end = picker.endDate.format('YYYY-MM-DD');
                 var url = "<?php echo $this->Url->build(['controller'=>'Reports','action' =>'profit'])?>";
                 var course=$('#courses').val();
                 //console.log(course);
                 var dates={start:start,end:end,course:course};
                 //var dates="start";
                 // console.log(dates);
                 $.ajax({
					 		url : url,
					 		type : 'POST',
					 		data : dates,
					 		success : function(data){
					 			console.log("-----------------");
					 			console.log(data);
					 			// var htmlCourse = '';
					 			

									// htmlCourse = htmlCourse + '<h1>'+"Total Fee Gathered"+'</h1>';
									// htmlCourse = htmlCourse + '<h3>'+data.totalFee+'</h3>';
									// htmlCourse = htmlCourse + '<hr>';
									// htmlCourse = htmlCourse + '<h1>'+"Total Expenses"+'</h1>';
									// htmlCourse = htmlCourse + '<h3>'+data.totalExpense+'</h3>';
									// htmlCourse = htmlCourse + '<hr>';
									// htmlCourse = htmlCourse + '<h1>'+"Total Profit"+'</h1>';
									// htmlCourse = htmlCourse + '<h3>'+data.totalBalance+'</h3>';
									// htmlCourse = htmlCourse + '<hr>';
									// $(".showdata").html(htmlCourse);
								
							}

						});
	     });

		$('#courses').on('change',function()
		{
			
                 var url = '<?php echo $this->Url->build(['controller'=>'Reports','action' =>'profit'])?>';
                 var course=$('#courses').val();
                 //console.log(course);
                 var dates={start:start,end:end,course:course};
                 console.log(dates);
                 $.ajax({
					 		url : url,
					 		type : 'POST',
					 		data : dates,
					 		success : function(data){
					 			
								
							}

						});

		});


 
		</script>