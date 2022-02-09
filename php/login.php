<?php
   session_start();
   include_once('config.php');

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);


    if(!empty($email) && !empty($password)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                        $status = "Active now";

                            $stmt1 = mysqli_query($con, "SELECT * FROM users WHERE email ='{$email}' AND password = '{$password}'");
                            if (mysqli_num_rows($stmt1)>0){
                                $row = mysqli_fetch_assoc($stmt1);
                                $_SESSION['unique_id'] = $row['unique_id'];
                                echo "success login";
                            }else{
                                echo "Email or password not valid";
                            }
        }                    
    }else{
        echo "Please fill in the empty fields";
    }


?>