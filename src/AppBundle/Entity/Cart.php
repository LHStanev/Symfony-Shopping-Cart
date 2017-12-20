<?php


namespace AppBundle\Entity;


use Doctrine\Common\Collections\ArrayCollection;

class Cart
{
    /**
     * @var Book[]|ArrayCollection
     */
    private $orders;

    public function __construct()
    {
        $this->orders=new ArrayCollection();
    }

    /**
     * @return Book[]|ArrayCollection
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * @param Book[]|ArrayCollection $orders
     */
    public function setOrders($orders)
    {
        foreach ($orders as $order){
            $this->orders->add($order);
        }
    }



}