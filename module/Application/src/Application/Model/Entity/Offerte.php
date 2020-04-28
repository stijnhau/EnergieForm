<?php

namespace Application\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offerte
 *
 * @ORM\Table(name="offerte", indexes={@ORM\Index(name="customer_id", columns={"customer_id"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Offerte
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="timestamp_created", type="datetime", nullable=false)
     */
    private $timestampCreated = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_valid", type="date", nullable=false)
     */
    private $dateValid;

    /**
     * @var float
     *
     * @ORM\Column(name="current_supplier_m3_low", type="float", precision=10, scale=0, nullable=false)
     */
    private $currentSupplierM3Low;

    /**
     * @var float
     *
     * @ORM\Column(name="current_supplier_m3_low_price", type="float", precision=10, scale=0, nullable=false)
     */
    private $currentSupplierM3LowPrice;

    /**
     * @var float
     *
     * @ORM\Column(name="current_supplier_m3_high", type="float", precision=10, scale=0, nullable=false)
     */
    private $currentSupplierM3High;

    /**
     * @var float
     *
     * @ORM\Column(name="current_supplier_m3_high_price", type="float", precision=10, scale=0, nullable=false)
     */
    private $currentSupplierM3HighPrice;

    /**
     * @var float
     *
     * @ORM\Column(name="current_supplier_m3_vastrecht_yearly", type="float", precision=10, scale=0, nullable=false)
     */
    private $currentSupplierM3VastrechtYearly;

    /**
     * @var float
     *
     * @ORM\Column(name="offer_m3_low", type="float", precision=10, scale=0, nullable=false)
     */
    private $offerM3Low;

    /**
     * @var float
     *
     * @ORM\Column(name="offer_m3_low_price", type="float", precision=10, scale=0, nullable=false)
     */
    private $offerM3LowPrice;

    /**
     * @var float
     *
     * @ORM\Column(name="offer_m3_high", type="float", precision=10, scale=0, nullable=false)
     */
    private $offerM3High;

    /**
     * @var float
     *
     * @ORM\Column(name="offer_m3_high_price", type="float", precision=10, scale=0, nullable=false)
     */
    private $offerM3HighPrice;

    /**
     * @var float
     *
     * @ORM\Column(name="offer_m3_vastrecht_yearly", type="float", precision=10, scale=0, nullable=false)
     */
    private $offerM3VastrechtYearly;

    /**
     * @var float
     *
     * @ORM\Column(name="current_supplier_kwh_low", type="float", precision=10, scale=0, nullable=false)
     */
    private $currentSupplierKwhLow;

    /**
     * @var float
     *
     * @ORM\Column(name="current_supplier_kwh_low_price", type="float", precision=10, scale=0, nullable=false)
     */
    private $currentSupplierKwhLowPrice;

    /**
     * @var float
     *
     * @ORM\Column(name="current_supplier_kwh_high", type="float", precision=10, scale=0, nullable=false)
     */
    private $currentSupplierKwhHigh;

    /**
     * @var float
     *
     * @ORM\Column(name="current_supplier_kwh_high_price", type="float", precision=10, scale=0, nullable=false)
     */
    private $currentSupplierKwhHighPrice;

    /**
     * @var float
     *
     * @ORM\Column(name="current_supplier_kwh_vastrecht_yearly", type="float", precision=10, scale=0, nullable=false)
     */
    private $currentSupplierKwhVastrechtYearly;

    /**
     * @var float
     *
     * @ORM\Column(name="offer_kwh_low", type="float", precision=10, scale=0, nullable=false)
     */
    private $offerKwhLow;

    /**
     * @var float
     *
     * @ORM\Column(name="offer_kwh_low_price", type="float", precision=10, scale=0, nullable=false)
     */
    private $offerKwhLowPrice;

    /**
     * @var float
     *
     * @ORM\Column(name="offer_kwh_high", type="float", precision=10, scale=0, nullable=false)
     */
    private $offerKwhHigh;

    /**
     * @var float
     *
     * @ORM\Column(name="offer_kwh_high_price", type="float", precision=10, scale=0, nullable=false)
     */
    private $offerKwhHighPrice;

    /**
     * @var float
     *
     * @ORM\Column(name="offer_kwh_vastrecht_yearly", type="float", precision=10, scale=0, nullable=false)
     */
    private $offerKwhVastrechtYearly;

    /**
     * @var \Application\Model\Entity\Customer
     *
     * @ORM\ManyToOne(targetEntity="Application\Model\Entity\Customer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     * })
     */
    private $customer;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set timestampCreated
     *
     * @param \DateTime $timestampCreated
     *
     * @return Offerte
     */
    public function setTimestampCreated($timestampCreated)
    {
        $this->timestampCreated = $timestampCreated;

        return $this;
    }

    /**
     * Get timestampCreated
     *
     * @return \DateTime
     */
    public function getTimestampCreated()
    {
        return $this->timestampCreated;
    }

    /**
     * Set dateValid
     *
     * @param \DateTime $dateValid
     *
     * @return Offerte
     */
    public function setDateValid($dateValid)
    {
        $this->dateValid = $dateValid;

        return $this;
    }

    /**
     * Get dateValid
     *
     * @return \DateTime
     */
    public function getDateValid()
    {
        return $this->dateValid;
    }

    /**
     * Set currentSupplierM3Low
     *
     * @param float $currentSupplierM3Low
     *
     * @return Offerte
     */
    public function setCurrentSupplierM3Low($currentSupplierM3Low)
    {
        $this->currentSupplierM3Low = $currentSupplierM3Low;

        return $this;
    }

    /**
     * Get currentSupplierM3Low
     *
     * @return float
     */
    public function getCurrentSupplierM3Low()
    {
        return $this->currentSupplierM3Low;
    }

    /**
     * Set currentSupplierM3LowPrice
     *
     * @param float $currentSupplierM3LowPrice
     *
     * @return Offerte
     */
    public function setCurrentSupplierM3LowPrice($currentSupplierM3LowPrice)
    {
        $this->currentSupplierM3LowPrice = $currentSupplierM3LowPrice;

        return $this;
    }

    /**
     * Get currentSupplierM3LowPrice
     *
     * @return float
     */
    public function getCurrentSupplierM3LowPrice()
    {
        return $this->currentSupplierM3LowPrice;
    }

    /**
     * Set currentSupplierM3High
     *
     * @param float $currentSupplierM3High
     *
     * @return Offerte
     */
    public function setCurrentSupplierM3High($currentSupplierM3High)
    {
        $this->currentSupplierM3High = $currentSupplierM3High;

        return $this;
    }

    /**
     * Get currentSupplierM3High
     *
     * @return float
     */
    public function getCurrentSupplierM3High()
    {
        return $this->currentSupplierM3High;
    }

    /**
     * Set currentSupplierM3HighPrice
     *
     * @param float $currentSupplierM3HighPrice
     *
     * @return Offerte
     */
    public function setCurrentSupplierM3HighPrice($currentSupplierM3HighPrice)
    {
        $this->currentSupplierM3HighPrice = $currentSupplierM3HighPrice;

        return $this;
    }

    /**
     * Get currentSupplierM3HighPrice
     *
     * @return float
     */
    public function getCurrentSupplierM3HighPrice()
    {
        return $this->currentSupplierM3HighPrice;
    }

    /**
     * Set currentSupplierM3VastrechtYearly
     *
     * @param float $currentSupplierM3VastrechtYearly
     *
     * @return Offerte
     */
    public function setCurrentSupplierM3VastrechtYearly($currentSupplierM3VastrechtYearly)
    {
        $this->currentSupplierM3VastrechtYearly = $currentSupplierM3VastrechtYearly;

        return $this;
    }

    /**
     * Get currentSupplierM3VastrechtYearly
     *
     * @return float
     */
    public function getCurrentSupplierM3VastrechtYearly()
    {
        return $this->currentSupplierM3VastrechtYearly;
    }

    /**
     * Set offerM3Low
     *
     * @param float $offerM3Low
     *
     * @return Offerte
     */
    public function setOfferM3Low($offerM3Low)
    {
        $this->offerM3Low = $offerM3Low;

        return $this;
    }

    /**
     * Get offerM3Low
     *
     * @return float
     */
    public function getOfferM3Low()
    {
        return $this->offerM3Low;
    }

    /**
     * Set offerM3LowPrice
     *
     * @param float $offerM3LowPrice
     *
     * @return Offerte
     */
    public function setOfferM3LowPrice($offerM3LowPrice)
    {
        $this->offerM3LowPrice = $offerM3LowPrice;

        return $this;
    }

    /**
     * Get offerM3LowPrice
     *
     * @return float
     */
    public function getOfferM3LowPrice()
    {
        return $this->offerM3LowPrice;
    }

    /**
     * Set offerM3High
     *
     * @param float $offerM3High
     *
     * @return Offerte
     */
    public function setOfferM3High($offerM3High)
    {
        $this->offerM3High = $offerM3High;

        return $this;
    }

    /**
     * Get offerM3High
     *
     * @return float
     */
    public function getOfferM3High()
    {
        return $this->offerM3High;
    }

    /**
     * Set offerM3HighPrice
     *
     * @param float $offerM3HighPrice
     *
     * @return Offerte
     */
    public function setOfferM3HighPrice($offerM3HighPrice)
    {
        $this->offerM3HighPrice = $offerM3HighPrice;

        return $this;
    }

    /**
     * Get offerM3HighPrice
     *
     * @return float
     */
    public function getOfferM3HighPrice()
    {
        return $this->offerM3HighPrice;
    }

    /**
     * Set offerM3VastrechtYearly
     *
     * @param float $offerM3VastrechtYearly
     *
     * @return Offerte
     */
    public function setOfferM3VastrechtYearly($offerM3VastrechtYearly)
    {
        $this->offerM3VastrechtYearly = $offerM3VastrechtYearly;

        return $this;
    }

    /**
     * Get offerM3VastrechtYearly
     *
     * @return float
     */
    public function getOfferM3VastrechtYearly()
    {
        return $this->offerM3VastrechtYearly;
    }

    /**
     * Set currentSupplierKwhLow
     *
     * @param float $currentSupplierKwhLow
     *
     * @return Offerte
     */
    public function setCurrentSupplierKwhLow($currentSupplierKwhLow)
    {
        $this->currentSupplierKwhLow = $currentSupplierKwhLow;

        return $this;
    }

    /**
     * Get currentSupplierKwhLow
     *
     * @return float
     */
    public function getCurrentSupplierKwhLow()
    {
        return $this->currentSupplierKwhLow;
    }

    /**
     * Set currentSupplierKwhLowPrice
     *
     * @param float $currentSupplierKwhLowPrice
     *
     * @return Offerte
     */
    public function setCurrentSupplierKwhLowPrice($currentSupplierKwhLowPrice)
    {
        $this->currentSupplierKwhLowPrice = $currentSupplierKwhLowPrice;

        return $this;
    }

    /**
     * Get currentSupplierKwhLowPrice
     *
     * @return float
     */
    public function getCurrentSupplierKwhLowPrice()
    {
        return $this->currentSupplierKwhLowPrice;
    }

    /**
     * Set currentSupplierKwhHigh
     *
     * @param float $currentSupplierKwhHigh
     *
     * @return Offerte
     */
    public function setCurrentSupplierKwhHigh($currentSupplierKwhHigh)
    {
        $this->currentSupplierKwhHigh = $currentSupplierKwhHigh;

        return $this;
    }

    /**
     * Get currentSupplierKwhHigh
     *
     * @return float
     */
    public function getCurrentSupplierKwhHigh()
    {
        return $this->currentSupplierKwhHigh;
    }

    /**
     * Set currentSupplierKwhHighPrice
     *
     * @param float $currentSupplierKwhHighPrice
     *
     * @return Offerte
     */
    public function setCurrentSupplierKwhHighPrice($currentSupplierKwhHighPrice)
    {
        $this->currentSupplierKwhHighPrice = $currentSupplierKwhHighPrice;

        return $this;
    }

    /**
     * Get currentSupplierKwhHighPrice
     *
     * @return float
     */
    public function getCurrentSupplierKwhHighPrice()
    {
        return $this->currentSupplierKwhHighPrice;
    }

    /**
     * Set currentSupplierKwhVastrechtYearly
     *
     * @param float $currentSupplierKwhVastrechtYearly
     *
     * @return Offerte
     */
    public function setCurrentSupplierKwhVastrechtYearly($currentSupplierKwhVastrechtYearly)
    {
        $this->currentSupplierKwhVastrechtYearly = $currentSupplierKwhVastrechtYearly;

        return $this;
    }

    /**
     * Get currentSupplierKwhVastrechtYearly
     *
     * @return float
     */
    public function getCurrentSupplierKwhVastrechtYearly()
    {
        return $this->currentSupplierKwhVastrechtYearly;
    }

    /**
     * Set offerKwhLow
     *
     * @param float $offerKwhLow
     *
     * @return Offerte
     */
    public function setOfferKwhLow($offerKwhLow)
    {
        $this->offerKwhLow = $offerKwhLow;

        return $this;
    }

    /**
     * Get offerKwhLow
     *
     * @return float
     */
    public function getOfferKwhLow()
    {
        return $this->offerKwhLow;
    }

    /**
     * Set offerKwhLowPrice
     *
     * @param float $offerKwhLowPrice
     *
     * @return Offerte
     */
    public function setOfferKwhLowPrice($offerKwhLowPrice)
    {
        $this->offerKwhLowPrice = $offerKwhLowPrice;

        return $this;
    }

    /**
     * Get offerKwhLowPrice
     *
     * @return float
     */
    public function getOfferKwhLowPrice()
    {
        return $this->offerKwhLowPrice;
    }

    /**
     * Set offerKwhHigh
     *
     * @param float $offerKwhHigh
     *
     * @return Offerte
     */
    public function setOfferKwhHigh($offerKwhHigh)
    {
        $this->offerKwhHigh = $offerKwhHigh;

        return $this;
    }

    /**
     * Get offerKwhHigh
     *
     * @return float
     */
    public function getOfferKwhHigh()
    {
        return $this->offerKwhHigh;
    }

    /**
     * Set offerKwhHighPrice
     *
     * @param float $offerKwhHighPrice
     *
     * @return Offerte
     */
    public function setOfferKwhHighPrice($offerKwhHighPrice)
    {
        $this->offerKwhHighPrice = $offerKwhHighPrice;

        return $this;
    }

    /**
     * Get offerKwhHighPrice
     *
     * @return float
     */
    public function getOfferKwhHighPrice()
    {
        return $this->offerKwhHighPrice;
    }

    /**
     * Set offerKwhVastrechtYearly
     *
     * @param float $offerKwhVastrechtYearly
     *
     * @return Offerte
     */
    public function setOfferKwhVastrechtYearly($offerKwhVastrechtYearly)
    {
        $this->offerKwhVastrechtYearly = $offerKwhVastrechtYearly;

        return $this;
    }

    /**
     * Get offerKwhVastrechtYearly
     *
     * @return float
     */
    public function getOfferKwhVastrechtYearly()
    {
        return $this->offerKwhVastrechtYearly;
    }

    /**
     * Set customer
     *
     * @param \Application\Model\Entity\Customer $customer
     *
     * @return Offerte
     */
    public function setCustomer(\Application\Model\Entity\Customer $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \Application\Model\Entity\Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }
}
