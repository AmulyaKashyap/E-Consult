<?php
    session_start();
    include_once "config.php";

    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpass']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $age = $_POST['age'];
    $phone=$_POST['phone'];

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password) && !empty($gender)){
        if($password != $cpassword){
            echo "Your password is not same";
        }
        else{
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $sql = mysqli_query($conn, "SELECT * FROM doctorinfo d, patientinfo p WHERE doc_email = '{$email}' OR pat_email='{$email}'");
            if(mysqli_num_rows($sql) > 0){
                echo "$email - This email already exist!";
            }else{
                                $ran_id = rand(time(), 100000000);
                                $status = "Active now";
                                $insert_query = mysqli_query($conn, "INSERT INTO patientinfo(patient_id, fname, lname, password,gender, status,phone,pat_email,age)
                                VALUES ($ran_id, '$fname','$lname', '$password', '$gender','$status','$phone','$email',$age)");
                                if($insert_query){
                                        echo "success";
                                        header("location:index.php");
            
                                }else{
                                    echo "<p>Something went wrong. Please try again!</p>";
                                }
            }
        }
        else{
            echo "$email is not a valid email!";
        }
    }
}
else{
        echo "All input fields are required!";
    }
?>