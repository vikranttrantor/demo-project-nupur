<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Excategories Controller
 *
 * @property \App\Model\Table\ExcategoriesTable $Excategories
 *
 * @method \App\Model\Entity\Excategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExcategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $excategories = $this->paginate($this->Excategories);

        $this->set(compact('excategories'));
    }

    /**
     * View method
     *
     * @param string|null $id Excategory id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $excategory = $this->Excategories->get($id, [
            'contain' => ['Examount']
        ]);

        $this->set('excategory', $excategory);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $excategory = $this->Excategories->newEntity();
        if ($this->request->is('post')) {
            $excategory = $this->Excategories->patchEntity($excategory, $this->request->getData());
            if ($this->Excategories->save($excategory)) {
                $this->Flash->success(__('The excategory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The excategory could not be saved. Please, try again.'));
        }
        $this->set(compact('excategory'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Excategory id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $excategory = $this->Excategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $excategory = $this->Excategories->patchEntity($excategory, $this->request->getData());
            if ($this->Excategories->save($excategory)) {
                $this->Flash->success(__('The excategory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The excategory could not be saved. Please, try again.'));
        }
        $this->set(compact('excategory'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Excategory id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $excategory = $this->Excategories->get($id);
        if ($this->Excategories->delete($excategory)) {
            $this->Flash->success(__('The excategory has been deleted.'));
        } else {
            $this->Flash->error(__('The excategory could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
