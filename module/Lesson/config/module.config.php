<?php
return array(
	'controllers' => array(
		'invokables' => array(
			'Lesson\Controller\Lesson' => 'Lesson\Controller\LessonController',
			),
		),
// The following section is new and should be added to your file
	'router' => array(
		'routes' => array(
			'lesson' => array(
				'type'
				=> 'segment',
				'options' => array(
					'route'
					=> '/lesson[/][:action][/:id]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'id'
						=> '[0-9]+',
						),
					'defaults' => array(
						'controller' => 'Lesson\Controller\Lesson',
						'action'
						=> 'index',
						),
					),
				),
			),
		),
	'view_manager' => array(
		'template_path_stack' => array(
			'lesson' => __DIR__ . '/../view',
			),
		),
	);
