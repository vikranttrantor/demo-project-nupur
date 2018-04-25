<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Userdetails Controller
 *
 * @property \App\Model\Table\UserdetailsTable $Userdetails
 *
 * @method \App\Model\Entity\Userdetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserdetailsController extends AppController
{

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
        $userdetails = $this->paginate($this->Userdetails);

        $this->set(compact('userdetails'));
    }

    /**
     * View method
     *
     * @param string|null $id Userdetail id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userdetail = $this->Userdetails->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('userdetail', $userdetail);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userdetail = $this->Userdetails->newEntity();
        if ($this->request->is('post')) {
            $userdetail = $this->Userdetails->patchEntity($userdetail, $this->request->getData());
            if ($this->Userdetails->save($userdetail)) {
                $this->Flash->success(__('The userdetail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The userdetail could not be saved. Please, try again.'));
        }
        $users = $this->Userdetails->Users->find('list', ['limit' => 200]);
        $this->set(compact('userdetail', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Userdetail id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userdetail = $this->Userdetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userdetail = $this->Userdetails->patchEntity($userdetail, $this->request->getData());
            if ($this->Userdetails->save($userdetail)) {
                $this->Flash->success(__('The userdetail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The userdetail could not be saved. Please, try again.'));
        }
        $users = $this->Userdetails->Users->find('list', ['limit' => 200]);
        $this->set(compact('userdetail', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Userdetail id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userdetail = $this->Userdetails->get($id);
        if ($this->Userdetails->delete($userdetail)) {
            $this->Flash->success(__('The userdetail has been deleted.'));
        } else {
            $this->Flash->error(__('The userdetail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
