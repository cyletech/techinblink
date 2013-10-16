<?php

class NotesController extends AdminAppController {
	public $uses = array('Admin.Note');

	public function index() {
		$this->set('notes',$this->Note->find('all',array('conditions'=>array('to'=>$this->Auth->user('id')))));
	}

	public function new_note() {

		if($this->request->data) {
			$this->Note->create();
			$this->Note->set($this->request->data);
			if($this->Note->validates()) {
				$this->request->data['Note']['from'] = $this->Auth->user('id');
				$this->request->data['Note']['time'] = date('Y-m-d H:i:s');
				$this->Note->save($this->request->data,FALSE);
			}
		}
	}
}