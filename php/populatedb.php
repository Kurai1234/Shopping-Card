<?php
    include 'db.php';
    session_start();
    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM `user` WHERE `usersID` = '$user_id' ";
        $execute = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($execute);
        if($row){
            $rowinfo = mysqli_fetch_array($execute);
            $fName= $rowinfo['usersName'];
            $uName= $rowinfo['usersUid'];
        
        }
    }else{
     header("location: /shopping%20App/login.php");
     exit;
    }


    if(isset($_POST['name'])||isset($_POST['quantity'])||isset($_POST['total'])||isset($_POST['totalitems'])){
        $name = $_POST['name'];
        $quantity = $_POST['quantity'];
        $total= $_POST['total'];
        $totalitems = $_POST['totalitems'];
        $userid = $_SESSION['user_id'];
            
        $sql ="INSERT INTO `productpurchase` (`userid`, `name`, `quantity`, `price`) VALUES ('$userid',  '$name', '$quantity', '$total')";
        if(mysqli_query($conn, $sql)){
            
            $result['statusCode'] =100;
        }
        else{
            $result['statusCode'] =101;
            $result['message']="here";
        }
    
    }
    else{
        $result['statusCode']=101;
        $result['message']="there";
    }

    echo json_encode($result);
       
    mysqli_close($conn);



    ?>