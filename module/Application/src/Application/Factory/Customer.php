<?php
namespace Application\Factory;

use Zend\ServiceManager\FactoryInterface;
use Application\Model\Customer as Model;
use Zend\ServiceManager\ServiceLocatorInterface;

class Customer implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {
        $entityManager = $sm->get('Doctrine\ORM\EntityManager');

        $model = new Model();
        $model->setEntityManager($entityManager);
        return $model;
    }
}
