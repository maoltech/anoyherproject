<?php
   session_start();
   include_once('config.php');

    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);


    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $used = mysqli_query($con, "SELECT email FROM users WHERE email ='{$email}'");
            if(mysqli_num_rows($used)>0){
                echo "$email - This email is already in use";
            }else{
                if(isset($_FILES['image'])){
                    $img_name = $_FILES['image']['name'];
                    $tmp_name = $_FILES['image']['tmp_name'];

                    $img_explode = explode('.', $img_name);
                    $img_ext = end($img_explode);

                    $extension = ['png', 'jpeg', 'jpg'];
                    if(in_array($img_ext, $extension) === true){
                        $time = time();

                        $new_img_name = $time.$img_name;
                        if(move_uploaded_file($tmp_name,"images/".$new_img_name)){

                        $status = "Active now";

                        $random_id = rand(time(), 100000000);

                        $stmt = mysqli_query($con,"INSERT INTO users(unique_id, fname, lname, email, password, image, status)
                        VALUES({$random_id}, '{$fname}', '{$lname}', '{$email}','{$password}','{$new_img_name}', '{$status}')");

                        if($stmt){
                            $stmt1 = mysqli_query($con, "SELECT * FROM users WHERE email ='{$email}'");
                            if (mysqli_num_rows($stmt1)>0){
                                $row = mysqli_fetch_assoc($stmt1);
                                $_SESSION['unique_id'] = $row['unique_id'];
                                echo "success signup";
                            }

                        }else{
                            echo "somthing went wrong";
                        }
                    } 
                    }else{
                    echo "pls upload correct image";
                }


                }else{
                    echo"pls upload image";
                }
            }
        }

    }else{
        echo "Please fill in the empty fields";
    }


?>