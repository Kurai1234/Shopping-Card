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


$e = array(
    'statusCode' =>101,
    'message'=>'good'
);
if(isset($_POST['fname']))
{
    $fname = $_POST['fname'];
    $lname= $_POST['lname'];
    $address= $_POST['address1'];
    $district1=$_POST['district1'];
    $email=$_POST['email'];
    $cardname=$_POST['cardname'];
    $cardnum=$_POST['cardnum'];
    $ccv=$_POST['ccv'];
    $counter= $_POST['counter'];
    $amount= $_POST['total'];

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $e['statusCode']=101;
        $e['message'] = "bad email"; }
        else{
    
            $insertbuyer ="INSERT INTO `sale` (`fname`, `lname`, `email`, `address`, `district`, `cardName`, `cardnumber`, `cvv`, `total`) VALUES ('$fname', '$lname', '$email', '$address', '$district1', '$cardname', '$cardnum', '$ccv', '$amount')";
        $execute= mysqli_query($conn,$insertbuyer);
        if($execute){
            $e['statusCode']=100;
            $e['message'] = "Login"; 
            
            $_SESSION['cardnumber']=$cardnum;
            $_SESSION['fname']=$fname;
            $_SESSION['lname']=$lname;
            $_SESSION['counter']=$counter;
            $_SESSION['address']=$address;
           
        
        }
        else{$e['statusCode']=101;
            $e['message'] = "Login";  
        }
        }
        


}

else{
    $e['statusCode'] =101;
}
echo json_encode($e);
mysqli_close($conn);




?>