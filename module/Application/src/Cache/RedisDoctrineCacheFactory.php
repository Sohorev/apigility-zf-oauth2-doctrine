<?php
/**
 * @author sohorev
 */

namespace Application\Cache;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class RedisDoctrineCacheFactory implements FactoryInterface
{
    /**
     * @param  ContainerInterface $sm
     * @return \Doctrine\Common\Cache\RedisCache
     */
    public function __invoke(ContainerInterface $sm, $requestedName, array $options = null)
    {
//        $config = $sm->get('config');
        $redis = $sm->get('redis');
        $cacheDriver = new \Doctrine\Common\Cache\RedisCache();
        $cacheDriver->setRedis($redis);
        return $cacheDriver;
    }

    /**
     * @param ServiceLocatorInterface $sm
     * @return \Doctrine\Common\Cache\RedisCache
     */
    public function createService(ServiceLocatorInterface $sm)
    {
        return $this($sm, Adapter::class);
    }
}
