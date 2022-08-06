<?php
namespace App\Database\Models;
use App\Database\Config\connect_database;
class similar extends connect_database{
    const TABLE = '';
    static function all(){
        $query = "SELECT * FROM " . static::TABLE ;
    }
    static function find(int $id){
        $query = "SELECT * FROM " . static::TABLE . "WHERE id={$id}";
    }
}
new similar;