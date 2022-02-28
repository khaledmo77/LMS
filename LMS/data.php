<?php 

session_start();


include("database.php");

class data extends db{


    private $bookpic;
    private $bookname;
    private $bookdetail;
    private $bookauthor;
    private $bookpub;
    private $bookprice;
    private $type;
    private $bookquantity;






    function __construct(){







    }
     
    function adminLogin($t1, $t2) {

        $q="SELECT * FROM admin where email='$t1' and pass='$t2'";
        $recordSet=$this->connection->query($q);
        $result=$recordSet->rowCount();

        if ($result > 0) {

            foreach($recordSet->fetchAll() as $row) {
                $logid=$row['id'];
                $_SESSION ["adminid"]=  $logid;
                header("location:dashboard.php");
            }
        }

        elseif($result<=0) {
            header("location: index.php?msg=Invalid Credentials");
        }

    }




    function addbook($bookpic,$bookname,$bookdetail,$bookauthor,$bookpub,$branch,$bookprice,$bookquantity){


        $this->$bookpic=$bookpic;
        $this->$bookname=$bookname;
        $this->$bookdetail=$bookdetail;
        $this->$bookauthor=$bookauthor;
        $this->$bookpub=$bookpub;
        $this->$branch=$branch;
        $this->$bookprice=$bookprice;
        $this->$bookquantity=$bookquantity;


        $q="INSERT INTO book (id,bookpic,bookname,bookdetail,bookauthor,bookpub,branch,bookprice,bookquantity)VALUES('','$bookpic','$bookname','$bookdetail','$bookauthor','$bookpub','$branch','$bookprice','$bookquantity') ";

        if ($this->connection->exec($q)){

            header("location:dashboard.php?msg=done");

        }else{
            header("location:dashboard.php?msg=fail");

        }

    }
       
    
    function getbook() {
        $q="SELECT * FROM book ";
        $data=$this->connection->query($q);
        return $data;
    }
    
    function issuereport(){
        $q="SELECT * FROM book";
        $data=$this->connection->query($q);
        return $data;
        
    } 
    function getbookdetail($id){
        $q="SELECT * FROM book where id ='$id';";
        $data=$this->connection->query($q);
        return $data;
    }
    function deletebook($id){
        $query = "DELETE FROM books WHERE book_id=$id ;";
       $statement= $this->connection->prepare($query);
       $statement->bindParam('id',$id,pdo::PARAM_INT);
       if($statement->execute()){

        echo 'id'.$id.'was deleted successfully.';
       }
    
            
        
    }

}
