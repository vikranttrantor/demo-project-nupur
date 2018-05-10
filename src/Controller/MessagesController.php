<?php
namespace App\Controller;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

use App\Controller\AppController;

/**
 * Messages Controller
 *
 * @property \App\Model\Table\MessagesTable $Messages
 *
 * @method \App\Model\Entity\Message[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MessagesController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Adminid');
       
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $messages = $this->paginate($this->Messages->find()->select(['by_id','Users.name','Users.id'])->distinct(['by_id'])->contain(['Users'])->where(['Users.role'=>1]));
      // pr($messages);die;
        $this->set(compact('messages'));


    }

    /**
     * View method
     *
     * @param string|null $id Message id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {   
        $trMessages = TableRegistry::get('Messages');
        $query = $trMessages->find();
        $adminId=$this->Adminid->getAdminId();
        $message = $query->select(['message','by_id'])->where(['OR'=>[['by_id'=>$id],['to_id'=>$id]]]);
       // pr($message->toArray());die;

        $query1 = $trMessages->query();
        $query1->update()
                ->set(['status' => 1])
                ->where(['by_id' => $id])
                ->execute();
        $this->set('message', $message);
        $this->set('userid',$id);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $message = $this->Messages->newEntity();
        $param = $this->request->getParam('pass');
        $user = $param[0];
        $userId = $param[1];
        if ($this->request->is('post')) {
            //pr($this->request->getData());die;
            $msgData = $this->request->getData();
            
            $adminId = $this->Adminid->getAdminId();
            if($user == 'student')
            {   
                
                $msgData['by_id'] = $userId;
                  $msgData['to_id'] =  $adminId;
                  $msgData['status'] = 0;
            }
            else if($user == 'admin')
            {   
                $msgData['by_id'] = $adminId;
                $msgData['to_id'] =  $userId;
                 $msgData['status'] = 0;

                 //$msgData['to_id'] =  $adminId;
            }

           
          // pr($msgData);die;
            $message = $this->Messages->patchEntity($message, $msgData);
           // pr($message);die;
            if ($this->Messages->save($message)) {
                $this->Flash->success(__('The message has been sent.'));
                if($user == 'student')
                {
                    return $this->redirect(['controller'=>'students','action' => 'index']);
            
                }
                else if($user == 'admin')
                {
                     return $this->redirect(['controller'=>'Messages','action' => 'view',$userId ]);
                }
            }
            else
            {
                $this->Flash->error(__('The message could not be sent. Please, try again.'));
            }
       
    }
        $users = $this->Messages->Users->find('list', ['limit' => 200]);
        $this->set(compact('message', 'users'));
        $this->set('usr',$user);
        $this->set('usrId',$userId);
    
}

    /**
     * Edit method
     *
     * @param string|null $id Message id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $message = $this->Messages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $message = $this->Messages->patchEntity($message, $this->request->getData());
            if ($this->Messages->save($message)) {
                $this->Flash->success(__('The message has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The message could not be saved. Please, try again.'));
        }
        $users = $this->Messages->Users->find('list', ['limit' => 200]);
        $this->set(compact('message', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Message id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $message = $this->Messages->get($id);
        if ($this->Messages->delete($message)) {
            $this->Flash->success(__('The message has been deleted.'));
        } else {
            $this->Flash->error(__('The message could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
