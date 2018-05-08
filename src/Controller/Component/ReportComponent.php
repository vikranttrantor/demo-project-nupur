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
		$val = array_keys($data) ;
		$v = $val[0];
		//return $v;
		if($v=='1')
		{	$now = Time::now();
			$cm = $now->month;
			$cy = $now->year;
			
			 $trUserDetails = TableRegistry::get('Userdetails');
         	$query = $trUserDetails->find();
			$totalFeeGathered = $query->select(['sum' =>$query->func()->sum('totalFee')]);
			$totalFee=$totalFeeGathered->toArray() ;
			$feeTotal=$totalFee[0]->sum;

			$trExpenses = TableRegistry::get('Examount');
			$query = $trExpenses->find();
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
}
?>