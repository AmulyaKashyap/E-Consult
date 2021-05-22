<?php
session_start();
include_once "config.php";
  $msg = "";
 $sender=$_POST['sender'];
 $rec=$_POST['rec'];
  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
 
    $filename = $_FILES["file"]["name"];
    $tempname = $_FILES["file"]["tmp_name"];   
        $folder = "docs/".$filename;
         
        // Get all the submitted data from the form
        $sql = "INSERT INTO documents (sender,receiver,filename) VALUES ('$sender','$rec','$filename')";
 
        // Execute query
        mysqli_query($conn, $sql);
         
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
            header("location: chat.php?user_id=$rec");
        }else{
            $msg = "Failed to upload image";
      }
  }
  $result = mysqli_query($conn, "SELECT * FROM documents");
?>