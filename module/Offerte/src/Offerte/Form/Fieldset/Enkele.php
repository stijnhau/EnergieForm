<?php
namespace Offerte\Form\Fieldset;

use Application\Model\Entity\Offerte as OfferteEntity;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use DoctrineModule\Form\Element\ObjectSelect;

class Enkele extends Fieldset implements InputFilterProviderInterface
{
    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct("enkele");

        $this->setHydrator(new DoctrineHydrator($objectManager))
             ->setObject(new OfferteEntity());

        $this->add(array(
            'type' => 'Zend\Form\Element\Hidden',
            'name' => 'id'
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'current_supplier_kwh_high',
            'attributes' => array('class' => 'form-control'),
            'options' => array(
                'label' => 'Current supplier KWH high',
                'column-size' => 'sm-10',
                'label_attributes' => array('class' => 'col-sm-2 control-label')
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'current_supplier_kwh_high_price',
            'attributes' => array('class' => 'form-control'),
            'options' => array(
                'label' => 'Current supplier KWH high price',
                'column-size' => 'sm-10',
                'label_attributes' => array('class' => 'col-sm-2 control-label')
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'offerte_kwh_high',
            'attributes' => array('class' => 'form-control'),
            'options' => array(
                'label' => 'Offerte KWH high',
                'column-size' => 'sm-10',
                'label_attributes' => array('class' => 'col-sm-2 control-label')
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'offerte_kwh_high_price',
            'attributes' => array('class' => 'form-control'),
            'options' => array(
                'label' => 'Offerte KWH high price',
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
        return array();
    }
}
