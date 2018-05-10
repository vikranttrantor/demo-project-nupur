<?php
namespace App\Controller;

use App\Controller\AppController;
//use Cake\Http\ServerRequest;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;


/**
 * Reports Controller
 *
 *
 * @method \App\Model\Entity\Report[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReportsController extends AppController
{


    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Report');
       
    }
  
    public function index()
    {
       
    }

    
    public function studentEnroll()
    { 
        if($this->request->is(['ajax']))
        {   $data = $this->request->getData();
            $response = $this->Report->getStudentsEnrolled($data);
            $enrolledData = $this->response->withType('json')->withStringBody(json_encode($response));
            return $enrolledData;
        }
    }
       

    
    public function feeCollected()
    {
        if($this->request->is(['ajax']))
        {   $data = $this->request->getData();
            $response = $this->Report->getFeePaid($data);
            $feePaid = $this->response->withType('json')->withStringBody(json_encode($response));
            return $feePaid;
        }
        
    }

   
    public function feeBalance()
    {
        
    }

    
    public function profit()
    {   
        $trCourses=TableRegistry::get('Courses');
        $courses=$trCourses->find('list', ['limit' => 200]);
        //$courses->0="select";
        $course=$courses->toArray();
        array_unshift($course,'Select');
        //$course[0]="Select";
        //pr($course);die;
        if( $this->request->is(['ajax']) )
        {   
            $data = $this->request->getData();
            //pr($data);die("hii");
            $response = $this->Report->getProfit($data);
            $profit = $this->response->withType('json')->withStringBody(json_encode($response));
            return $profit;
        }
        $this->set(compact('course'));

    }
}
