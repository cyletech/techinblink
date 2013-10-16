<?php

class User extends AdminAppModel {
    
    public $validate = array('email' => array('email' => array('rule' => 'email', 'required' => TRUE, 'allowEmpty' => FALSE, 'message' => 'Your email address is invalid'), 'isUnique' => array('rule' => 'isUnique', 'message' => 'Email address is used already')));

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = Security::hash($this->data[$this->alias]['password'],'sha1',TRUE);
        }
        return true;
    }
}
