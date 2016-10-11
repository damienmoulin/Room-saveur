<?php
/**
 * Created by PhpStorm.
 * User: damien
 * Date: 11/10/16
 * Time: 19:37
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user_adress")
 */
class UserAddress
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
     * @var $user
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User" ,inversedBy="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;


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
     * @return UserAddress
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
     * @return UserAddress
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
     * @return UserAddress
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
     * @return UserAddress
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
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return UserAddress
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
