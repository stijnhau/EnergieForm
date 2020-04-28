<?php

use Application\Model\Building;
use Zend\ServiceManager\ServiceLocatorInterface;

return array(
    'factories' => array(
        'building' => function (ServiceLocatorInterface $sm) {
            $entityManager = $sm->get('Doctrine\ORM\EntityManager');

            $building = new Building();
            $building->setEntityManager($entityManager);
            return $building;
        },
    ),
);
