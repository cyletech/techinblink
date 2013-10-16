<?php

echo $this->Form->create();
echo $this->Form->input('fullname');
echo $this->Form->input('email');
echo $this->Form->input('password');
echo $this->Form->select('role',$this->User->exportRoles());
echo $this->Form->end();