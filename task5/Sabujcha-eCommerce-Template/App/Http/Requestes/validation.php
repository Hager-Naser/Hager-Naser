<?php
namespace App\Http\Requestes;
use App\Database\Models\similar;
class validation
{
    // first name => [require , string , max:20 ]
    // last name  => [require , string , max:20 ]
    // email      => [require , regular expretion(regex) , uniqe:table users column email]
    // password   => [require , regular expretion(regex) , confirmed]
    // password confirmation => [require]
    // gender     => [require , check_gender: m,f]
    private $key; // first name
    private $value; // hager
    private array $errors = [];
    function require() : self     
    {
        if (empty($this->value)) {
            //     errors[first name][require]               = first name is required
            //     errors[last name][require]                = last name is required
            //     errors[email][require]                    = email is required
            //     errors[password][require]                 = password is required
            //     errors[password confirmation][require]    = password confirmation is required
            //     errors[gender][require]                   = gender is required
            //     we can write replace ['require'] of  __FUNCTION__
            $this->errors[$this->key]['require'] = "{$this->key} is required";
        }
        return $this;
    }
    function string() :self
    {
        if(!(is_string($this->value))){
            $this->errors[$this->key][__FUNCTION__] = "{$this->key} must be string";
        }
        return $this;
    }
    function checklen_max($max) :self
    {
        if (strlen($this->value) > $max) {
            //     errors[first name][checklen_max]               = first name is must be less than 20 Character
            //     errors[last name][checklen_max]                = last name  is must be less than 20 Character
            //     errors[email][checklen_max]                    = email is   is must be less than 255 Character
            //     errors[password][checklen_max]                 = password   is must be less than 100 Character
            //     errors[password confirmation][checklen_max]    = password confirmation is must be less than 100 Character
            //     errors[gender][checklen_max]                   = gender is must be less than 1 Character
            //     __FUNCTION__ = name of function =>> we can write checklen_max
            $this->errors[$this->key][__FUNCTION__] = "{$this->key} is must be less than {$max} character";
        }
        return $this;
    }
    function checklen_min($min) :self
    {
        if (strlen($this->value) < $min) {
            //     errors[first name][checklen_min]               = first name is must be greater than min Character
            //     errors[last name][checklen_min]                = last name  is must be greater than min Character
            //     errors[email][checklen_min]                    = email is   is must be greater than min Character
            //     errors[password][checklen_min]                 = password   is must be greater than min Character
            //     errors[password confirmation][checklen_min]    = password confirmation is must be greater than min Character
            //     errors[gender][checklen_min]                   = gender is must be greater than min Character
            //     __FUNCTION__ = name of function =>> we can write checklen_min
            $this->errors[$this->key][__FUNCTION__] = "{$this->key} is must be greater than {$max} character";
        }
        return $this;
    }
    function regular_expretion($pattern , $error_message=null) :self
    {
        if(!(preg_match($pattern , $this->value))){
            // if($error_message){
            //     $this->errors[$this->key][__FUNCTION__] = $error_message;
            // }
            // $this->errors[$this->key][__FUNCTION__] = "{$this->key} isn,t valid ";
            $this->errors[$this->key][__FUNCTION__] = $error_message ??"{$this->key} isn,t valid ";
        }
        return $this;
    }
    function confirm($pass) :self
    {
        if ($this->value != $pass){
            //     errors[password][__FUNCTION__]    = password isn,t confirmed
            $this->errors[$this->key][__FUNCTION__] = "{$this->key} isn,t confirmed ";
        }
        return $this;
    }
    function check_exist(array $values){
        if (!(in_array($this->value , $values ))){
            $this->errors[$this->key][__FUNCTION__] = "{$this->key} must be " . implode(" , " , $values);
        }
        return $this;
    }
    function  uniqe_data($table , $column){
        $similar = new similar;
        #to use function prepare we must use instance from mysqli
        #con is instance of mysqli so we use it
        #similar extends from connect_database so it extends property con
        #value => from user => so we put ?
        $check = $similar->con->prepare("SELECT * FROM {$table} WHERE {$column} = ?"); //return class in mysql if true and check instance from it
        $check->bind_param('s' , $this->value);
        $check->execute();
        # get_result is built in function into it property num_rows
        $output = $check->get_result(); // data output 
        if($output->num_rows == 1){    //  $check->get_result()->num_rows     => 1 exist => 0 not exist
            $this->errors[$this->key][__FUNCTION__] = "{$this->key} is exist";
        }
        return $this;
    }
    function  exist_data($table , $column){
        $similar = new similar;
        #to use function prepare we must use instance from mysqli
        #con is instance of mysqli so we use it
        #similar extends from connect_database so it extends property con
        #value => from user => so we put ?
        $check = $similar->con->prepare("SELECT * FROM {$table} WHERE {$column} = ?"); //return class in mysql if true and check instance from it
        $check->bind_param('s' , $this->value);
        $check->execute();
        # get_result is built in function into it property num_rows
        $output = $check->get_result(); // data output 
        if($output->num_rows == 0){    //  $check->get_result()->num_rows     => 1 exist => 0 not exist
            $this->errors[$this->key][__FUNCTION__] = "{$this->key} is not exist";
        }
        return $this;
    }
    /**
     * Set the value of key
     *
     * @return  self
     */ 
    public function setKey($key)
    {
        $this->key = $key;
        return $this;
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
    /**
     * Get the value of errors
     */ 
    public function getErrors()
    {
        return $this->errors;
    }
    /**
     * Get the value of error
     */ 
    public function getError(string $key_error) :?string   // ? => null
    {
        if(isset($this->errors[$key_error])){
            foreach($this->errors[$key_error] as $value_error){
                return $value_error;
            }
        }
        return null;
    }
    public function errorMessage(string $key_error) :string 
    {
        return "<p class='text-danger font-size-3 font-weight-bold'>" . $this->getError($key_error) . "</p>";
    }
}