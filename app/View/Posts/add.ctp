<?php
echo $this->Form->create('Post');
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '4'));
echo $this->Form->input('status',  array('type' => 'checkbox'));
echo $this->Form->end('Save Post');
?>