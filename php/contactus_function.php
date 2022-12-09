<?php
class Contact{
    private $host="localhost";
    private $user="root";
    private $pass="";
    private $db="contact";
    public $mysql;

    public function __construct(){
        return $this->mysqli=new mysqli($this->host,$this->user,$this->pass,$this->db);
    }
    public function contact_us($data){
        $name=$data['name'];
        $phone=$data['number'];
        $email=$data['email'];
        $message=$data['message'];
        $q="insert into contact_us set Name='$name',Phone No='$phone',Email Id='$email',Message='$message'"};
        return $this->mysql->query($q);
}
?>