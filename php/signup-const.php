<?php
 require('config_conn.php');

 
 
class signupConst{
    

    private $fname;
    private $lname;
    private $email;
    private $password;

    public function __construct($fname, $lname, $email, $password)
    {
     $this->$fname = $fname;
     $this->$lname = $lname;
     $this->$email = $email;
     $this->$password = $password;
    }
    public $db = null;
    private function emptyInput(dbconn $db){
        $this->db = $db;
        if(!empty($this->fname) && !empty($this->lname) && !empty($this->email) && !empty($this->password)){
            if(filter_var($this->email, FILTER_VALIDATE_EMAIL)){
                $used = mysqli_query($db, "SELECT email FROM users WHERE email ='{$this->email}'");
                if(mysqli_num_rows($used)>0){
                    echo "$this->email - This email is already in use";
                }else{
                    if(isset($_FILES['image'])){
                        $img_name = $_FILES['image']['name'];
                        $tmp_name = $_FILES['image']['tmp_name'];

                        $img_explode =explode('.', $img_name);
                        $img_ext = end($img_explode);

                        $extension = ['png', 'jpeg', 'jpg'];
                        if(in_array($img_ext, $extension) === true){
                            $time = time();

                            $new_img_name =$time.$img_name;
                            move_uploaded_file($tmp_name,"images/".$new_img_name);

                            $status = "Active now";

                            $random_id = rand(time(), 100000000);

                            $stmt = mysqli_query($db,"INSERT INTO users(unique_id, fname, lname, email, password, image, status)
                            VALUES('{$random_id}', '{$fname}', '{$lname}', '{$email}','{$password}','{$image}', '{$status}')");

                            if($stmt){
                                $stmt1 = mysqli_query($db, "SELECT * FROM users WHERE email ='{$email}'");
                                if (mysqli_num_rows($stmt)>0){
                                    $row = mysqli_fetch_assoc($stmt1);
                                    $_SESSION['unique_id'] = $row['unique_id'];
                                    echo "success signup";
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
    }

}
?>