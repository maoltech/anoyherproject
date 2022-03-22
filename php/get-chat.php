<?php
session_start();
if(isset($_SESSION['unique_id'])){
    include "config.php";
    $outgoing_id = mysqli_real_escape_string($con, $_POST['outgoing_id']);
    $incoming_id = mysqli_real_escape_string($con, $_POST['incoming_id']);
    $output = "";

    $sql = "SELECT * FROM messages
            LEFT JOIN users ON users.unique_id = messages.incoming_msg_id
            WHERE(outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
            OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id"; 
    $stmt = mysqli_query($con, $sql);
    if(mysqli_num_rows($stmt)>0){
        while($row = mysqli_fetch_assoc($stmt)){
            if($row['outgoing_msg_id'] === $outgoing_id){
                $output .= "<div class='chat outgoing'>
                            <div class='details'>
                                <p>
                                    ".$row['msg']."
                                </p>
                            </div>
                            </div>";
            }else{
                $output .= "<div class='chat incoming'>
                            <img src='php/images/".$row['image']."' alt=''>
                            <div class='details'>
                                <p>
                                    ".$row['msg']." 
                                </p>
                            </div>
                            </div>";
            }
        }
        echo $output;
    }
}else{
    header('../index.php');
}

?>