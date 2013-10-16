<?php

echo $this->Form->create();
echo $this->Form->input('email');
echo $this->Form->password('password');
echo $this->Form->end('Submit');