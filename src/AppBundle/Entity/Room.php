<?php
/**
 * Created by PhpStorm.
 * User: damien
 * Date: 11/10/16
 * Time: 14:32
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity
 * @ORM\Table(name="room")
 */
class Room
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var $address
     * @ORM\Column(name="address", type="string", length=255, nullable=false)
     */
    private $address;

    /**
     * @var $address
     * @ORM\Column(name="city", type="string", length=255, nullable=false)
     */
    private $city;

    /**
     * @var $address
     * @ORM\Column(name="postal_code", type="string", length=5, nullable=false)
     */
    private $postalCode;

    /**
     * @var $address
     * @ORM\Column(name="address_complement", type="string", length=255, nullable=true)
     */
    private $addressComplement;

    /**
     * @var ArrayCollection $stocks
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Stock", mappedBy="product", cascade={"all"})
     */
    private $stocks;

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
     * Set address
     *
     * @param string $address
     *
     * @return Room
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Room
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set postalCode
     *
     * @param string $postalCode
     *
     * @return Room
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Get postalCode
     *
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set addressComplement
     *
     * @param string $addressComplement
     *
     * @return Room
     */
    public function setAddressComplement($addressComplement)
    {
        $this->addressComplement = $addressComplement;

        return $this;
    }

    /**
     * Get addressComplement
     *
     * @return string
     */
    public function getAddressComplement()
    {
        return $this->addressComplement;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->stocks = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add stock
     *
     * @param \AppBundle\Entity\Stock $stock
     *
     * @return Room
     */
    public function addStock(\AppBundle\Entity\Stock $stock)
    {
        $stock->setRoom($this);
        $this->stocks->add($stock);

        return $this;
    }

    /**
     * Remove stock
     *
     * @param \AppBundle\Entity\Stock $stock
     */
    public function removeStock(\AppBundle\Entity\Stock $stock)
    {
        $this->stocks->removeElement($stock);
    }

    /**
     * Get stocks
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStocks()
    {
        return $this->stocks;
    }
}