<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

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
         $trUsers = TableRegistry::get('Users');
         $allUsers = $trUsers->find('all')->where(['role'=>1])->contain(['Userdetails']);

        $users = $this->paginate($allUsers);
        

        $this->set('users',$allUsers);

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

            $data1=$data['userdetail'];
            $file=$data1['image'];
          //  $data1['image']=$file['name'];


                $ext = substr(strtolower(strrchr($file['name'], '.')), 1); 
                $arr_ext = array('jpg', 'jpeg', 'gif', 'png'); 
                $setNewFileName = time() . "_" . $data['name'];
              
                if (in_array($ext, $arr_ext)) {
                  
                    move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/upload/studentImage/' . $setNewFileName . '.' . $ext);
                    $imageFileName = $setNewFileName . '.' . $ext;
                    
                }
               
            $data['userdetail']['image']=$imageFileName;
                  
            $user = $tr->newEntity($data, ['associated' => ['Userdetails']] );

            $user['role']=1;
            $user->userdetail['status']=1;

             $user->userdetail['image']=$imageFileName;
           
       
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
            $data=$this->request->getData();
            
            $data1=$data['userdetail'];
            $file=$data1['image'];

         
            $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                $arr_ext = array('jpg', 'jpeg', 'gif', 'png'); //set allowed extensions
                $setNewFileName = time() . "_" . $data['name'];
            
                if (in_array($ext, $arr_ext)) {
                    
                    move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/upload/studentImage/' . $setNewFileName . '.' . $ext);

                   
                    $imageFileName = $setNewFileName . '.' . $ext;
                  
                    }
               
               
            if($data['userdetail']['image']['name'])
            {
              //pr( $data['userdetail']['image']);
                $data['userdetail']['image']=$imageFileName;
            }
            else
            {   //echo 1;
                unset($data['userdetail']['image']);
            }
           // pr( $data);die;

              
            $user = $tr->patchEntity($user, $data,['associated' => ['Userdetails']]);
           

            if ($tr->save($user)) {
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

                 $tr=TableRegistry::get('Users');
                 $user1 = $tr->get($id, [
                                    'contain' => ['Userdetails']
                                 ]);
                $acti=$user1['userdetail']['status'];
                if($dbrole==0)
                {   
                    return $this->redirect(['controller'=>'Users','action'=>'index']);
                }                       
                else if($acti==1)
                {
                    return $this->redirect(['controller'=>'Students','action'=>'index']);
                }
                else
                {
                    $this->Flash->error(__('This user is deactivated.'));
                  
                //$this->redirect($this->Auth->redirectUrl());
                }
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

     public function status($id,$data)
    {   
        $tr=TableRegistry::get('Userdetails');
        $query = $tr->query();
        $query->update()
        ->set(['status' => $data])
        ->where(['user_id' => $id])
        ->execute();
       return $this->redirect(['controller'=>'Users','action'=>'index']);
    }

    public function addexpenses()
    {   
        $tr=TableRegistry::get('Excategories');
        $excategories=$tr->find('all');
       $excat= (array) $excategories;
       $optionsArr = [];

       foreach ($excategories as $key => $cat) {
        $optionsArr[$cat->id] = $cat->name;        
       }
       // pr($optionsArr);
       $this->set('optionsArr',$optionsArr);
       
    }

    public function addamount()
    {   
         if ($this->request->is('post')) 
         {
            $data=$this->request->getData();
           $tr_amount=TableRegistry::get('Examount');
            $amount=$tr_amount->newEntity($data);
           // $am = $tr_amount->patchEntity($amount,$data); 
            $amount->excategory_id=$data['field'];

           // pr($amount);die;

            if ($tr_amount->save($amount)) {
                $this->Flash->success(__('The amount has been added.'));

                return $this->redirect(['action' => 'index']);
            }

         }
    }
}
