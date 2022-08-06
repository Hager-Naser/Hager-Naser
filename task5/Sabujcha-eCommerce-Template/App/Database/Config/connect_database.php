<?php
namespace App\Database\Config;
// use mysqli;
class connect_database{
    private string $hostname = 'localhost';
    private string $userName = 'root';
    private string $password = '';
    private string $databaseName = 'nti';
    private int $port = 3306;
    public \mysqli $con;
    function __construct(){
        $this->con = new \mysqli($this->hostname , $this->userName , $this->password , $this->databaseName , $this->port);
        // if($this->con->connect_error){
        //     die("Connect Failed:" . $this->con->connect_error );
        // }
        // echo "Connect Success";
    }
    function __destruct(){
        $this->con->close();
    }
}
$instance = new connect_database;