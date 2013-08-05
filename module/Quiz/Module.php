<?php
namespace Quiz;
// Add these import statements:
use Quiz\Model\Quiz;
use Quiz\Model\QuizTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module
{
	public function getAutoloaderConfig()
	{
		return array(
			'Zend\Loader\ClassMapAutoloader' => array(
				__DIR__ . '/autoload_classmap.php',
				),
			'Zend\Loader\StandardAutoloader' => array(
				'namespaces' => array(
					__NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
					),
				),
			);
	}
	public function getConfig()
	{
		return include __DIR__ . '/config/module.config.php';
	}
// getAutoloaderConfig() and getConfig() methods here
// Add this method:
	public function getServiceConfig()
	{
		return array(
			'factories' => array(
				'Quiz\Model\QuizTable' => function($sm) {
					$tableGateway = $sm->get('QuizTableGateway');
					$table = new QuizTable($tableGateway);
					return $table;
				},
				'QuizTableGateway' => function ($sm) {
					$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
					$resultSetPrototype = new ResultSet();
					$resultSetPrototype->setArrayObjectPrototype(new Quiz());
					return new TableGateway('quiz', $dbAdapter, null, $resultSetPrototype);
				},
				),
			);
	}
}
