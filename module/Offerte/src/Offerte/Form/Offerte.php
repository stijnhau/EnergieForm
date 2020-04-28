<?php

namespace Offerte\Form;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Offerte\Form\Fieldset\Dubbelle as DubbelleFieldset;
use Offerte\Form\Fieldset\Enkele as EnkeleFieldset;
use Offerte\Form\Fieldset\M3 as M3Fieldset;
use Offerte\Form\Fieldset\Offerte as OfferteFieldset;
use Zend\Form\Form;

class Offerte extends Form
{
    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct();

        // The form will hydrate an object of type "BlogPost"
        $this->setHydrator(new DoctrineHydrator($objectManager));

        // Add the user fieldset, and set it as the base fieldset
        $offerteFieldset = new OfferteFieldset($objectManager);
        $offerteFieldset->setUseAsBaseFieldset(true);
        $this->add($offerteFieldset);

        // Add the user fieldset, and set it as the base fieldset
        $enkeleFieldset = new EnkeleFieldset($objectManager);
        $enkeleFieldset->setUseAsBaseFieldset(true);
        $this->add($enkeleFieldset);

        // Add the user fieldset, and set it as the base fieldset
        $dubbelleFieldset = new DubbelleFieldset($objectManager);
        $dubbelleFieldset->setUseAsBaseFieldset(true);
        $this->add($dubbelleFieldset);

        // Add the user fieldset, and set it as the base fieldset
        $m3Fieldset = new M3Fieldset($objectManager);
        $m3Fieldset->setUseAsBaseFieldset(true);
        $this->add($m3Fieldset);

        $this->add(array(
            'name' => 'button-submit',
            'type' => 'button',
            'attributes' => array(
                'type' => 'submit',
                'class' => "btn btn-default",
            ),
            'options' => array(
                'label' => 'Submit',
                'column-size' => 'sm-10 col-sm-offset-2'
            )
        ));

        $this->add(array(
            'name' => 'button-cancel',
            'type' => 'button',
            'attributes' => array(
                'type' => 'button',
                'class' => "btn btn-default",
                'id' => "buttonCancel",
            ),
            'options' => array(
                'label' => 'Cancel',
                'column-size' => 'sm-10 col-sm-offset-2'
            )
        ));

        $this->add(array(
            'name' => 'button-reset',
            'type' => 'button',
            'attributes' => array(
                'type' => 'button',
                'class' => "btn btn-default",
                'id' => "buttonReset",
            ),
            'options' => array(
                'label' => 'Reset',
                'column-size' => 'sm-10 col-sm-offset-2'
            )
        ));
    }
}
