<!-- Header -->
<?php  include '../api/connect.php'?>
<?php include "header.php"?>
<?php $view="../pic/download.jpeg"


?>

<html>
<head>
    <style>
      body{
        background-attachment: fixed;
        background-image:url('<?php echo $view;  ?>');
        background-repeat: no-repeat;
        background-size: 100% 100%;
        color:white;
      }
    </style>
  </head>
<body style="color:black";>
<center>
<h1 class="text-center">User Details</h1>
  <div class="container">
  
               
            <?php
              if (isset($_GET['user_id'])) {
                  $userid = $_GET['user_id']; 

    
                  $query="SELECT id,name,mobile,address,photo,role FROM user WHERE id = {$userid} ";  
                  $view_users= mysqli_query($connect,$query);            

                  while($row = mysqli_fetch_assoc($view_users))
                  {
                      $id = $row['id'];
                      $user = $row['name'];
                      $mobile = $row['mobile'];
                      $address = $row['address'];
                      $photo = $row['photo'];
                      $role= $row['role'];
                      
                       echo "<img src='../uploads/$photo' height='250' width='250'><br>";
                       echo "<b>ID: $id</b><br>";
                       echo "<b>NAME: $user</b><br>";
                       echo "<b>MOBILE: $mobile</b><br>";
                       echo "<b>ADDRESS: $address</b><br>";
                       echo "<b>ROLE: $role</b>";
                       
                  }
                }
            ?>
          </tr>  
        </tbody>
    </table>
  </div>

  <div class="container text-center mt-5">
    <a href="home.php" class="btn btn-warning mt-5"> Back </a>
  <div>
  </center>
</body>
</html>

