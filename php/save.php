<?php
    include 'db.php';
    //here we do a check to see if the name has been filled...some dont do this...bu t i do, ause 



    //sometime it pushed empty data..

    $dresult = array(
        'statusCode' =>101,
        'message'=>'good'
    );
    
    $errorEmpty = false;
    $errorEmail = false;

    if(isset($_POST['name'])||isset($_POST['uname'])||isset($_POST['email'])||isset($_POST['pwd'])){
        $name = $_POST['name'];
        $uname = $_POST['uname'];
        $email = $_POST['email'];
        $pass = $_POST['pwd'];
        
        if(!empty($name)&& !empty($uname) && !empty($email) && !empty($pass))
        {
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                    $dresult['message'] = "invalid Email";
                    $dresult['statusCode'] =101;
                    $errorEmail = true;
                }else

                {
                    $checkemail =  $sql = "SELECT * FROM `user` WHERE `usersEmail` = '$email'";
                    $validemail = mysqli_query($conn,$checkemail);
                    if(mysqli_num_rows($validemail)){
                        $dresult['message'] = "Email already register";
                        $dresult['statusCode'] =101;
                    }else{
                        $sql ="INSERT INTO `user` (`usersName`, `usersEmail`, `usersUid`, `usersPassword`) VALUES ('$name',  '$email','$uname', '$pass')";
                        if(mysqli_query($conn, $sql)){
                            
                            $dresult['statusCode'] =100;
                            $dresult['message'] = "Successfully register";
                            
                            $sql = "SELECT * FROM `user` WHERE `usersEmail` = '$email' AND `usersPassword`='$pass' ";
                            $execute= mysqli_query($conn,$sql);
                            $row = mysqli_fetch_array($execute);
                              $id =$row['usersID'];
                              $name=$row['usersName'];
                              $email= $row['usersEmail'];  

                              session_start();
                            $_SESSION['user_id']=$id;
                            $_SESSION['user_name']=$name;
                            $_SESSION['user_email']=$email;
                            
                        }
                        else{
                            $dresult['statusCOde'] =101;
                            $dresult['message']="Fail to register";
                        }
                    }
                }

        }else

        {
            $dresult['message'] = "Please fill empty field";
            $dresult['statusCode']=101;
        }
        
        
        
        
        
        
      








        echo json_encode($dresult);
       
        mysqli_close($conn);
        
    }

?>