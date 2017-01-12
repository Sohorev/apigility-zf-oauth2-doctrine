<?php
/**
 * @author sohorev
 */

namespace Application\Cache;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class RedisFactory implements FactoryInterface
{
    /**
     * @param  ContainerInterface $sm
     * @return \Redis
     */
    public function __invoke(ContainerInterface $sm, $requestedName, array $options = null)
    {
        $config = $sm->get('config');
        $redis = new \Redis();
        $redis->connect($config['redis']['host'], $config['redis']['port']);
        return $redis;
    }

    /**
     * @param ServiceLocatorInterface $sm
     * @return \Redis
     */
    public function createService(ServiceLocatorInterface $sm)
    {
        return $this($sm, Adapter::class);
    }
}
