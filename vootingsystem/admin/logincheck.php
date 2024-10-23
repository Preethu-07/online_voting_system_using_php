<?php

    include_once('includes/connect.php');

    $username=$_REQUEST['username'];
    $password=$_REQUEST['password'];

    $query=mysqli_query($connect,"select id from signup where  username='$username' && Password='$password' ");
    if(mysqli_num_rows($query)>0){
        $userdata = mysqli_fetch_array($query);
        $groups = mysqli_query($connect,"SELECT * FROM signup");
        $groupsdata = mysqli_fetch_all($groups,MYSQLI_ASSOC);
    
        $_SESSION['userdata'] = $userdata;
        $_SESSION['groupsdata'] = $groupsdata;
    
        echo '
            <script>
                alert("login successful");
                window.location = "home.php";
            </script>
        ';
    
    
    }
    else{
        echo '
            <script>
                alert("invalid creadentials or user not found");
                window.location = "../";
            </script>
        ';
    }


?>      