<?php 
include 'db.php';
$dresult = array(
    'statusCode' =>101,
    'message'=>'good'
);
if(isset($_POST['email']) && isset($_POST['pwd'])){
   
   $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $sql = "SELECT * FROM `user` WHERE `usersEmail` = '$email' AND `usersPassword`='$pwd' ";
    $execute = mysqli_query($conn, $sql);
    $check = mysqli_num_rows($execute);
   
       
           if($check)
            {
                $row = mysqli_fetch_array($execute);
                $id =$row['usersID'];
                $name=$row['usersName'];
                $email= $row['usersEmail']; 
                $dresult['statusCode'] = 100;
             $dresult['message'] = "Login";  
                session_start();
                $_SESSION['user_id']=$id;
                
                $_SESSION['user_name']=$name;
                $_SESSION['user_email']=$email;
            
            }
            else
            {
                $dresult['statusCode'] = 101;
             $dresult['message'] = "Wrong Credentials";  
            }   
            
     echo json_encode($dresult);
        mysqli_close($conn);
}

?>