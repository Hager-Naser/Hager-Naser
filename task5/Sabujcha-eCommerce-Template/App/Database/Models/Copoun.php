<?php
namespace App\Database\Models;
class copoun{
    private $id,$code,$max_usage_count,$max_usage_count_per_user,$mini_order,$price,$status,$discount,$discount_type,$start_at,$end_at,$created_at,$updated_at;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of code
     */ 
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @return  self
     */ 
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of max_usage_count
     */ 
    public function getMax_usage_count()
    {
        return $this->max_usage_count;
    }

    /**
     * Set the value of max_usage_count
     *
     * @return  self
     */ 
    public function setMax_usage_count($max_usage_count)
    {
        $this->max_usage_count = $max_usage_count;

        return $this;
    }

    /**
     * Get the value of max_usage_count_per_user
     */ 
    public function getMax_usage_count_per_user()
    {
        return $this->max_usage_count_per_user;
    }

    /**
     * Set the value of max_usage_count_per_user
     *
     * @return  self
     */ 
    public function setMax_usage_count_per_user($max_usage_count_per_user)
    {
        $this->max_usage_count_per_user = $max_usage_count_per_user;

        return $this;
    }

    /**
     * Get the value of mini_order
     */ 
    public function getMini_order()
    {
        return $this->mini_order;
    }

    /**
     * Set the value of mini_order
     *
     * @return  self
     */ 
    public function setMini_order($mini_order)
    {
        $this->mini_order = $mini_order;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of discount
     */ 
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * Set the value of discount
     *
     * @return  self
     */ 
    public function setDiscount($discount)
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * Get the value of discount_type
     */ 
    public function getDiscount_type()
    {
        return $this->discount_type;
    }

    /**
     * Set the value of discount_type
     *
     * @return  self
     */ 
    public function setDiscount_type($discount_type)
    {
        $this->discount_type = $discount_type;

        return $this;
    }

    /**
     * Get the value of start_at
     */ 
    public function getStart_at()
    {
        return $this->start_at;
    }

    /**
     * Set the value of start_at
     *
     * @return  self
     */ 
    public function setStart_at($start_at)
    {
        $this->start_at = $start_at;

        return $this;
    }

    /**
     * Get the value of end_at
     */ 
    public function getEnd_at()
    {
        return $this->end_at;
    }

    /**
     * Set the value of end_at
     *
     * @return  self
     */ 
    public function setEnd_at($end_at)
    {
        $this->end_at = $end_at;

        return $this;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of updated_at
     */ 
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */ 
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}