<?php

App::uses('AppHelper','View/Helper');

class UserHelper extends AppHelper {
	public function exportRoles() {
		return array('Supervisor'=>__d('admin','Supervisor Role Title'),'Master Creator'=>__d('admin','Master Creator Role Title'), 'User'=>__d('admin','User Role Title'), 'Creator'=>__d('admin','Creator Role Title'), 'Manager'=>__d('admin','Manager Role Title'));
	}
}
