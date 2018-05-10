<?php
namespace App\Controller\Component;

use Cake\Controller\Component;

use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\I18n\Date;
use Cake\ORM\Query;

class ReportComponent extends Component
{
   public function getStudentsEnrolled($data)
	{
		$trUserDetails = TableRegistry::get('Userdetails');	
			//$query = $trUserDetails->find("all")->contain(['Courses']);
			//pr($query->toArray()); die;
		$val = array_keys($data) ;
		$v = $val[0];
		if($v=='1')
		{	$now = Time::now();
			$cm = $now->month;
			$cy = $now->year;
			
			 $trUsers = TableRegistry::get('Users');
         	 $currentMonthUserCount = $trUsers->find()->select('created')->where(['role'=>1,'MONTH(created)'=>$cm,'YEAR(created)'=>$cy])->count();
         	 return $currentMonthUserCount;
         	
		}
		else
		{
			$trUserDetails = TableRegistry::get('Userdetails');	
			$query = $trUserDetails->find()->contain(['Courses']);
			//pr($query->toArray());die;
			 $courseUserCount = $query->select(['Courses.name','course_id','count' =>$query->func()->count('course_id')])->group('course_id');
			//$courseUserCount = $query->contain(['Courses']);
			//pr($courseUserCount->toArray());die;
			 return $courseUserCount;
		}


	}

	public function getFeePaid($data)
	{
		$val = array_keys($data) ;
		$v = $val[0];
		//return $v;
		if($v=='1')
		{	$now = Time::now();
			$cm = $now->month;
			$cy = $now->year;
			
			 $trUserFees = TableRegistry::get('Userfees');
         	$query = $trUserFees->find();
			$currentYearPaidFee = $query->select(['sum' =>$query->func()->sum('feePaid')])->where(['MONTH(created)'=>$cm,'YEAR(created)'=>$cy]);
			return $currentYearPaidFee;
         	
		}
		else
		{
			$trUserDetails = TableRegistry::get('Userdetails');	
			$query = $trUserDetails->find();
			$totalPaidFeeByCourse = $query->select(['course','sum' =>$query->func()->sum('feePaid')])->group('course');
			
			 return $totalPaidFeeByCourse;
		}
	}


	public function getProfit($data)
	{
		//$val = array_keys($data) ;
		//pr($data);die("hello");
		$start = $data['start'];
		$end = $data['end'];
		$course = $data['course'];

		//pr($end);die("hello");
		
			$now = Time::now();
			$cm = $now->month;
			$cy = $now->year;
			
			 $trUserDetails = TableRegistry::get('Users');
			 if(($start=='') &&($end==''))
			 {
			 	$query = $trUserDetails->find('all')->where(['Userdetails.course_id' => $course])->contain(['Userdetails']);
			 }

			 else if($course==0)
			 {
			 	$query = $trUserDetails->find('all')->where(['created <' => $end,'created >' => $start])->contain(['Userdetails']);
			 }
			 else
			 {
			 	$query = $trUserDetails->find('all')->where(['created <' => $end,'created >' => $start, 'Userdetails.course_id' => $course])->contain(['Userdetails']);
			 }
         	
         	//pr($query->toArray());die;

			$totalFeeGathered = $query->select(['sum' =>$query->func()->sum('Userdetails.totalFee')]);
			//pr($totalFeeGathered->toArray());die;
			$totalFee=$totalFeeGathered->toArray() ;
			$feeTotal=$totalFee[0]->sum;
			//pr($feeTotal);die;
			$trExpenses = TableRegistry::get('Examount');
			if(($start=='') &&($end==''))
			{
				$query = $trExpenses->find();
			}
			else
			{
				$query = $trExpenses->find('all')->where(['created <' => $end,'created >' => $start]);
			}
			
			$totalExpenses = $query->select(['sum' =>$query->func()->sum('amount')]);
			$expenses=$totalExpenses->toArray();
			$expenseTotal=$expenses[0]->sum;
			

			$totalBalance=$feeTotal-$expenseTotal;
			//pr($totalBalance);
			$arrprofit=['totalFee'=>$feeTotal,'totalExpense'=>$expenseTotal,'totalBalance'=>$totalBalance];
			//pr($arrprofit);die;
			return $arrprofit;



         	
		
		
	}
}
?>