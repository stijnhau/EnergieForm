<?php
namespace Offerte\Form\Fieldset;

use Application\Model\Entity\Offerte as OfferteEntity;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;

class M3 extends Fieldset implements InputFilterProviderInterface
{
    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct("m3");

        $this->setHydrator(new DoctrineHydrator($objectManager))
             ->setObject(new OfferteEntity());

        $this->add(array(
            'type' => 'Zend\Form\Element\Hidden',
            'name' => 'id'
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'currentSupplierM3High',
            'attributes' => array('class' => 'form-control'),
            'options' => array(
                'label' => 'Current supplier KWH high',
                'column-size' => 'sm-10',
                'label_attributes' => array('class' => 'col-sm-2 control-label')
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'currentSupplierM3HighPrice',
            'attributes' => array('class' => 'form-control'),
            'options' => array(
                'label' => 'Current supplier KWH high price',
                'column-size' => 'sm-10',
                'label_attributes' => array('class' => 'col-sm-2 control-label')
            ),
        ));




        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'offerM3High',
            'attributes' => array('class' => 'form-control'),
            'options' => array(
                'label' => 'Offerte KWH high',
                'column-size' => 'sm-10',
                'label_attributes' => array('class' => 'col-sm-2 control-label')
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'offerM3HighPrice',
            'attributes' => array('class' => 'form-control'),
            'options' => array(
                'label' => 'Offerte M3 high price',
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
