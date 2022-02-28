<?php
include("data.php");

$id=$_GET['id'];


$obj=new data();
$obj->setconnection();
$obj->deletebook($id);