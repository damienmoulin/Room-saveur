<?php
/**
 * Created by PhpStorm.
 * User: damien
 * Date: 11/10/16
 * Time: 15:22
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="product")
 * @ORM\Entity()
 */
class Product
{
    use TimestampableEntity;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var $reference
     * @ORM\Column(name="reference", type="string", length=255, nullable=false)
     */
    private $reference;

    /**
     * @var $designation
     * @ORM\Column(name="designation", type="string", length=255, nullable=false)
     */
    private $designation;

    /**
     * @var $descriptive
     * @ORM\Column(name="descriptive", type="text", nullable=false)
     */
    private $descriptive;

    /**
     * @var $price
     * @ORM\Column(name="price", type="float", nullable=false)
     */
    private $price;

    /**
     * @var $tva
     * @ORM\Column(name="tva", type="float", nullable=false)
     */
    private $tva;

    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Please, upload the image file")
     * @Assert\File(
     *     mimeTypes={ "image/jpeg" })
     */
    private $picture;

    /**
     * @var string
     *
     * @ORM\Column(name="filename", type="string", length=255, unique=true)
     */
    private $filename;

    /**
     * @var ArrayCollection $stocks
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Stock", mappedBy="product", cascade={"all"})
     */
    private $stocks;

    /**
     * @var ArrayCollection $likes
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Like", mappedBy="product", cascade={"all"})
     */
    private $likes;

    /**
     * @var ArrayCollection $orderItems
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\OrderItem", mappedBy="product", cascade={"all"})
     */
    private $orderItems;

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
     * Set reference
     *
     * @param string $reference
     *
     * @return Product
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set designation
     *
     * @param string $designation
     *
     * @return Product
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * Get designation
     *
     * @return string
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * Set descriptive
     *
     * @param string $descriptive
     *
     * @return Product
     */
    public function setDescriptive($descriptive)
    {
        $this->descriptive = $descriptive;

        return $this;
    }

    /**
     * Get descriptive
     *
     * @return string
     */
    public function getDescriptive()
    {
        return $this->descriptive;
    }

    /**
     * Set price
     *
     * @param float $price
     *
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set tva
     *
     * @param float $tva
     *
     * @return Product
     */
    public function setTva($tva)
    {
        $this->tva = $tva;

        return $this;
    }

    /**
     * Get tva
     *
     * @return float
     */
    public function getTva()
    {
        return $this->tva;
    }

    /**
     * Set picture
     *
     * @param string $picture
     *
     * @return Product
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set filename
     *
     * @param string $filename
     *
     * @return Product
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get filename
     *
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->stocks = new \Doctrine\Common\Collections\ArrayCollection();
        $this->likes = new ArrayCollection();
        $this->orderItems = new ArrayCollection();
    }

    /**
     * Add stock
     *
     * @param \AppBundle\Entity\Stock $stock
     *
     * @return Product
     */
    public function addStock(\AppBundle\Entity\Stock $stock)
    {
        $stock->setProduct($this);
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

    /**
     * Add like
     *
     * @param \AppBundle\Entity\Like $like
     *
     * @return Product
     */
    public function addLike(\AppBundle\Entity\Like $like)
    {
        $like->setProduct($this);
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
     * Add orderItem
     *
     * @param \AppBundle\Entity\OrderItem $orderItem
     *
     * @return Product
     */
    public function addOrderItem(\AppBundle\Entity\OrderItem $orderItem)
    {
        $orderItem->setProduct($this);
        $this->orderItems->add($orderItem);

        return $this;
    }

    /**
     * Remove orderItem
     *
     * @param \AppBundle\Entity\OrderItem $orderItem
     */
    public function removeOrderItem(\AppBundle\Entity\OrderItem $orderItem)
    {
        $this->orderItems->removeElement($orderItem);
    }

    /**
     * Get orderItems
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrderItems()
    {
        return $this->orderItems;
    }
}
