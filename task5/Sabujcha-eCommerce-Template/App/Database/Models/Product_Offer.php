<?php
namespace App\Database\Models;
class product_offer{
    private $product_id , $offer_id , $price_after_discount;

    /**
     * Get the value of product_id
     */ 
    public function getProduct_id()
    {
        return $this->product_id;
    }

    /**
     * Set the value of product_id
     *
     * @return  self
     */ 
    public function setProduct_id($product_id)
    {
        $this->product_id = $product_id;

        return $this;
    }

    /**
     * Get the value of offer_id
     */ 
    public function getOffer_id()
    {
        return $this->offer_id;
    }

    /**
     * Set the value of offer_id
     *
     * @return  self
     */ 
    public function setOffer_id($offer_id)
    {
        $this->offer_id = $offer_id;

        return $this;
    }

    /**
     * Get the value of price_after_discount
     */ 
    public function getPrice_after_discount()
    {
        return $this->price_after_discount;
    }

    /**
     * Set the value of price_after_discount
     *
     * @return  self
     */ 
    public function setPrice_after_discount($price_after_discount)
    {
        $this->price_after_discount = $price_after_discount;

        return $this;
    }
}