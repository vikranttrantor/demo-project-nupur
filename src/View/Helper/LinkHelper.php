<?php 

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;

class LinkHelper extends Helper
{
    public function makeEdit($title, $url)
    {
        die("this is working");
    }

	public function getFeeStatus($t, $d, $bal)
	{


		$md = $t->month+$d;
		$y = $t->year;
		$day = $t->day;
		if($md>12) {
			$md=$md%12;
			$y=$y+1;
		}
		$now = Time::now();
		$nd=$now->setDate($y, $md,$day);
		$nd= $nd->modify("-6 days");
		$now = Time::now();
		//echo $nd;
		if(($now>=$nd)&&($bal>0)){return 1;}
		else{return 0; }

	}
	public function getCourseName($courseId)
	{
		 $trCourses = TableRegistry::get('Courses');
		 $query=$trCourses->find();
         $CourseName=$query->select(['name'])->where(['id'=>$courseId]);
         $course= $CourseName->toArray();
         return $course[0]->name;
	}
}