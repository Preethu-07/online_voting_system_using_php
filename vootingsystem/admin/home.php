
<?php include "../api/connect.php"?>
<?php include "header.php"?>
 <?php
$pic="download.jpeg"

?>
<html>
  <head>
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
  <div class="container">
    <h1 class="text-center" >WELCOME TO ADMIN</h1>

        <table class="table table-striped table-bordered table-hover">
          <thead class="table-dark">
            <tr>
              <th  scope="col">ID</th>
              <th  scope="col">Username</th>
              <th  scope="col">mobile</th>
              <th  scope="col"> address</th>
              <th  scope="col">photo</th>
              <th  scope="col" colspan="3" class="text-center">CRUD Operations</th>
            </tr>  
          </thead>
            <tbody>
              <tr> 
 
          <?php
            $query="SELECT * FROM user";               
            $view_users= mysqli_query($connect,$query);   

            
            while($row= mysqli_fetch_assoc($view_users)){
              $id = $row['id'];                
              $user = $row['name'];        
              $mobile = $row['mobile'];         
              $address = $row['address']; 
              $photo=$row['photo']; 

              echo "<tr >";
              echo " <th scope='row' >{$id}</th>";
              echo " <td > {$user}</td>";
              echo " <td > {$mobile}</td>";
              echo " <td >{$address} </td>";
              echo " <td >{$photo} </td>";

              echo " <td class='text-center'> <a href='view.php?user_id={$id}' class='btn btn-primary'> <i class='bi bi-eye'></i> View</a> </td>";

              echo " <td class='text-center' > <a href='update.php?edit&user_id={$id}' class='btn btn-secondary'><i class='bi bi-pencil'></i> EDIT</a> </td>";

              echo " <td  class='text-center'>  <a href='delete.php?delete={$id}' class='btn btn-danger'> <i class='bi bi-trash'></i> DELETE</a> </td>";
              echo " </tr> ";
                  }  
                ?>
              </tr>  
            </tbody>
        </table>
  </div>


<div class="container text-center mt-5">
      <a href="../" class="btn btn-warning mt-5"> Back </a>
    <div>
    </body>
</html>
      