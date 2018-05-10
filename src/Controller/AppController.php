<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', ['enableBeforeRedirect' => false]);
        $this->loadComponent('Flash');

          $this->loadComponent('Auth', [
          'authorize' => ['Controller'], 
        'authenticate' => [
            'Form' => [
                'userModel' => 'Users',
                     'fields' => ['username' => 'name', 'password' => 'password']
            ]
             
        ],
        'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
                
            ]
    ]);
        /*
         * Enable the following components for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
        $this->Auth->allow("add");
    }

    public function isAuthorized($user)
    {   
       // pr($user['role']);die;
        // Admin can access every action
        
        
        if ( ($user['role'] ==0)&&($this->request->getParam('controller') == 'Users')) {
            return true;
        }
       
        if(($user['role'] ==1)&&(($this->request->getParam('controller') == 'Students')||($this->request->getParam('controller') == 'Students'))){
            return true;
        }
        if ( ($user['role'] ==0)&&(($this->request->getParam('controller') == 'Userfees')||($this->request->getParam('controller') == 'Examount')||($this->request->getParam('controller') == 'Excategories')||($this->request->getParam('controller') == 'Reports')||($this->request->getParam('controller') == 'Courses')||($this->request->getParam('controller') == 'Settings')||($this->request->getParam('controller') == 'Students'))) {
            return true;
        }
        return $this->redirect(['controller'=>'Users','action'=>'login']);
    

    }


      
}
