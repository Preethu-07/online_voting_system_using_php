<!-- Footer -->
<?php include "../api/connect.php"?>
<?php include "header.php"?>

<?php
   // checking if the variable is set or not and if set adding the set data value to variable userid
   if(isset($_GET['user_id']))
    {
      $userid = $_GET['user_id']; 
    }
      // SQL query to select all the data from the table where id = $userid
      $query="SELECT * FROM user WHERE id = $userid ";
      $view_users= mysqli_query($connect,$query);

      while($row = mysqli_fetch_assoc($view_users))
        {
          $id = $row['id'];
          $user = $row['name'];
          $mobile = $row['mobile'];
          $password = $row['password'];
          $address = $row['address'];
          $photo = $row['photo'];
          $role = $row['role'];
          $status = $row['status'];
          $votes = $row['votes'];
        }
 
    //Processing form data when form is submitted
    if(isset($_POST['update'])) 
    {
      $user = $_POST['user'];
      $address = $_POST['address'];
      $mobile=$_POST['mobile'];
      $image = $_FILES['photo']['name'];
      $tmp_name = $_FILES['photo']['tmp_name'];
      move_uploaded_file($tmp_name, "../uploads/$image");
      
      // SQL query to update the data in user table where the id = $userid 
      $query = "UPDATE user SET name = '{$user}' , address = '{$address}' , photo = '{$image}' WHERE id = $userid";
      $update_user = mysqli_query($connect, $query);
      echo "<script type='text/javascript'>alert('User data updated successfully!')</script>";
    }             
?>

<?php
$pic="download.jpeg"

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <title>crud operation</title>
    <style>
      body{
        background-attachment: fixed;
        background-image:url('<?php echo $pic;  ?>');
        background-repeat: no-repeat;
        background-size: 100% 100%;
        color:black;
      }
    </style>
  </head>
  <body>

<h1 class="text-center">Update User Details</h1>
  <div class="container ">
    <form action="" method="post" enctype="multipart/form-data" >
      <div class="form-group">
        <label for="user" >Username</label>
        <input type="text" name="user" class="form-control" value="<?php echo $user  ?>">
      </div>

      <div class="form-group">
        <label for="address" >Address</label>
        <input type="text" name="address"  class="form-control" value="<?php echo $address  ?>">
      </div>

      <div class="form-group">
        <label for="mobile" >Mobile</label>
        <input type="text" name="mobile"  class="form-control" value="<?php echo $mobile ?>">
      </div>
    
      <div id="imagepart">
           upload image:<input type="file" name="photo"><br><br>
           </div> 

      <div class="form-group">
         <input type="submit"  name="update" class="btn btn-primary mt-2" value="update">
      </div>
    </form>    
  </div>

    <!-- a BACK button to go to the home page -->
    <div class="container text-center mt-5">
      <a href="home.php" class="btn btn-warning mt-5"> Back </a>
    <div>
</body>
</html>

