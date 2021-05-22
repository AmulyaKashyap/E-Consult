<?php
                 session_start();
                 include_once "config.php";
                 if(!isset($_SESSION['email'])){
                   header("location: login.php");
                 }

                   $em=$_SESSION["email"];
                   $s1 = "SELECT * FROM doctorinfo d, patientinfo p WHERE doc_email = '{$em}' OR pat_email='{$em}'";  
                   $rs=mysqli_query($conn, $s1);
                   if(mysqli_num_rows($rs) > 0){
                    $rowME = mysqli_fetch_assoc($rs);
                  }
                  $outgoing_id = $em;
                  $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
                    $output = "";
                  $sql = "SELECT * FROM message_info 
                          WHERE (out_email = '$outgoing_id' AND in_email = '$incoming_id')
                          OR (out_email = '$incoming_id' AND in_email = '$outgoing_id') ORDER BY message_id";
                  $query = mysqli_query($conn, $sql);
                  if(mysqli_num_rows($query) > 0){
                      while($row = mysqli_fetch_assoc($query)){
                          if($row['out_email'] === $outgoing_id){
                              $output .= '<div class="chat-outgoing right">
                                          <div class="details">
                                             '. $row['msg'] .'
                                          
                                          </div>
                                          </div>
                                          <br>
                                          <br>';
                          }else{
                              $output .= '<div class="chat-incoming left ">
                                          <div class="details">
                                              '. $row['msg'] .'
                                          </div>
                                          </div>
                                          <br>
                                          <br>';
                          }
                      }
                  }else{
                      $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
                  }
                  echo $output;
              
?>


