<?php 
    session_start();
        include_once "config.php";
        $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);


        if(!empty($message)){
            $sq = "INSERT INTO message_info (in_email, out_email, msg)
            VALUES ('$incoming_id', '$outgoing_id', '$message')";
            $result= mysqli_query($conn,$sq);
        }
        
?>