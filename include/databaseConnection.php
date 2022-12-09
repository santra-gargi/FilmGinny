<?php

class DatabaseClass  
{  
    private $host = "localhost"; // your host name  
    private $username = "root"; // your user name  
    private $password = ""; // your password  
    private $db = "fgc"; // your database name  
    public  
    function __construct()  
    {  
        mysqli_connect($this -> host, $this -> username, $this -> password, $this -> db) or die(mysqli_error("fgc"));  
    } 
}
?>