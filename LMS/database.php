<?php

class db{

protected $connection;


function setconnection (){



try {
    $this->connection=new PDO("mysql:host=localhost;dbname=lms","root","");

} catch (PDOException $e) 

{
 echo "error";


 
}
}


}