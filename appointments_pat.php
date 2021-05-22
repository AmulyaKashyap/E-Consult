<?php 
  session_start();
  include_once "config.php";
  if(!isset($_SESSION['email'])){
    header("location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!--jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--cdn of materalize css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<meta charset="UTF -8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>
Econsult -online consultancy
</title>
<!--fonts-->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Goblin+One&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
<!--icons-->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!--custom css-->
<link rel="stylesheet" href="css/style.css"/>
</head>

<body class="body-content" style="background-image: url('images/appointment-page.jpg');background-position:right; background-repeat: no-repeat;background-attachment: fixed;  background-size: cover;" >

  <!--Navbar-->
  <section class="fnavbar">
  
    <div class="navbar-fixed">
    <nav>
      <div class="nav-wrapper">
        <img src="images/docConsult.png" width="70" height="50">
        <a href="index.php" class="brand-logo">E-Consult</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="patient.php">Dashboard</a></li>
          <li><a href="appointments.php">Book Appointment</a></li>
          <li><a href="#"><?php
  $em=$_SESSION["email"];
   $sql = "select fname from doctorinfo where doc_email = '$em'";  
   $rs=mysqli_query($conn, $sql);
   while($row=mysqli_fetch_row($rs)){
     echo "$row[0]";
   }
    ?></a></li>
        <li><a href="#" onclick="logout();">LogOut<i class="material-icons left">person</i></a></li>
      </ul>
      </div>
    </nav>
    </div>
    <ul class="sidenav" id="mobile-demo">
      <li><a href="patient.php">Dashboard</a></li>
      <li><a href="appointments.php">Book Appointment</a></li>
      <li><a href="#"><?php
  $em=$_SESSION["email"];
   $sql = "select fname from doctorinfo where doc_email = '$em'";  
   $rs=mysqli_query($conn, $sql);
   while($row=mysqli_fetch_row($rs)){
     echo "$row[0]";
   }
    ?></a></li>
    <li><a href="#" onclick="logout;">LogOut<i class="material-icons left">person</i></a></li>
  </ul>
  </section>

<!--body content-->
<br>
<div>

<div class="container appointment-list">
<p class="subheading">
  Appointments:
</p>  
<hr>
<div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php 
            $sql ="select *from patientinfo where pat_email = '$em'";
            $rs=mysqli_query($conn, $sql);
            $rows=mysqli_num_rows($rs);
            if($rows){
              $row = mysqli_fetch_assoc($rs);
            }
            else{
              echo "error";
            }
          ?>
          <div class="details ">
            <span class="col s6 offset-s1"><i class="material-icons down">person</i><?php echo $row['fname']. " " . $row['lname'] ?></span>  
          <hr>
        </div>
      </header>
      <hr>
<!--list of appointments-->  
      <div class="users-list">
                  <?php
            $outgoing_id = $em;
            $sql3 = "SELECT * FROM appointment_info WHERE  pat_email = '{$outgoing_id}' ORDER BY ap_date";
            $query = mysqli_query($conn, $sql3);
            $output = "";
            if(mysqli_num_rows($query) == 0){
                $output .= "No appointment today";
            }elseif(mysqli_num_rows($query) > 0){
                          while($row = mysqli_fetch_assoc($query)){
                            $incoming=$row['doc_email'];
                            $sql5 = "SELECT * FROM message_info WHERE (in_email = '{$incoming}'
                                    OR out_email = '{$incoming}') AND (out_email = '{$outgoing_id}' 
                                    OR in_email = '{$outgoing_id}') ORDER BY message_id DESC LIMIT 1";
                            $query2 = mysqli_query($conn, $sql5);
                            $row2 = mysqli_fetch_assoc($query2);
                            (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message available";
                            (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
                            if(isset($row2['out_email'])){
                                ($outgoing_id == $row2['out_email']) ? $you = "You: " : $you = "";
                            }else{
                                $you = "";
                            }
                            $sql4 = "SELECT * FROM doctorinfo WHERE doc_email = '$incoming' ";
                            $qe=mysqli_query($conn,$sql4);
                            $r=mysqli_fetch_assoc($qe);
                          
                            $output .= '<a href="chat.php?user_id='. $r['doc_email'] .'">
                                        <div class="content">
                                        <div class="details white ">
                                            <div class="row">
                                            <span class="col s8">'. $r['fname']. " " . $r['lname'] .'</span>
                                            <span class="body-content-small col s4">'.$row['ap_date']." <br>".$row['ap_time'].' </span>
                                            </div>
                                            <p class="body-content-small">'. $you . $msg .'</p>
                                        </div>
                                        </div>
                                        
                                    </a>';
                        } 
            }
            echo $output;
        ?>
      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script> 

</div>
</div>






<!--Footer-->
<br>
<br>
<section class="ffooter">
  <footer class="footer-one">
      <div class="conatiner">
          <div class="row">
              <div class="col l5 s11 offset-l1">
                  <h4 class="white-text subheading-two">Contact Us</h4>
                  <p class="grey-text">
                      <i class="material-icons left">location_on</i> ABC 222, UP, India
                  </p>
                  <p class="grey-text">
                      <i class="material-icons left">local_phone</i>+918297816000q
                      <br>5123 341411
                  </p>
                  <p class="grey-text">
                      <i class="material-icons left">email</i>xyz@gmail.com
                  </p>
              </div>
              <div class="col l6 s12">
                  <h4 class="white-text subheading-two">Social Media</h4>
                  <p>
                      <a href="#" class="grey-text"><i class="material-icons left">facebook</i>Facebook</a><br>
                  </p>
                  <p>
                      <a href="#" class="grey-text"><i class="material-icons left">cloud</i>Twitter</a><br>
                  </p>
                  <p> 
                      <a href="#" class="grey-text"><i class="material-icons left">photo_camera</i>Instagram</a>
                  </p>
              </div>
          </div>
          <div class="row footer-two">
              <div class="col l6 s12">
                  <p class="white-text">
                      &copy; E-Consult
                  </p>
              </div>
              <div class="col l6 s12">
                  <p class="white-text">
                      Designed by: Pseudo-Boom Team (Amulya & Madhuri)
                  </p>
              </div>
          </div>
      </div>
  </footer>
</section>

  </body>
  <!--custom js-->
<script src="javascript/loader.js"></script>
<!--M script-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> 
<script src="javascript/users.js"></script>
<script>
  function logout(){
    if(confirm("Do you want to log out ?")){
    location.replace("http://localhost/project/")
    }
   }
  </script>

  </html>