<?php
    while($row = mysqli_fetch_assoc($query)){
        $sql5 = "SELECT * FROM message_info WHERE (in_email = '{$row['pat_email']}'
                OR out_email = '{$row['pat_email']}') AND (out_email = '{$outgoing_id}' 
                OR in_email = '{$outgoing_id}') ORDER BY msg_id DESC LIMIT 1";
        $query2 = mysqli_query($conn, $sql5);
        $row2 = mysqli_fetch_assoc($query2);
        (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message available";
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
        if(isset($row2['out_email'])){
            ($outgoing_id == $row2['out_email']) ? $you = "You: " : $you = "";
        }else{
            $you = "";
        }
        ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";
        ($outgoing_id == $row['unique_id']) ? $hid_me = "hide" : $hid_me = "";

        $output .= '<a href="chat.php?user_id='. $outgoing_id .'">
                    <div class="content">
                    <div class="details white">
                        <span>'. $row['fname']. " " . $row['lname'] .'</span>
                        <p class="body-content-small">'. $you . $msg .'</p>
                    </div>
                    </div>
                    <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                </a>';
    }
?>