<?php


include("data.php");




$bookname=$_POST['bookname'];
$bookdetail=$_POST['bookdetail'];
$bookauthor=$_POST['bookauthor'];
$bookpub=$_POST['bookpub'];
$branch=$_POST['branch'];
$bookprice=$_POST['bookprice'];
$bookquantity=$_POST['bookquantity'];



if (move_uploaded_file($_FILES["bookphoto"] ["tmp_name"],"uploades/".$_FILES["bookphoto"]["name"])){

    echo "uploaded";

    $bookpic=$_FILES["bookphoto"]["name"];


    $obj=new data();

    $obj->setconnection();

    $obj->addbook($bookpic,$bookname,$bookdetail,$bookauthor,$bookpub,$branch,$bookprice,$bookquantity);



}