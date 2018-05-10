<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
//use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;
class AdminidComponent extends Component
{
	public function getAdminId()
	{
		$trUsers = TableRegistry::get('Users');
		$adminId = $trUsers->find('all')->select(['id'])->where(['role'=>0]);
		$adminid = $adminId->toArray();
		return($adminid[0]->id);
	}

}



?>