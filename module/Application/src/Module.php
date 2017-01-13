<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2014-2016 Zend Technologies USA Inc. (http://www.zend.com)
 */

namespace Application;

use Zend\Mvc\ResponseSender\SendResponseEvent;
use ZF\ApiProblem\ApiProblemResponse;
use Zend\Mvc\MvcEvent;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig()
    {
        return [
            'factories' => array(
//                'doctrine.sql_logger_collector.orm_crawler' => new \DoctrineORMModule\Service\SQLLoggerCollectorFactory('orm_crawler'), // х.з. что
                'isend_sql_logger' => function($sm) {
                    $log = new \Zend\Log\Logger();
                    $writer = new \Zend\Log\Writer\Stream('./data/logs/sql.log');
                    $log->addWriter($writer);

                    $sqllog = new \Application\Log\SqlLogger($log);
                    return $sqllog;
                },
            ),
        ];
    }

    public function onBootstrap(\Zend\Mvc\MvcEvent $e)
    {
        $app = $e->getTarget();
        $em = $app->getEventManager();

        $em = $e->getApplication()->getEventManager();
        $em->attach(MvcEvent::EVENT_DISPATCH_ERROR, array($this, 'onError'), 100500);

        $config = $e->getTarget()->getServiceManager()->get('Config');

        if (!empty($config['profiler']['enabled'])) {
            $app->getServiceManager()->get('doctrine.sql_logger_collector.orm_default');
        }
    }

    public function onError($e) {
        if ($e->getError() == \Zend\Mvc\Application::ERROR_EXCEPTION) {

            $exc = $e->getParam('exception'); /* @var $exc \Exception */

            print_r($exc->getMessage() . "\n");
            print_r($exc->getTraceAsString());
            die();
           // log in database or whatever
        }
    }
}
