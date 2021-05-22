<?php      
    include('config.php'); 
    session_start(); 
    $email = $_POST['email'];  
    $password = $_POST['pass'];  
      
        //to prevent from mysqli injection  
        $email = stripcslashes($email);  
        $password = stripcslashes($password);  
        $email = mysqli_real_escape_string($conn, $email);  
        $password = mysqli_real_escape_string($conn, $password);  
      
        $sql = "select *from doctorinfo where doc_email = '$email' and password = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        if($count == 1)
        {
            $_SESSION["email"] = $email;
            $_SESSION["password"] =  $password;
         header("Location: http://localhost/project/doctor.php");
         exit; 
        }  
        else{  
            $sql = "select *from patientinfo where pat_email = '$email' and password = '$password'";  
            $result = mysqli_query($conn, $sql);  
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result);  
            if($count == 1)
            {
                $_SESSION["email"] = $email;
                $_SESSION["password"] =  $password;
             header("Location: http://localhost/project/patient.php");
             exit; }
             else{
                echo "You have entered a wrong email or password";
            }
             
        }   
        

?> 