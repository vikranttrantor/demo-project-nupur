<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Examount Controller
 *
 * @property \App\Model\Table\ExamountTable $Examount
 *
 * @method \App\Model\Entity\Examount[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExamountController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Excategories']
        ];
        $examount = $this->paginate($this->Examount);

        $this->set(compact('examount'));
    }

    /**
     * View method
     *
     * @param string|null $id Examount id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $examount = $this->Examount->get($id, [
            'contain' => ['Excategories']
        ]);

        $this->set('examount', $examount);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $examount = $this->Examount->newEntity();
        if ($this->request->is('post')) {
            $examount = $this->Examount->patchEntity($examount, $this->request->getData());
            if ($this->Examount->save($examount)) {
                $this->Flash->success(__('The examount has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The examount could not be saved. Please, try again.'));
        }
        $excategories = $this->Examount->Excategories->find('list', ['limit' => 200]);
        $this->set(compact('examount', 'excategories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Examount id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $examount = $this->Examount->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $examount = $this->Examount->patchEntity($examount, $this->request->getData());
            if ($this->Examount->save($examount)) {
                $this->Flash->success(__('The examount has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The examount could not be saved. Please, try again.'));
        }
        $excategories = $this->Examount->Excategories->find('list', ['limit' => 200]);
        $this->set(compact('examount', 'excategories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Examount id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $examount = $this->Examount->get($id);
        if ($this->Examount->delete($examount)) {
            $this->Flash->success(__('The examount has been deleted.'));
        } else {
            $this->Flash->error(__('The examount could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
