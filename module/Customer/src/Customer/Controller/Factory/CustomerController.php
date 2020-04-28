<?php
namespace Customer\Controller\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Customer\Controller\CustomerController as controller;

class CustomerController implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {
        $parentLocator = $sm->getServiceLocator();

        $controller = new controller();
        $controller->setServiceLocator($parentLocator);

        return $controller;
    }
}
