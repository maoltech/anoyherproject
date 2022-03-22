<?php
    while($row = mysqli_fetch_assoc($sql)){
    $sql1 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
                OR outgoing_msg_id = {$row['unique_id']} ) AND (outgoing_msg_id = {$outgoing_id}
                OR outgoing_msg_id = {$outgoing_id} ) ORDER BY msg_id DESC limit 1";
    $stmt1 = mysqli_query($con, $sql1);
    $row1 =mysqli_fetch_assoc($stmt1);
    if (mysqli_num_rows($stmt1)>0){
        $result = $row1['msg'];
        }else{
            $result = "No message available";
        }
        (strlen($result)>28)?$msg=substr($result, 0, 28).'...' : $msg = $result;

        ($row['status'] == "offline now") ? $offline = "offline" : $offline = "";
    $output .=   '<a href="chat.php?user_id='.$row['unique_id'].'">
            <div class="content">
                <img src="php/images/'.$row['image'].'" alt="">
            <div class="details">
                <span>
                '.$row['fname']." ".$row['lname'].'
                </span>  
                <p>
                    '.$msg.'
                </p>
            </div>
            </div>
            <div class="status-dot'.$offline.'">
                <i class="fas fa-circle">
                </i>
            </div>
            </a> ';
    }
?>