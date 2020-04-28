<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Customer for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Offerte\Controller;

use \Application\Model\Entity\Offerte;
use \Offerte\Form\Offerte as OfferteForm;
use Application\Model\Pdf;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Stdlib\ArrayObject;

class OfferteController extends AbstractActionController
{
    public function listAction()
    {
        $sm = $this->getServiceLocator();
        /* @var $offerteModel \Application\Model\Offerte */
        $offerteModel = $sm->get('offerteModel');
        $offerte = $offerteModel->findAll();

        $viewModel = new ViewModel(array(
            'title'         => "Offerte",
            'url'           => "zfcadmin/offerte",
            'items'         => $offerte,
            'listElements'  => array(
                'Customer name'          => "getCustomer->getName",
                'Date valid'             => "getDateValid",
            ),
            'showInfo'      => false,
            'customUrl'     => array('image', "pdfPath"),
        ));
        $viewModel->setTemplate('application/table.phtml');
        $this->layout()->order = array("key" => 0, "order" => "asc");

        return $viewModel;
    }

    public function createAction()
    {
        $sm = $this->getServiceLocator();

        /* @var $offerteModel \Application\Model\Offerte */
        $offerteModel = $sm->get('offerteModel');

        // Get your ObjectManager from the ServiceManager
        $objectManager = $sm->get('Doctrine\ORM\EntityManager');

        // Create the form and inject the ObjectManager
        $form = new offerteForm($objectManager);

        $id = $this->params()->fromRoute("id");
        if (is_numeric($id) && $id > 0) {
            $offerteEntity = $offerteModel->findOneBy(array('id' => $id));

            echo "Id:" . $offerteEntity->getId();
        } else {
            // Create a new, empty entity and bind it to the form
            $offerteEntity = new Offerte();
        }

        $form->bind($offerteEntity);

        if ($this->request->isPost()) {
            $form->setData($this->request->getPost());

            if ($form->isValid()) {

                if (is_numeric($id) && $id > 0) {
                    $extra = 'updated';
                } else {
                    $extra = 'created';
                }
                $this->flashMessenger()->addSuccessMessage($extra);

                $objectManager->persist($offerteEntity);
                $objectManager->flush();

                $pdf = new Pdf();
                $pdf->AddPage();
                /** @todo nergie Fields on PDF */
                $pdf->AddPage();
                /** @todo m3 fields on PDF */

                $pdfName = getcwd() . "/data/offerte-" . $offerteEntity->getId() . ".pdf";

                // We need to save the pdf.
                $pdf->Output(
                    $pdfName,
                    "F"
                );

                return $this->redirect()->toRoute("zfcadmin/offerte/list");
            }
        }

        $viewModel = new ViewModel(array('form' => $form));
        return $viewModel;
    }
}
