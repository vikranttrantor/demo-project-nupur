<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;


/**
 * Userfees Controller
 *
 * @property \App\Model\Table\UserfeesTable $Userfees
 *
 * @method \App\Model\Entity\Userfee[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserfeesController extends AppController
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
        $userfees = $this->paginate($this->Userfees);

        $this->set(compact('userfees'));
         $u_id=$this->request->getParam('pass');
         $truser_fee=TableRegistry::get('Userfees');
        // pr($u_id);die;
        $summary=$truser_fee->find("all")->where(['user_id'=>$u_id[0]]);
         $userfees = $this->paginate($summary);
         $this->set(compact('userfees'));
         


    }

    /**
     * View method
     *
     * @param string|null $id Userfee id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        /*$userfee = $this->Userfees->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('userfee', $userfee);*/
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {  // $tr=TableRegistry::get('Users');
        //$userfee = $tr->newEntity();
        if ($this->request->is('post')) 
        {
            $feeData=$this->request->getData();

            //find total fee
            $total_fee=$this->getTotalfee($feeData['user_id']);
            

            //find balance left
            $totalFeePaid=$this->getTotalfeePaid($feeData['user_id']);
            $bal=$total_fee-$totalFeePaid;

          
            //check whether paid amount is less than balance
            if($feeData['feePaid']>$bal)
            {
                $this->Flash->error(__('Yor are paying more than Course Amount!!'));
                return $this->redirect(['controller'=>'Users','action' => 'index']);
            }
            else
            {   
                //saving fee paid in userFees
                $tr=TableRegistry::get('Userfees');
                $userfee = $tr->newEntity($feeData);
                $userfee = $tr->patchEntity($userfee, $this->request->getData());
                if ($this->Userfees->save($userfee)) 
                {   //updating Users table for total fee paid
                    $totalFeePaid=$this->getTotalfeePaid($feeData['user_id']);
                    $truser_det=TableRegistry::get('Userdetails');
                    $query = $truser_det->query();
                    $query->update()
                        ->set(['feePaid' => $totalFeePaid])
                        ->where(['user_id' => $feeData['user_id']])
                        ->execute();
                  

                    $this->Flash->success(__('The userfee has been saved.'));
                    //$trusers=TableRegistry::get('Users');
                    return $this->redirect(['controller'=>'Users','action' => 'index']);

                    //save paid amount in users table

                }
                $this->Flash->error(__('The userfee could not be saved. Please, try again.'));
                $users = $this->Userfees->Users->find('list', ['limit' => 200]);
                $this->set(compact('userfee', 'users'));
            }


            
           // pr($userfee);die;

            
        }
       
    }

    public function getTotalfee($userid)
    {
        $truser_det=TableRegistry::get('Userdetails');
        $details=$truser_det->findByUserId($userid);
        $arr_details= $details->toArray();
        $total_fee=$arr_details[0]->totalFee;
         return $total_fee;
    }
    public function getTotalfeePaid($id)
    {
         $truser_fee=TableRegistry::get('Userfees');
            $totalFeePaid=$truser_fee->findByUserId($id);
            //$arr_details=  $totalFeePaid->toArray();
            $s=0;
           foreach ( $totalFeePaid as $val):
            $s=$s+$val['feePaid'];
            endforeach;
            return $s;
           

    }

    /**
     * Edit method
     *
     * @param string|null $id Userfee id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {   
         $truser_fees=TableRegistry::get('Userfees');
        $userfee = $truser_fees->get($id, [
            'contain' => []
        ]);
       // pr( $userfee);die;
         $userid= $userfee->user_id;
         // pr( $userid);die;
             //find total fee
            $total_fee=$this->getTotalfee($userid);
            
            //find balance left
            $totalFeePaid=$this->getTotalfeePaid($userid);

            $bal=$total_fee-$totalFeePaid;
            //pr($bal);die;
            
            $bal=$bal+$userfee['feePaid'];
             
           
     
        if ($this->request->is(['patch', 'post', 'put'])) {

             $data=$this->request->getData();
           
             
             //pr($bal);die;
            if($data['feePaid']>$bal)
            {
                $this->Flash->error(__('Yor are paying more than Course Amount!!'));
                return $this->redirect(['controller'=>'Userfees','action' => 'edit', $userfee->id]);
            }


            $userfee = $this->Userfees->patchEntity($userfee, $this->request->getData());
            if ($this->Userfees->save($userfee)) {
                 $totalFeePaid=$this->getTotalfeePaid($userid);
                $tr=TableRegistry::get('Userdetails');
                $query = $tr->query();
                $query->update()
                ->set(['feePaid' =>  $totalFeePaid])
                ->where(['user_id' => $userid])
                ->execute();

                $this->Flash->success(__('The userfee has been saved.'));

                return $this->redirect(['action' => 'index',$userid]);
            }
            $this->Flash->error(__('The userfee could not be saved. Please, try again.'));
        }
        $users = $this->Userfees->Users->find('list', ['limit' => 200]);
        $this->set(compact('userfee', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Userfee id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userfee = $this->Userfees->get($id);
        $userid= $userfee->user_id;
       // pr($userid);die;
       
        $deleted=$userfee->feePaid;
        $tr=TableRegistry::get('Userdetails');
        $updated=$tr->findByUserId($userfee->user_id)->toArray();

        $updated= $updated[0]->feePaid-$deleted;
        if ($this->Userfees->delete($userfee)) {
       
             
                $query = $tr->query();
                $query->update()
                ->set(['feePaid' =>  $updated])
                ->where(['user_id' => $userid])
                ->execute();
            $this->Flash->success(__('The userfee has been deleted.'));
        } else {
            $this->Flash->error(__('The userfee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index' , $userid]);
    }
}
