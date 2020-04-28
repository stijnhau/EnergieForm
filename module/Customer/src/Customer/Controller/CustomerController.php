<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Customer for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Customer\Controller;

use \Application\Model\Entity\Customer;
use \Customer\Form\Customer as CustomerForm;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

class CustomerController extends AbstractActionController
{
    protected $serviceLocator;

    /**
     * @return the $serviceLocator
     */
    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }

    /**
     * @param \Zend\ServiceManager\ServiceLocatorInterface $serviceLocator
     */
    public function setServiceLocator(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
    }

    public function listAction()
    {
        $sm = $this->getServiceLocator();
        /* @var $customerModel \Application\Model\Customer */
        $customerModel = $sm->get('customerModel');
        $customer = $customerModel->findAll();

        $viewModel = new ViewModel(array(
            'title'         => "Customer",
            'url'           => "zfcadmin/customer",
            'items'         => $customer,
            'listElements'  => array(
                'Name'          => "getName",
            ),
            'showInfo'      => false,
        ));
        $viewModel->setTemplate('application/table.phtml');
        $this->layout()->order = array("key" => 0, "order" => "asc");

        return $viewModel;
    }

    public function createAction()
    {
        $sm = $this->getServiceLocator();

        /* @var $customerModel \Application\Model\Customer */
        $customerModel = $sm->get('customerModel');

        // Get your ObjectManager from the ServiceManager
        $objectManager = $sm->get('Doctrine\ORM\EntityManager');

        // Create the form and inject the ObjectManager
        $form = new CustomerForm($objectManager);

        $id = $this->params()->fromRoute("id");
        if (is_numeric($id) && $id > 0) {
            $customerEntity = $customerModel->findOneBy(array('id' => $id));
        } else {
            // Create a new, empty entity and bind it to the form
            $customerEntity = new Customer();
        }
        $form->bind($customerEntity);

        if ($this->request->isPost()) {
            $form->setData($this->request->getPost());

            if ($form->isValid()) {

                if (is_numeric($id) && $id > 0) {
                    $extra = 'User updated';
                } else {
                    $extra = 'User created';
                }
                $this->flashMessenger()->addSuccessMessage($extra);

                $objectManager->persist($customerEntity);
                $objectManager->flush();

                return $this->redirect()->toRoute("zfcadmin/customer/list");
            }
        }

        $viewModel = new ViewModel(array('form' => $form));
        $viewModel->setTemplate('admin/createForm');
        return $viewModel;
    }

    public function removeAction()
    {
        $sm = $this->getServiceLocator();

        /* @var $customerModel \Application\Model\Customer */
        $customerModel = $sm->get('customerModel');

        $customerModel->remove($this->params("id"));

        $viewModel = $this->listAction();
        $viewModel->setVariable("remove", true);
        return $viewModel;
    }

    /**
     * @since   1.0.0
     * @author  Stijn
     * @return Zend\ViewModel\JsonModel;
     */
    public function customerMeterAction()
    {
        $id = $this->params("id");

        $sm = $this->getServiceLocator();
        /* @var $userModel \Application\Model\Customer */
        $customerModel = $sm->get('customerModel');

        $customerEntity = $customerModel->findOneBy(array('id' => $id));

        return new JsonModel(array("meter" => $customerEntity->getMeter()));
    }
}
