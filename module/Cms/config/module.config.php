<?php
return array(
	'controllers' => array(
		'invokables' => array(
			'Cms\Controller\Cms' => 'Cms\Controller\CmsController',
			'Cms\Controller\Bug' => 'Cms\Controller\BugController',
			),
		),
// The following section is new and should be added to your file
	'router' => array(
		'routes' => array(
			'cms' => array(
				'type'
				=> 'segment',
				'options' => array(
					'route'
					=> '/cms[/][:action][/:id]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'id'
						=> '[0-9]+',
						),
					'defaults' => array(
						'controller' => 'Cms\Controller\Cms',
						'action'
						=> 'index',
						),
					),
				),
			'bug' => array(
				'type'
				=> 'segment',
				'options' => array(
					'route'
					=> '/bug[/][:action][/:id]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'id'
						=> '[0-9]+',
						),
					'defaults' => array(
						'controller' => 'Cms\Controller\Bug',
						'action'
						=> 'index',
						),
					),
				),
			),
		),
	'view_manager' => array(
		'template_path_stack' => array(
			'bug' => __DIR__ . '/../view',
			),
		),
	);
