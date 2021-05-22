<?php      
    include('config.php'); 
    session_start(); 
    $doc_email = $_POST['doc_email'];  
    $pat_email = $_POST['pat_email'];  
    $date=$_POST['ap_date'];
    $time=$_POST['ap_time'];  
        //to prevent from mysqli injection  
        $doc_email = stripcslashes($doc_email);  
        $pat_email = stripcslashes($pat_email);  ;  
        $doc_email = mysqli_real_escape_string($conn, $doc_email);  
        $pat_email = mysqli_real_escape_string($conn, $pat_email);  
        if(!empty($doc_email) && !empty($date) && !empty($pat_email) && !empty($time))
        {
            if(filter_var($doc_email, FILTER_VALIDATE_EMAIL)&&filter_var($pat_email, FILTER_VALIDATE_EMAIL)){
                $sel="select * FROM appointment_info WHERE (pat_email='$pat_email' && doc_email='$doc_email')";
                $res=mysqli_query($conn,$sel);
                $row=mysqli_num_rows($res);
                if($row>0){
                    
                    $S="UPDATE appointment_info SET ap_date = '$date', ap_time = '$time' WHERE (pat_email='$pat_email' && doc_email='$doc_email')" ;
                    $insert_query=mysqli_query($conn,$S);

                }
                else{
            $insert_query = mysqli_query($conn, "INSERT INTO appointment_info(pat_email,doc_email,ap_date,ap_time)         
                               VALUES ('$pat_email', '$doc_email','$date','$time')");
                                   } 
                        if($insert_query){
                                            echo "success";
                                            header("location: appointments_pat.php");
                
                             }else{
                                        echo "<p>Something went wrong. Please try again!</p>";
                            }            
                                }
                                    else{
                echo "$email is not a valid email!";
            }
        }
    else{
            echo "All input fields are required!";
        }
?> 