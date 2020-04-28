<?php
namespace Application\Factory;

use Zend\ServiceManager\FactoryInterface;
use Application\Model\Offerte as Model;
use Zend\ServiceManager\ServiceLocatorInterface;

class Offerte implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {
        $entityManager = $sm->get('Doctrine\ORM\EntityManager');

        $model = new Model();
        $model->setEntityManager($entityManager);
        return $model;
    }
}
