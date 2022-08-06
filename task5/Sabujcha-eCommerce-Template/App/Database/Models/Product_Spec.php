<?php
namespace App\Database\Models;
class product_spec{
    private $product_id , $spec_id , $value;

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
     * Get the value of spec_id
     */ 
    public function getSpec_id()
    {
        return $this->spec_id;
    }

    /**
     * Set the value of spec_id
     *
     * @return  self
     */ 
    public function setSpec_id($spec_id)
    {
        $this->spec_id = $spec_id;

        return $this;
    }

    /**
     * Get the value of value
     */ 
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set the value of value
     *
     * @return  self
     */ 
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}