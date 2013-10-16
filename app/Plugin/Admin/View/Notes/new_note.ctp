<?php

echo $this->Form->create();
echo $this->Form->input('Note.to');
echo $this->Form->textarea('Note.note',array('maxlength'=>140));
echo $this->Form->end('Send');
