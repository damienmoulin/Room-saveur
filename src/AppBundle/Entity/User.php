<?php

/**
 * Created by PhpStorm.
 * User: damien
 * Date: 11/10/16
 * Time: 13:57
 */

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="firstname", type="string", length=45, nullable=true)
     */
    private $firstname;

    /**
     * @ORM\Column(name="lastname", type="string", length=45, nullable=true)
     */
    private $lastname;

    /**
     * @var $company
     * @ORM\Column(name="company", type="string", length=255, nullable=true)
     */
    private $company;

    /**
     * @var $phone
     * @ORM\Column(name="phone", type="string", length=10, nullable=true)
     */
    private $phone;

    /**
     * @var $userStatus
     * @ORM\Column(name="userStatus", type="integer", nullable=true)
     */
    private $userStatus;

    /**
     * @var ArrayCollection $userAddress
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\UserAddress", mappedBy="user", cascade={"all"})
     */
    private $userAddress;

    /**
     * @var ArrayCollection $userFacturationAddress
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\UserFacturationAddress", mappedBy="user", cascade={"all"})
     */
    private $userFacturationAddress;

    /**
     * @var ArrayCollection $likes
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Like", mappedBy="user", cascade={"all"})
     */
    private $likes;

    public function __construct()
    {
        parent::__construct();
        $this->userAddress = new ArrayCollection();
        $this->likes = new ArrayCollection();
    }

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
     * Set firstname
     *
     * @param string $firstname
     *
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set company
     *
     * @param string $company
     *
     * @return User
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set userStatus
     *
     * @param integer $userStatus
     *
     * @return User
     */
    public function setUserStatus($userStatus)
    {
        $this->userStatus = $userStatus;

        return $this;
    }

    /**
     * Get userStatus
     *
     * @return integer
     */
    public function getUserStatus()
    {
        return $this->userStatus;
    }

    /**
     * Add userAddress
     *
     * @param \AppBundle\Entity\UserAddress $userAddress
     *
     * @return User
     */
    public function addUserAddress(\AppBundle\Entity\UserAddress $userAddress)
    {
        $userAddress->setUser($this);
        $this->userAddress->add($userAddress);

        return $this;
    }

    /**
     * Remove userAddress
     *
     * @param \AppBundle\Entity\UserAddress $userAddress
     */
    public function removeUserAddress(\AppBundle\Entity\UserAddress $userAddress)
    {
        $this->userAddress->removeElement($userAddress);
    }

    /**
     * Get userAddress
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserAddress()
    {
        return $this->userAddress;
    }

    /**
     * Add like
     *
     * @param \AppBundle\Entity\Like $like
     *
     * @return User
     */
    public function addLike(\AppBundle\Entity\Like $like)
    {
        $like->setUser($this);
        $this->likes->add($like);

        return $this;
    }

    /**
     * Remove like
     *
     * @param \AppBundle\Entity\Like $like
     */
    public function removeLike(\AppBundle\Entity\Like $like)
    {
        $this->likes->removeElement($like);
    }

    /**
     * Get likes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLikes()
    {
        return $this->likes;
    }

    /**
     * Add userFacturationAddress
     *
     * @param \AppBundle\Entity\UserFacturationAddress $userFacturationAddress
     *
     * @return User
     */
    public function addUserFacturationAddress(\AppBundle\Entity\UserFacturationAddress $userFacturationAddress)
    {
        $userFacturationAddress->setUser($this);
        $this->userFacturationAddress->add($userFacturationAddress);

        return $this;
    }

    /**
     * Remove userFacturationAddress
     *
     * @param \AppBundle\Entity\UserFacturationAddress $userFacturationAddress
     */
    public function removeUserFacturationAddress(\AppBundle\Entity\UserFacturationAddress $userFacturationAddress)
    {
        $this->userFacturationAddress->removeElement($userFacturationAddress);
    }

    /**
     * Get userFacturationAddress
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserFacturationAddress()
    {
        return $this->userFacturationAddress;
    }
}
