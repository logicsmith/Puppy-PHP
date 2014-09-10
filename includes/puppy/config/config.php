<?php

$config = array(
	'router'=>array(
		'type'=>'path',//PATH, GET/POST/REQUEST, MAP
		'req_param'=>'r',
		'map'=>array(//or
			array(
				'var'=>		$_PATH[0],
				'val'=>		'abc',
				'cfile'=>	'mycontroller',
				'action'=>	'myaction',//method of controller class, file only allows one controller class
				'children'=>array(//or
					array(
						'var'=>		$_GET['r'],
						'val'=>		'test',
						'action'=>	'myaction2',
					),
				),
			),
			array(
				'cfile'=>	$_PATH,
			),
		),
		/* PATH, GET, POST, COOKIE, SESSION, USER_AGENT, SERVER
		 * P /abc controller_file selected_action
		 * 	G ?q=1 controller_file selected_action
		 *  P /param2 selected_action
		 * 		PATH_DEFAULT_BEHAVIOUR, GET_DEFAULT_BEHAVIOUR
		 *  TYPE/SOURCE VALUE/FUNC(TRUE|FALSE) CONTROLLER_LOCATION ACTION
		 */
	),
);
