<?php
namespace Customer\Form\Fieldset;

use Application\Model\Entity\Customer as CustomerEntity;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;

class Customer extends Fieldset implements InputFilterProviderInterface
{
    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct("custiomer");

        $this->setHydrator(new DoctrineHydrator($objectManager))
             ->setObject(new CustomerEntity());

        $this->add(array(
            'type' => 'Zend\Form\Element\Hidden',
            'name' => 'id'
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'companyname',
            'attributes' => array('class' => 'form-control'),
            'options' => array(
                'label' => 'Company name',
                'column-size' => 'sm-10',
                'label_attributes' => array('class' => 'col-sm-2 control-label')
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'name',
            'attributes' => array('class' => 'form-control'),
            'options' => array(
                'label' => 'Name',
                'column-size' => 'sm-10',
                'label_attributes' => array('class' => 'col-sm-2 control-label')
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'email',
            'attributes' => array('class' => 'form-control'),
            'options' => array(
                'label' => 'E-mail',
                'column-size' => 'sm-10',
                'label_attributes' => array('class' => 'col-sm-2 control-label')
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'addressline2',
            'attributes' => array('class' => 'form-control'),
            'options' => array(
                'label' => 'Street and number',
                'column-size' => 'sm-10',
                'label_attributes' => array('class' => 'col-sm-2 control-label')
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'addressline1',
            'attributes' => array('class' => 'form-control'),
            'options' => array(
                'label' => 'Postalcode and city',
                'column-size' => 'sm-10',
                'label_attributes' => array('class' => 'col-sm-2 control-label')
            ),
        ));

        $this->add(array(
            'name' => 'security',
            'type' => 'Zend\Form\Element\Csrf'
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Select',
            'name'    => 'meter',
            'attributes' => array('class' => 'form-control'),
            'options' => array(
                'label' => 'Meter',
                'column-size' => 'sm-10',
                'label_attributes' => array('class' => 'col-sm-2 control-label'),
                'value_options' => array(
                    'Enkele' =>  'Enkele',
                    'Dubbelle' => 'Dubbelle',
                ),
            ),
        ));
    }

    /**
     * The validation rules for the form.
     * Define tye resuires, numeric fields and do a trim function on the inputted data.
     *
     * @see \Zend\InputFilter\InputFilterProviderInterface::getInputFilterSpecification()
     */
    public function getInputFilterSpecification()
    {
        return array(
            'id' => array(
                'required' => false,
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\Filter\StringTrim',
                        'options' => array(),
                    ),
                ),
                'validators' => array(
                    array(
                        'name' => 'Digits',
                    ),
                ),
            ),

            'name' => array(
                'required' => true,
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\Filter\StringTrim',
                        'options' => array(),
                    ),
                ),
            ),

            'email' => array(
                'required' => false,
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\Filter\StringTrim',
                        'options' => array(),
                    ),
                ),
            ),
        );
    }
}
