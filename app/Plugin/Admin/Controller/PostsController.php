<?php
class PostsController extends AdminAppController {
	public $uses = array('Admin.Post');
    public $components = array('Paginator');
    public $paginate = array('limit' => 15, 'paramType' => 'querystring');
    public $helpers = array('Time');

    public function all() {
    	$this->Paginator->settings = $this->paginate;
    	if($this->Auth->user('role') == 'Manager')
        $this->set('posts', $this->Paginator->paginate('Post',array('Post.publish'=>0)));
    	elseif(in_array($this->Auth->user('role'),array('Creator','Master Creator')))
    		$this->set('posts', $this->Paginator->paginate('Post',array('Post.user_id'=>$this->Auth->user('id'))));
    	else $this->set('posts', $this->Paginator->paginate('Post'));
    }
    public function search() {
        $this->Paginator->settings = $this->paginate;
        $this->set('Posts', $this->Paginator->paginate('Posts', array(
            'News.topic LIKE' => '%a%',
            'News.title LIKE' => '%a%',
            'News.text LIKE' => '%a%'
        )));
    }
    public function publish($id) {
        if (isset($id)) {
            if ($newsData = $this->Post->findById($id, array(
                'source',
                'detail',
                'link',
                'image',
                'text',
                'url',
                'title',
                'topic'
            ))) {
                $this->Post->id   = $id;
                $updateNewsFields = array(
                    'publishtime' => time(),
                    'publisher' => $this->Auth->user('id')
                );

                $this->Post->save($updateNewsFields, FALSE);
            } else throw new NotFoundException(__d('admin', 'There is not such id'));
        } else throw new BadRequestException(__d('admin', 'Bad parameters'));
    }
    public function total_posts($id) {
    	return $this->Post->find('count',array('Post.user_id' => $id));
    }
    public function edit($id) {
        if (isset($id)) {
            if ($newsData = $this->Post->findById($id, array(
                'readytoreview',
                'detail',
                'text',
                'title',
                'lastupdate',
                'posttime',
                'isreported',
                'reporttime',
                'reporttext',
                'source',
                'link',
                'image',
                'url',
                'publishtime',
                'topic'
            ))) {
                if ($this->request->data) {
                    $this->Post->set($this->request->data);
                    if ($this->Post->validates) {
                        $this->Post->id    = $id;
                       
                        if ($this->Auth->user('role') == 'Creator')
                            $this->request->data['Post']['lastupdate'] = time();
                        $this->Post->save($this->request->data, FALSE, array(
                            'readytoreview',
                            'detail',
                            'text',
                            'title',
                            'lastupdate',
                            'posttime',
                            'isreported',
                            'reporttime',
                            'reporttext',
                            'source',
                            'link',
                            'image',
                            'url',
                            'publishtime',
                            'topic'
                        ));
                    }
                }
                $this->set('Posts', $newsData);
            } else
                throw new NotFoundException(__d('admin', 'There is not such id'));
        } else
            throw new BadRequestException(__d('admin', 'Bad parameters'));
    }
    public function review($id) {
        if (isset($id)) {
            if ($newsData = $this->Post->findById($id, array(
                'readytopublish',
                'detail',
                'text',
                'title',
                'lastreview',
                'reviewer'
            ))) {
                if ($this->request->data) {
                    $this->Post->set($this->request->data);
                    if ($this->Post->validates) {
                        $this->Post->id      = $id;
                        $newsReviewFieldList = array(
                            'readytopublish',
                            'detail',
                            'text',
                            'title',
                            'lastreview',
                            'reviewer'
                        );
                        if ($this->Auth->user('role') == 'Reviewer') {
                            $this->request->data['Post']['lastreview'] = time();
                            if (!$news['Posts']['reviewer'])
                                $this->request->data['Post']['reviewer'] = $this->Auth->user('id');
                        }
                        $this->Post->save($this->request->data, FALSE, $newsReviewFieldList);
                    }
                }
                $this->set('Posts', $newsData);
            } else
                throw new NotFoundException(__d('admin', 'There is not such id'));
        } else
            throw new BadRequestException(__d('admin', 'Bad parameters'));
    }
    public function new_post() {
        if ($this->request->data) {
            $this->Post->set($this->request->data);
            if ($this->Post->validates) {
                $this->Post->create();
                $newsWriteFieldList                      = array(
                    'readytoreview',
                    'posttime',
                    'user_id',
                    'source',
                    'detail',
                    'link',
                    'image',
                    'text',
                    'url',
                    'title',
                    'topic'
                );
                $this->request->data['Post']['user_id']  = $this->Auth->user('id');
                $this->request->data['Post']['posttime'] = time();
                $this->Post->save($this->request->data, FALSE, $newsEditFieldList);
            }
        }
    }
    public function report($id) {
        if (isset($id)) {
            if ($newsData = $this->Post->findById($id, array(
                'reporter',
                'readytoreview',
                'readytopublish'
            ))) {
                if ($this->request->data) {
                    $this->Post->set($this->request->data);
                    if ($this->Post->validates) {
                        $this->Post->id                            = $id;
                        $reportFieldList                           = array(
                            'reporttext',
                            'reporter',
                            'reporttime',
                            'isreported'
                        );
                        $this->request->data['Post']['reporter']   = $this->Auth->user('id');
                        $this->request->data['Post']['reporttime'] = time();
                        $this->request->data['Post']['isreported'] = TRUE;
                        $this->Post->save($this->request->data, FALSE, $reportFieldList);
                    }
                }
            } else
                throw new NotFoundException(__d('admin', 'There is not such id'));
        } else
            throw new BadRequestException(__d('admin', 'Bad parameters'));
    }
    public function isAuthorized($user) {        
        if ($this->action == 'new' && in_array($user['role'],array('Creator','Master Creator')))
            return TRUE;
        elseif ($this->action == 'edit' && in_array($user['role'],array('Creator','Master Creator'))) {
            if ($this->Post->isOwnedBy($newsID, $user['id']))
                return TRUE;
        }

        return parent::isAuthorized($user);
    }
}