<?php

class post extends AppModel{
	public $validate = array(
	'title' =>array( 'rule' => 'notEmpty'),
	'body'=> array('rule' => 'notEmpty')
	
 	);
}
