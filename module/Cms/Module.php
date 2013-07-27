<?php
namespace Cms;

// Add these import statements:
use Cms\Model\Bug;
use Cms\Model\BugTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

use Zend\EventManager\Event;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

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
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Cms\Model\BugTable' => function($sm) {
                    $tableGateway = $sm->get('BugTableGateway');
                    $table = new BugTable($tableGateway);
                    return $table;
                },
                'BugTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Bug());
                    return new TableGateway('bug', $dbAdapter, null, $resultSetPrototype);
                },
                ),
            );
    }

    public function onBootstrap(MvcEvent $e)
    {
       $e->getApplication()->getServiceManager()->get('translator');
       $eventManager        = $e->getApplication()->getEventManager();
       $moduleRouteListener = new ModuleRouteListener();
       $moduleRouteListener->attach($eventManager);
       $this->setPhpSettings($e);
   }


   private function setPhpSettings(MvcEvent $e)
   {
       $config = $e->getApplication()->getConfig();
       if ($config['phpSettings']) {
           foreach ($config['phpSettings'] as $key => $value) {
               ini_set($key, $value);
           }
       }
   }

}
