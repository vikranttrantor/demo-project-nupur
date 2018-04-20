<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Admins Controller
 *
 * @property \App\Model\Table\AdminsTable $Admins
 *
 * @method \App\Model\Entity\Admin[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdminsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void


     */
    public function index()
    {
        //$admins = $this->paginate($this->Admins);

        //$this->set(compact('admins'));

       // $student = $this->loadModel('Students');
             // $student->find('all');

        $students = $this->paginate($this->Admins);

        $this->set(compact('students'));

    }

    /**
     * View method
     *
     * @param string|null $id Admin id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $admin = $this->Admins->get($id, [
            'contain' => []
        ]);

        $this->set('admin', $admin);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
       $student = $this->Admins->newEntity();
      //print_r($student);die;
        if ($this->request->is('post')) {
            $student = $this->Admins->patchEntity($student, $this->request->getData());
            if ($this->Admins->save($student)) {
                $this->Flash->success(__('The student entry has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The student entry could not be saved. Please, try again.'));
        }
        $this->set(compact('student'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Admin id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $admin = $this->Admins->get($id, [
            'contain' => []
        ]);
        //print_r($admin);die;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $admin = $this->Admins->patchEntity($admin, $this->request->getData());
            if ($this->Admins->save($admin)) {
                $this->Flash->success(__('The student entry has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The student entry could not be saved. Please, try again.'));
        }
        $this->set(compact('admin'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Admin id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $admin = $this->Admins->get($id);
        if ($this->Admins->delete($admin)) {
            $this->Flash->success(__('The student entry has been deleted.'));
        } else {
            $this->Flash->error(__('The student entry could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
