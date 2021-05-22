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

<body class="body-content" style="background-image: url('images/session-back.jpg');background-position:right; background-repeat: no-repeat;background-attachment: fixed;  background-size: cover;">

<!--navigation-->
<section class="fnavbar">
    <div class="navbar-fixed">
    <nav>
      <div class="nav-wrapper">
        <img src="images/docConsult.png" width="70" height="50">
        <a href="index.html" class="brand-logo">E-Consult</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="appointments.php">Appointments</a></li>   
          <li><button class="btn" onclick="goBack()"><?php
  $em=$_SESSION["email"];
   $sql1 = "SELECT * FROM doctorinfo d, patientinfo p WHERE doc_email = '{$em}' OR pat_email='{$em}'";  
   $rs=mysqli_query($conn, $sql1);
   $row1 = mysqli_fetch_assoc($rs);
     $f=$row1['fname'];
     echo " $f ";
    ?> </button></li><!--id-->
          <li><a href="#" onclick="logout();">LogOut<i class="material-icons left">person</i></a></li>
      </ul>
      </div>
    </nav>
    </div>
    <ul class="sidenav" id="mobile-demo">
      <li><a href="appointments.php">Appointments</a></li>
      <li><button class="btn" onclick="goBack()">
      <?php
  $em=$_SESSION["email"];
   $sql1 = "SELECT * FROM doctorinfo d, patientinfo p WHERE doc_email = '{$em}' OR pat_email='{$em}'";  
   $rs=mysqli_query($conn, $sql1);
   $row1 = mysqli_fetch_assoc($rs);
     $f=$row1['fname'];
     echo " $f ";
    ?>  
      </button></li><!--id-->
      <li><a href="#" onclick="logout();">LogOut<i class="material-icons left">person</i></a></li> </ul>
  </section>


  <br>
  
<!--chatting goes here-->
  <div class="wrapper row container ">
    <section class="chat-area">
      <header class="header body-content">
        <?php 
          $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
          $sql = mysqli_query($conn, "SELECT * FROM doctorinfo d, patientinfo p WHERE doc_email = '{$user_id}' OR pat_email='{$user_id}'");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }
        ?>
        <div class="details">
          <span><b><?php echo $row['fname']. " " . $row['lname'] ?></b></span>
        </div>
      </header>


<!--chat box -->
<div class="col s8">
<div id= "chat-box" class="chat-box "style="overflow-y:scroll; height:25vw;" onload="scroll()">
    
</div>

<!--Send chats-->
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo  $_GET['user_id']; ?>" hidden>
       <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
       <input type="text" class="outgoing_id" name="outgoing_id" value="<?php echo $_SESSION["email"];?>" hidden>
        <button type="submit" name="send"><i class="material-icons">send</i></i></button>
      </form>
    </section>

    <!--document uploading area-->
    <div class="container col s3 offset-s1" >
    <hr>
        <span class="heading"><b>UPLOAD REPORTS HERE: </b></span>
          <div class="conatiner reports" id="reports" style="overflow-y:scroll; height:20vw;">
          
          </div>

        <form method="POST" action="upload.php" enctype="multipart/form-data">
              <input type="text" class="outgoing_id" name="sender" value="<?php echo $_SESSION["email"];?>" hidden>            
              <input type="text" class="incoming_id" name="rec" value="<?php echo  $_GET['user_id']; ?>" hidden>
             <div class="row"> <input class="filename btn col s6"  type="file" name="file"  value="" />
            <div class="col s6">
                <button class="btn" type="submit"
                        name="upload">
                  UPLOAD
                </button>
            </div></div>
        </form>
 
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


<script src="javascript/chat.js"></script>
</body>
  <!--custom js-->
  <script src="javascript/loader.js"></script>
<!--M script-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> 
</html>
