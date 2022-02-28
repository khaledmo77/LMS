<?php 

include("data.php");
$adminid=$_SESSION ["adminid"];

// if ($adminid==null){

//     header("Location:index.php");


// }
// // $adminid=$_Get['']

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/dashboard.css" >
    
  </head>
  <body>
  <div class='dashboard'>
    <div class="dashboard-nav">
        <header><a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a><a href="#"
                                                                                   class="brand-logo"><i
                class="fas fa-anchor"></i> <span>BRAND</span></a></header>
        <nav class="dashboard-nav-list"><a href="#" class="dashboard-nav-item"><i class="fas fa-home"></i>
            Home </a><a
            
                href="#adminui" class="dashboard-nav-item active"><i class="fas fa-tachometer-alt"></i> dashboard
        </a>
        
         <Button class="btn btn-primary "  onclick="openpart('adminui')" > ADMIN</button>
                <Button class="btn btn-primary" onclick="openpart('addbook')" >  ADD BOOK</Button>
                <Button class="btn btn-primary" onclick="openpart('editbook')" >  Edit BOOK</Button>
           
        
              
            
            <a href="#" class="dashboard-nav-item"><i class="fas fa-cogs"></i> Settings </a><a
                    href="#" class="dashboard-nav-item"><i class="fas fa-user"></i> Profile </a>
          <div class="nav-item-divider"></div>
          <a
                    href="#" class="dashboard-nav-item"><i class="fas fa-sign-out-alt"></i> Logout </a>
        </nav>
    </div>

  
    






    <div class='dashboard-app'>
        <div class='dashboard-content'>
            <div class="container"> 
        
        <div class="row justify-content-md-center">
        <div class="col col-lg-3">
        <div id="addbook" class="portion" style="<?php  if(!empty($_REQUEST['viewid'])){ echo "display:none";} else {echo ""; }?>">
        <form class="form-verical" action="addbook.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label class="control-label col-sm-2" for="text">Book Name:</label>
    <div class="col-sm-10">
      <input type="text" name="bookname" class="form-control" id="email" placeholder="Enter Book Name">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="text">Detail:</label>
    <div class="col-sm-10">
      <input type="text" name="bookdetail" class="form-control" id="email" placeholder="Enter Book details">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="text">Autor:</label>
    <div class="col-sm-10">
      <input type="text"  name="bookauthor" class="form-control" id="email" placeholder="Enter The Author Name">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="text">Publication:</label>
    <div class="col-sm-10">
      <input type="text" name="bookpub" class="form-control" id="email" placeholder="Enter Book Publication">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="text">branch:</label>
    <div class="col-sm-10">
    <div class="checkbox">
  <label><input type="checkbox" name="branch" value="">it</label>
</div>
<div class="checkbox">
  <label><input type="checkbox"name="branch" value="">is</label>
</div>
<div class="checkbox">
  <label><input type="checkbox" name="branch" value="">eco</label>
</div>    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="text">Price:</label>
    <div class="col-sm-10">
      <input type="number" name="bookprice" class="form-control" id="email" placeholder="price">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="text">Quantity:</label>
    <div class="col-sm-10">
      <input type="number" name="bookquantity" class="form-control" id="email" placeholder="Quantity">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="file">Book Photo</label>
    <div class="col-sm-10">
      <input type="file" name="bookphoto" class="form-control" id="email" placeholder="Enter Book Photo">
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
        </div>
        </div>
        <div class="portion" id="editbook">
       
            <?php
            $u=new data();
            $u->setconnection();
            $u->issuereport();
            $recordset=$u->issuereport();
            ?>

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Issue Name</th>
      <th scope="col">Book Name</th>
      <th scope="col">Issue Date</th>
      <th scope="col">Return Date</th>
      <th scope="col">Fine</th>
 <th scope="col">Issue Type</th>
 <th scope="col">VIEW</th>
 <th scope="col">DELETE</th>

    </tr>
  </thead>
  <tbody>
<?php
foreach($recordset as $row){
?>
    <tr>
      <th scope="row"><?=$row[2];?></th>
      <td><?=$row[3];?></td>
      <td><?=$row[6];?></td>
      <td><?=$row[7];?></td>
 <td><?=$row[8]?></td>
 <td><?=$row[4]?></td>
 <td><a href="dashboard.php?viewid=$row[id]"><button type='button' class='btn btn-primary'>View BOOK</button></a></td>
 <td><a href='deletebook.php?id=$row[id] '><button type='button' class='btn btn-danger'>Delete BOOK</button></a></td>
 
    </tr>
<?php
}
?>


 
     
   
  </tbody>

</table>

    </div>
        </div>
        <div class="portion" id="adminui">
     
        
        

                <div class='card'>
                    <div class='card-header'>
                        <h1>Welcome back Jim</h1>
                    </div>
                    <div class='card-body'>
                        <p>Your account type is: Administrator</p>
                    </div>
                </div>
            </div>
            <div class="rightinnerdiv">   
            <div id="bookdetail" class="innerright portion" style="<?php  if(!empty($_REQUEST['viewid'])){ $viewid=$_REQUEST['viewid'];} else {echo "display:none"; }?>">
            

            
            <?php
            $u=new data();
            $u->setconnection();
            $u->getbook();
            $recordset=$u->getbook();
            $u->getbookdetail($viewid);
            $recordset1=$u->getbookdetail($viewid);
            foreach($recordset as $row){

                 $bookid= $row[0];
               $bookimg= $row[1];
                $booknme= $row[2];
               $bookdetail= $row[3];
               $bookauthour= $row[4];
               $bookpub= $row[5];
               $branch= $row[6];
               $bookprice= $row[7];
               $bookquantity= $row[8];
               ?>
               
               
               <?php
            
               






         

            }     

?>


 <img width='150px' height='150px' style='border:1px solid #333333; float:left;margin-left:20px' src="uploades/<?=$bookimg;?>"/>
            </br>


            <p style="color:black"><u>Book Name:</u> &nbsp&nbsp<?=
                $booknme?></p>
            <p style="color:black"><u>Book Detail:</u> &nbsp&nbsp<?php echo  $bookdetail ?></p>
            <p style="color:black"><u>Book Authour:</u> &nbsp&nbsp<?php echo  $bookauthour ?></p>
            <p style="color:black"><u>Book Publisher:</u> &nbsp&nbsp<?php echo   $bookpub ?></p>
            <p style="color:black"><u>Book Branch:</u> &nbsp&nbsp<?php echo $branch ?></p>
            <p style="color:black"><u>Book Price:</u> &nbsp&nbsp<?php echo $bookprice ?></p>
            <p style="color:black"><u>Book Available:</u> &nbsp&nbsp<?php echo $bookquantity ?></p>
         


            </div>
            </div>
           
        </div>
    </div>
</div>
</div>
  </div>

     
<script>
        function openpart(portion) {
        var i;
        var x = document.getElementsByClassName("portion");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
        }
        document.getElementById(portion).style.display = "block";  
        }
        </script>
    <script src="js/dashboard.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>