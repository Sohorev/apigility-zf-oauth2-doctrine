<?php
namespace Client\V1\Rpc\Ping;

use Zend\Mvc\Controller\AbstractActionController;
use ZF\ContentNegotiation\ViewModel;

class PingController extends AbstractActionController
{
    public function pingAction()
    {
//        $identity = $this->getEvent()->getParam('ZF\MvcAuth\Identity');
        return new ViewModel([
            'ack' => time()
        ]);
    }
}
