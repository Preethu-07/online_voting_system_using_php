<?php
    session_start();
    if(!isset($_SESSION['userdata'])){
        header("location:../");
    }

    $userdata = $_SESSION['userdata'];
    $groupsdata = $_SESSION['groupsdata'];

    if($userdata['status']==0){
        $status='<b style="color:red">Not voted</b>';
    }
    else{
        $status='<b style="color:green">voted</b>';
    }


?>
<html>
    <head>
        <title>online voting system-dashboard</title>
        <link rel="stylesheet" href="../css/stylesheet.css">
    </head>
    <body>
        <style>
            #backbtn{
                padding:5px;
                font-size:15px;
                background-color:#3498db;
                color:white;
                border-radius:5px;
                float:left;
                margin:10px;
            }
            #logoutbtn{
                padding:5px;
                font-size:15px;
                background-color:#3498db;
                color:white;
                border-radius:5px;
                float:right;
                margin:10px;

            }
            #profile{
                background-color:white;
                width:30%;
                padding:20px;
                float:left;
                color:black;

            }
            #Group{
                background-color:white;
                width:60%;
                padding:20px;
                float:right;
                color:black;

            }
            #votebtn{
                padding:5px;
                font-size:15px;
                background-color:#3498db;
                color:white;
                border-radius:5px;
            }
            #mainpanel{
                padding:10px;
            }
            #voted{
                padding:5px;
                font-size:15px;
                background-color:green;
                color:white;
                border-radius:5px;
            }
           h1{
            color:black;
           }

        </style>
        <div id="mainSection">
            <center>
                <div id="headerSection">
                    <a href="../"><button id="backbtn">Back</button></a>
                    <a href="../"><button id="logoutbtn">Logout</button></a>
                    <h1>Online Voting System</h1>

                </div>
        </center>
        <hr>
        <div id="mainpanel">
            <div id="profile">
                <center>
                    <img src="../uploads/<?php echo $userdata['photo'] ?>" height="100" width="100">
                </center>
                <b>Name:</b><?php echo $userdata['name'] ?><br><br>
                <b>mobile:</b><?php echo $userdata['mobile'] ?><br><br>
                <b>Address:</b><?php echo $userdata['address'] ?><br><br>
                <b>Status:</b><?php echo $status ?><br><br>
            </div>
            <div id="Group">
                <?php
                     if($_SESSION['groupsdata']){
                        for($i=0; $i<count($groupsdata); $i++){
                 ?>
                 <div>
                    <img style="float: right" src="../uploads/<?php echo $groupsdata[$i]['photo'] ?>" height="100" width="100">
                    <b>Group Name:</b><?php echo $groupsdata[$i]['name']?><br><br>
                    <b>Votes:</b><?php echo $groupsdata[$i]['votes']?><br><br>
                    <form action="../api/vote.php" method="POST">
                        <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes']?>">
                        <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id']?>">
                        <?php
                           if($_SESSION['userdata']['status']==0){
                            ?>
                            <input type="submit" name="votebtn" value="Vote" id="votebtn">
                            <?php
                           }
                           else{
                            ?>
                            <button disabled type="button" name="votebtn" value="vote" id="voted">Voted</button>
                            <?php
                           }

                        ?>
                    </form>
                </div>
                <hr>
                <?php


              }             
            
            }
            else{

            }
            ?>
        </div>
        </div>
    </body>
</html>



