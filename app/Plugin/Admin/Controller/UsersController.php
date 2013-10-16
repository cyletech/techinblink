<?php
class UsersController extends AdminAppController {
    public $uses = array('Admin.User');
    public $helpers = array('Admin.User');
    public $components = array('Paginator');
    public $paginate = array('limit' => 15, 'paramType' => 'querystring');
    public function signin() {
        if ($this->Auth->loggedIn())
            return $this->redirect($this->Auth->redirectUrl());
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirectUrl());
            } else
                $this->Session->setFlash(__d('admin', 'Invalid email or password, try again'), 'error', array(
                    'plugin' => 'admin'
                ));
        }
    }
    public function signout() {
        return $this->redirect($this->Auth->logout());
    }
    public function signup() {
        if ($this->request->data) {
            $this->User->set($this->request->data);
            if ($this->User->validates) {
                $this->User->create();
                $this->User->save($this->request->data, FALSE, array(
                    'email',
                    'name',
                    'password'
                ));
            }
        }
    }
    public function account($id = NULL) {
        $id = ($id == NULL) ? $this->Auth->user('id') : $id;
        if ($userData = $this->User->findById($id)) {
            if ($this->request->data) {
                if (empty($this->request->data['User']['password']))
                    unset($this->request->data['User']['password']);
                $this->User->id = $id;
                $this->User->set($this->request->data);
                if ($this->User->validates()) {
                    $this->request->data['User']['modified'] = date('Y-m-d H:i:s');
                    if ($this->request->data['User']['avatar']['size'] > 0) {
                        $uploaddir = APP . 'Plugin' . DS . 'Admin' . DS . WEBROOT_DIR . DS . 'img' . DS . 'avatars' . DS;
                        if ($userData['User']['avatar'] != 'df.png')
                            unlink($uploaddir . $userData['User']['avatar']);
                        $uploadfile = $uploaddir . basename($this->request->data['User']['avatar']['name']);
                        if (move_uploaded_file($this->request->data['User']['avatar']['tmp_name'], $uploadfile)) {
                            rename($uploadfile, $uploaddir . $userData['User']['id'] . '.' . pathinfo($this->request->data['User']['avatar']['name'], PATHINFO_EXTENSION));
                        }
                    }
                    $this->request->data['User']['avatar'] = $userData['User']['id'] . '.' . pathinfo($this->request->data['User']['avatar']['name'], PATHINFO_EXTENSION);
                    $newData                               = $this->User->save($this->request->data, FALSE);
                    $saveToAuth                            = array_merge($userData['User'], $newData['User']);
                    $this->Auth->login($saveToAuth);
                    return $this->redirect(array(
                        'action' => 'profile'
                    ));
                }
            }
            $this->set('user', $userData);
        } else
            throw new NotFoundException(__d('admin', 'There is not such id'));
    }
    public function deactivate($id) {
        if (isset($id)) {
            if ($this->User->exists($id)) {
                $this->User->id = $id;
                $this->User->saveField('deactivate', TRUE);
                $this->Session->setFlash(__d('admin', 'User profle just deactivated'), 'success', array(
                    'plugin' => 'admin'
                ));
            } else
                throw new NotFoundException(__d('admin', 'There is not such id'));
        } else
            throw new BadRequestException(__d('admin', 'Bad parameters'));
    }
    public function delete($id) {
        if (isset($id)) {
            if ($this->User->exists($id)) {
                $this->User->delete($id);
                if ($id == $this->Auth->user('id'))
                    $this->requestAction('signout');
                $this->Session->setFlash(__d('admin', 'User profle just deleted'), 'success', array(
                    'plugin' => 'admin'
                ));
            } else
                throw new NotFoundException(__d('admin', 'There is not such id'));
        } else
            throw new BadRequestException(__d('admin', 'Bad parameters'));
    }
    public function all() {
        $this->Paginator->settings = $this->paginate;
        $this->set('users', $this->Paginator->paginate('User'));
    }
    public function search() {
        $this->Paginator->settings = $this->paginate;
        $this->set('users', $this->Paginator->paginate('User', array(
            'User.fullname LIKE' => '%a%',
            'User.email' => 'a'
        )));
    }
    /**
     * namayeshe moshakhasate karbar ke age parameter NULL bashe
     * moshakhasate karbare jari ro bar migardoone.
     *
     * @param string $id shenase karbar
     * @return void
     */
    public function profile($id = NULL) {
        $id = ($id === NULL) ? $this->Auth->user('id') : $id;
        if ($this->User->exists($id))
            $this->set('user', $this->User->findById($id));
        else
            throw new NotFoundException(__d('admin', 'There is not such id'));
    }
    public function isAuthorized($user) {
        $userID = isset($this->request->params['pass'][0]) ? $this->request->params['pass'][0] : NULL;
        if (in_array($this->action, array(
            'account',
            'deactivate',
            'profile'
        )) && $userID == $user['id'])
            return TRUE;
        if ($this->action == 'delete' && $userID != $this->Auth->user('id'))
            return TRUE;
        return parent::isAuthorized($user);
    }
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('signin', 'signup', 'signout');
    }
}
