<?php

App::uses('AppController', 'Controller');

class AdminAppController extends AppController {

    public $components = array('Session', 'Auth' => array('authorize' => array('Controller'),'loginRedirect' => array('plugin' => 'admin', 'controller' => 'admin', 'action' => 'index'), 'logoutRedirect' => array('plugin' => 'admin', 'controller' => 'users', 'action' => 'signin'), 'loginAction' => array('plugin' => 'admin', 'controller' => 'users', 'action' => 'signin'), 'authError'=>'Access denied','authenticate' => array('Form' => array('userModel'=>'Admin.User','scope'=>array('User.deactivate'=>0),'passwordHasher'=>array('className'=>'Simple','hashType'=>'sha1'),'fields' => array('username' => 'email','password'=>'password')))));

    public function isAuthorized($user) {
    	if(isset($user['role']) && $user['role'] == 'Supervisor') return TRUE;
    	return FALSE;
    }
}
