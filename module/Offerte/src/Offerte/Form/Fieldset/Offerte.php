<?php
namespace Offerte\Form\Fieldset;

use Application\Model\Entity\Offerte as OfferteEntity;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use DoctrineModule\Form\Element\ObjectSelect;

class Offerte extends Fieldset implements InputFilterProviderInterface
{
    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct("offerte");

        $this->setHydrator(new DoctrineHydrator($objectManager))
             ->setObject(new OfferteEntity());

        $this->add(array(
            'type' => 'Zend\Form\Element\Hidden',
            'name' => 'id'
        ));

        $adGroup = new ObjectSelect('customer');
        $adGroup->setEmptyOption('Select..');
        $adGroup->setAttributes(array('class' => 'form-control'));
        $adGroup->setOptions(array(
            'label' => 'Customer',
            'label_attributes' => array('class' => 'col-sm-2 control-label'),
            'object_manager' => $objectManager,
            'target_class' => '\Application\Model\Entity\Customer',
            'property' => 'name',
            'is_method' => true,
            'find_method' => array(
                'name' => 'findBy',
                'params' => array(
                    'criteria' => array(
                        //'isActive' => '1'
                     ),
                ),
            ),
        ));
        $this->add($adGroup);

        $this->add(array(
            'type'    => 'Zend\Form\Element\Date',
            'name'    => 'dateValid',
            'attributes' => array('class' => 'form-control'),
            'options' => array(
                'label' => 'Date Valid',
                'column-size' => 'sm-10',
                'label_attributes' => array('class' => 'col-sm-2 control-label')
            ),
        ));


        $this->add(array(
            'name' => 'security',
            'type' => 'Zend\Form\Element\Csrf'
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
        );
    }
}
