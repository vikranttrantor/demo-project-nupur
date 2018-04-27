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
       $id=$this->request->getParam('pass');
      $id=$id[0];

        $tr=TableRegistry::get('Users');
        $user = $tr->get($id, [
            'contain' => ['Userdetails']
        ]);
        //pr($user);die;

        $this->set('user', $user);
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
}
