<?php 

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;


class ReportHelper extends Helper
{
    

	public function getBalance()
	{
		$trUsers = TableRegistry::get('Userdetails');
		$query = $trUsers->find();
		$query->select(['sum' => $query->func()->sum('totalFee')]);
		
		$query->select(['paid' => $query->func()->sum('feePaid')]);
		$query=$query->toArray();	
		$total=$query[0]['sum'];
		$paid=$query[0]['paid'];

		$bal=$total-$paid;
		$data=array($total,$paid,$bal);
		return $data;
		
		

	}

	
}
?>