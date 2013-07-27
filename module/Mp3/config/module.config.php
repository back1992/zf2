<?php
return array(
	'controllers' => array(
		'invokables' => array(
			'Mp3\Controller\Mp3' => 'Mp3\Controller\Mp3Controller',
			),
		),
// The following section is new and should be added to your file
	'router' => array(
		'routes' => array(
			'mp3' => array(
				'type'
				=> 'segment',
				'options' => array(
					'route'
					=> '/mp3[/][:action][/:id]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'id'
						=> '[0-9]+',
						),
					'defaults' => array(
						'controller' => 'Mp3\Controller\Mp3',
						'action'
						=> 'index',
						),
					),
				),
			),
		),
	'view_manager' => array(
		'template_path_stack' => array(
			'mp3' => __DIR__ . '/../view',
			),
		),
	);
