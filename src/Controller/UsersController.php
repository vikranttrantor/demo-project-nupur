<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {   
         $tr=TableRegistry::get('Users');
         $s=$tr->find('all')->where(['role'=>1])->contain(['Userdetails']);

        $users = $this->paginate($s);
         //pr($users);die;
        

        $this->set(compact('users'));

    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {   
          $tr=TableRegistry::get('Users');
        $user = $tr->get($id, [
            'contain' => ['Userdetails']
        ]);
      //  pr($user);die;

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {   
        $tr=TableRegistry::get('Users');
        $user=$tr->newEntity();
        
        if ($this->request->is('post')) {
            $data=$this->request->getData();

            $user = $tr->newEntity($data, ['associated' => ['Userdetails']] );
            $user['role']=1;
           // pr($user);die;
            $user = $tr->patchEntity($user, $this->request->getData(),['associated' => ['Userdetails']]);
            //pr($user);die;
       
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {   
         $tr=TableRegistry::get('Users');
        $user = $tr->get($id, [
            'contain' => ['Userdetails']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $tr->patchEntity($user, $this->request->getData(),['associated' => ['Userdetails']]);

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tr=TableRegistry::get('Users');
        $user = $tr->get($id, [
            'contain' => ['Userdetails']
        ]);
        //pr($user);die;
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

       public function login()
    {
        if ($this->request->is('post')) 
        {
            $user = $this->Auth->identify();
               // pr($user);die;
            if ($user) 
            {
                $this->Auth->setUser($user);
                $dbrole=$user['role'];//pr($dbrole);die;
                $id=$user['id'];
                if($dbrole==0)
                {   
                    return $this->redirect(['controller'=>'Users','action'=>'index']);
                }                       
                else
                {
                    return $this->redirect(['controller'=>'Students','action'=>'index',$id]);
                }
                  
                //$this->redirect($this->Auth->redirectUrl());
            }
                     
            else
            {
                $this->Flash->error(__('Username or password is incorrect'));
            } 
        }
            
           
        
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
}
