<?php
/**
 * Created by PhpStorm.
 * User: damien
 * Date: 12/10/16
 * Time: 10:02
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="`order`")
 * @ORM\Entity()
 */
class Order
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
     * @var $deliveryTime
     * @ORM\Column(name="delivery_time", type="string", length=255, nullable=true)
     */
    private $deliveryTime;

    /**
     * @var $status
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $status;

    /**
     * @var $deliveredOn
     * @ORM\Column(name="delivered_on", type="datetime", nullable=true)
     */
    private $deliveredOn;

    /**
     * @var $address
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\UserAddress", inversedBy="UserAddress")
     * @ORM\JoinColumn(name="address_id", referencedColumnName="id")
     */
    private $address;

    /**
     * @var $room
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Room", inversedBy="Room")
     * @ORM\JoinColumn(name="room_id", referencedColumnName="id")
     */
    private $room;

    /**
     * @var ArrayCollection $orderItems
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\OrderItem", mappedBy="order", cascade={"all"})
     */
    private $orderItems;

    /**
     * @var $link
     * @ORM\Column(name="link", type="string", length=255, nullable=false)
     */
    private $link;

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
     * Set deliveryTime
     *
     * @param string $deliveryTime
     *
     * @return Order
     */
    public function setDeliveryTime($deliveryTime)
    {
        $this->deliveryTime = $deliveryTime;

        return $this;
    }

    /**
     * Get deliveryTime
     *
     * @return string
     */
    public function getDeliveryTime()
    {
        return $this->deliveryTime;
    }

    /**
     * Set status
     *
     * @param boolean $status
     *
     * @return Order
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set deliveredOn
     *
     * @param \DateTime $deliveredOn
     *
     * @return Order
     */
    public function setDeliveredOn($deliveredOn)
    {
        $this->deliveredOn = $deliveredOn;

        return $this;
    }

    /**
     * Get deliveredOn
     *
     * @return \DateTime
     */
    public function getDeliveredOn()
    {
        return $this->deliveredOn;
    }

    /**
     * Set address
     *
     * @param \AppBundle\Entity\UserAddress $address
     *
     * @return Order
     */
    public function setAddress(\AppBundle\Entity\UserAddress $address = null)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return \AppBundle\Entity\UserAddress
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set room
     *
     * @param \AppBundle\Entity\Room $room
     *
     * @return Order
     */
    public function setRoom(\AppBundle\Entity\Room $room = null)
    {
        $this->room = $room;

        return $this;
    }

    /**
     * Get room
     *
     * @return \AppBundle\Entity\Room
     */
    public function getRoom()
    {
        return $this->room;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->orderItems = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add orderItem
     *
     * @param \AppBundle\Entity\OrderItem $orderItem
     *
     * @return Order
     */
    public function addOrderItem(\AppBundle\Entity\OrderItem $orderItem)
    {
        $orderItem->setOrder($this);
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

    /**
     * Set link
     *
     * @param string $link
     *
     * @return Order
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }
}
