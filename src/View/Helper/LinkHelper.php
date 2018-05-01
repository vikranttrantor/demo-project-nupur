<?php 

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\I18n\Time;

class LinkHelper extends Helper
{
    public function makeEdit($title, $url)
    {
        die("this is working");
    }

	public function getFeeStatus($t, $d)
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
		if($now>=$nd){return 1;}
		else{return 0; }

	}
}