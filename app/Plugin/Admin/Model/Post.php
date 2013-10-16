<?php

class Post extends AdminAppModel {
    
    public $validate = array('link' => array('url' => array('rule' => 'url', 'message' => 'input must have valid url'), 'maxLength' => array('rule' => array('maxLength', 255), 'message' => 'max lenght of input is %s')), 'url' => array('maxLength' => array('rule' => array('maxLength', 100), 'allowEmpty' => FALSE, 'required' => TRUE, 'message' => 'max lenght of input is %s'), 'custom' => array('rule' => array('custom', '[^[:space:]]'), 'message' => 'any space character is invalid')), 'title' => array('maxLength' => array('rule' => array('maxLength', 70), 'allowEmpty' => FALSE, 'required' => TRUE, 'message' => 'max lenght of input is %s')));
    public $belongsTo = array('User'=>array('className'=>'Admin.User','fields'=>array('name','role','avatar')));
    public function isOwnedBy($newsID, $userID) {
    	return $this->field('id',array('id'=>$newsID, 'user_id'=>$userID)) === $newsID;
    }
    
}