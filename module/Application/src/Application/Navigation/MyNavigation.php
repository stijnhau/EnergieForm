<?php
namespace Application\Navigation;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Navigation\Service\DefaultNavigationFactory;

class MyNavigation extends DefaultNavigationFactory
{
    protected function getPages(\Interop\Container\ContainerInterface $serviceLocator)
    {
        if (null === $this->pages) {
            // Initilize menu
            $configuration['navigation'][$this->getName()] = array();
            // User menu
            $configuration['navigation'][$this->getName()]["users"] = array(
                'label' => "Users",
                'route' => "zfcadmin/zfcuseradmin/list",
                "pages" => array(
                    'add' => array(
                        'label' => "Add user",
                        'route' => "zfcadmin/zfcuseradmin/create",
                    ),
                    'list' => array(
                        'label' => "List user",
                        'route' => "zfcadmin/zfcuseradmin/list",
                    )
                )
            );
            // Customers menu
            $configuration['navigation'][$this->getName()]["customer"] = array(
                'label' => "Customer",
                'route' => "zfcadmin/customer/list",
                "pages" => array(
                    'add' => array(
                        'label' => "Add Customer",
                        'route' => "zfcadmin/customer/create",
                    ),
                    'list' => array(
                        'label' => "List customer",
                        'route' => "zfcadmin/customer/list",
                    )
                )
            );
            // offerte menu
            $configuration['navigation'][$this->getName()]["offerte"] = array(
                'label' => "Offerte",
                'route' => "zfcadmin/offerte/list",
                "pages" => array(
                    'add' => array(
                        'label' => "Add Offerte",
                        'route' => "zfcadmin/offerte/create",
                    ),
                    'list' => array(
                        'label' => "List Offerte",
                        'route' => "zfcadmin/offerte/list",
                    )
                )
            );

            if (!isset($configuration['navigation'])) {
                throw new Exception\InvalidArgumentException('Could not find navigation configuration key');
            }
            if (!isset($configuration['navigation'][$this->getName()])) {
                throw new Exception\InvalidArgumentException(sprintf(
                    'Failed to find a navigation container by the name "%s"',
                    $this->getName()
                ));
            }

            $application = $serviceLocator->get('Application');
            $routeMatch  = $application->getMvcEvent()->getRouteMatch();
            $router      = $application->getMvcEvent()->getRouter();
            $pages       = $this->getPagesFromConfig($configuration['navigation'][$this->getName()]);

            $this->pages = $this->injectComponents($pages, $routeMatch, $router);
        }

        return $this->pages;
    }
}
