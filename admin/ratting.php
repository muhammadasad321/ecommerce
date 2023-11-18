<?php
require('top.inc.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Products</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->

    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
  
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Ratting</h1>

          <table class="table table-striped">
    <thead>
      <tr>
        
        <th>Name</th>
        <th>Phone</th>
        <th>Ratting</th>
        <th>Review</th>
        <th>Status</th>
        
      </tr>
    </thead>
    <tbody>
      <?php
      $sel="SELECT * FROM ratting";
      $rs=$con->query($sel);
      while($row=$rs->fetch_assoc()){
      ?>
      <tr>
       
        <td><?php echo $row['name']; ?></td>
         <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['ratting']; ?></td>
           <td><?php echo $row['review']; ?></td>
           <td>
            <?php if($row['isapproved']=='1'){?>

            <a href="unap.php?id=<?php  echo $row['id'];?>" class="btn btn-primary">Approved</a>
          <?php  } else{ ?>
<a href="ap.php?id=<?php  echo $row['id'];?>" class="btn btn-danger">Not Approved</a>
          <?php } ?>

          </td>
       
       
       
      </tr>
      <?php
       }
      ?>
      
    </tbody>
  </table>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
		<?php require('footer.inc.php')?>
 