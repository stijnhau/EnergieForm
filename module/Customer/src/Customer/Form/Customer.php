<?php

namespace Customer\Form;

use Customer\Form\Fieldset\Customer as customerFieldset;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Zend\Form\Form;

class Customer extends Form
{
    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct();

        // The form will hydrate an object of type "BlogPost"
        $this->setHydrator(new DoctrineHydrator($objectManager));

        // Add the user fieldset, and set it as the base fieldset
        $blogPostFieldset = new customerFieldset($objectManager);
        $blogPostFieldset->setUseAsBaseFieldset(true);
        $this->add($blogPostFieldset);

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
