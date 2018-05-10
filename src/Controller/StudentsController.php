<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Students Controller
 *
 *
 * @method \App\Model\Entity\Student[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StudentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {   
      // $id=$this->request->getParam('pass');
       //$id=$user['id'];
       // pr($_SESSION['Auth']['User']['id']);die;
       //$id=$user->find('id');
       //pr($id);die;
      $id = $_SESSION['Auth']['User']['id'];

        $tr = TableRegistry::get('Users');
        $user = $tr->get($id, [
            'contain' => ['Userdetails']
        ]);
       // pr($user);die;
         $trDetails = TableRegistry::get('Userdetails');
          $data = $trDetails->find()->select(['Courses.name'])->where(['user_id'=>$id])->contain(['Courses']);
       $cName = $data->toArray();
       $cName = $cName[0]->Courses->name;
       //pr($cName);die;

        $this->set('user', $user);
        $this->set('course' , $cName);
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function paysummary($userId)
    {
     //  $this->paginate = [
        //     'contain' => ['Users']
        // ];
       // $userfees = $this->paginate($this->Userfees);

        //$this->set(compact('userfees'));
        // $u_id=$this->request->getParam('pass');
         $truser_fee=TableRegistry::get('Userfees');
        // pr($u_id);die;
        $summary=$truser_fee->find("all")->where(['user_id'=>$userId])->contain(['Users']);
         $userfees = $this->paginate($summary);
         $this->set(compact('userfees'));
    }

    public function viewmessage($userId)
    {
      $trMessages = TableRegistry::get('Messages');
        $query = $trMessages->find();
       // $adminId=$this->Adminid->getAdminId();
        $message = $query->select(['message','to_id'])->where(['to_id'=>$userId]);
       // pr($message->toArray());die;

        $query1 = $trMessages->query();
        $query1->update()
                ->set(['status' => 1])
                ->where(['to_id' => $userId])
                ->execute();
        $this->set('message', $message);
        $this->set('userid',$userId);
    }
}
