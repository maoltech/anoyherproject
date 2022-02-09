<?php
    session_start();
    include_once('config.php');

    $sql1 = mysqli_query($con, 'SELECT * FROM users');
    $output="";

    if(mysqli_num_rows($sql1) == 1){
        $output .= "no user are available to chat";
    }elseif(mysqli_num_rows($sql1) > 0){
        while($row1 = mysqli_fetch_assoc($sql1)){
            $output .=   '<a href="#">
                            <div class="content">
                                <img src="php/images/'.$row1['image'].'" alt="">
                            <div class="details">
                                <span>
                                '.$row1['fname']." ".$row1['lname'].'
                                </span>  
                                <p>
                                    test message, replace later
                                </p>
                            </div>
                            </div>
                            <div class="status-dot">
                                <i class="fas fa-circle">
                                </i>
                            </div>
                        </a> ';
        }

    }

    echo $output;

?>