<?php 

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;
use Cake\ORM\Query;


class MessageHelper extends Helper
{
    
	public function getTotalMessageCount($byId)
	{
		$trMessages = TableRegistry::get('Messages');
		$query = $trMessages->find();
		 $totalMessageCount = $query->select(['count' =>$query->func()->count('by_id')])->where(['by_id'=>$byId]);
		//  pr($totalMessageCount->toArray());die;
		  $count = $totalMessageCount->toArray();
		  $totalCount = $count[0]->count;
		 return($totalCount);
		


	}

	public function getUnreadMessageCount($byId)
	{
		$trMessages = TableRegistry::get('Messages');
		$query = $trMessages->find();
		 $unreadMessageCount = $query->select(['count' =>$query->func()->count('by_id')])->where(['by_id'=>$byId, 'status'=>0]);
		  $count = $unreadMessageCount->toArray();
		  $unreadCount = $count[0]->count;
		 return($unreadCount);
		

	}

	public function getAdminId()
	{
		$trUsers = TableRegistry::get('Users');
		$adminId = $trUsers->find('all')->select(['id'])->where(['role'=>0]);
		$adminid = $adminId->toArray();
		//pr($adminid[0]->id);die;
		return($adminid[0]->id);
	}

	public function getUnreadMessageCountS($toId)
	{
		$trMessages = TableRegistry::get('Messages');
		$query = $trMessages->find();
		 $unreadMessageCount = $query->select(['count' =>$query->func()->count('by_id')])->where(['to_id'=>$toId, 'status'=>0]);
		  $count = $unreadMessageCount->toArray();
		  $unreadCount = $count[0]->count;
		 return($unreadCount);
		

	}


}
?>