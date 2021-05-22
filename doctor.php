<?php
include('config.php'); 
session_start();
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

<body class="body-content">

  <section class="fparallax">
    <div class="parallax-container">
    <!--NAVIGATION-->
  <section class="fnavbar">
    <div class="navbar-fixed">
    <nav>
      <div class="nav-wrapper">
        <img src="images/docConsult.png" width="70" height="50">
        <a href="index.php" class="brand-logo">E-Consult</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="appointment_doc.php">Appointments</a></li>
          <li><a href="#">Sessions</a></li>
          <li><a href="#" ><?php
  $em=$_SESSION["email"];
   $sql = "select fname from doctorinfo where doc_email = '$em'";  
   $rs=mysqli_query($conn, $sql);
   while($row=mysqli_fetch_row($rs)){
     echo "$row[0]";
   }
    ?><i class="material-icons left">person</i></a></li><!--id-->
          <li><a href="#" onclick="logout();">LogOut<i class="material-icons left">person</i></a></li>
      </ul>
      </div>
    </nav>
    </div>
    <ul class="sidenav" id="mobile-demo">
      <li><a href="appointment_doc.php">Appointments</a></li>
      <li><a href="#">Sessions</a></li>
      <li><a href="#" ><?php
  $em=$_SESSION["email"];
   $sql = "select fname from doctorinfo where doc_email = '$em'";  
   $rs=mysqli_query($conn, $sql);
   while($row=mysqli_fetch_row($rs)){
     echo "$row[0]";
   }
    ?><i class="material-icons left">person</i></a></li><!--id-->
      <li><a href="#" onclick="logout();">LogOut<i class="material-icons left">person</i></a></li> </ul>
  </section>
  
  <br><br>
  <div class="row">
  <div class="col offset-s6 "><div class="content-header">Hello Doctor <?php
  $em=$_SESSION["email"];
   $sql = "select fname from doctorinfo where doc_email = '$em'";  
   $rs=mysqli_query($conn, $sql);
   while($row=mysqli_fetch_row($rs)){
     echo "$row[0]";
   }
    ?>!</div>
  Online Consultancy -Treat your customers right from your home. <br>No need to step out in this pandemic as well..
  <br><br><a href="appointment_doc.php" class="waves-effect waves-light btn "style="width:40vw;"><i class="material-icons right">person</i>Appointments Today</a>
  </div></div>
    <div class="parallax"><img src="images/doctor-dashboard.jpg"></div>
  </div>
  </section>

<!--body content-->
<div class="today">
  Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum quasi distinctio, eaque nemo eligendi ipsa quae velit enim fuga nostrum facilis suscipit facere accusamus officia voluptatibus quibusdam quo dolore dignissimos numquam sint voluptatum? Consequatur fugiat eos, quisquam aspernatur praesentium neque veritatis reprehenderit eligendi consequuntur dolore debitis ex, eaque dolorum, aut amet tenetur perspiciatis molestiae unde magni excepturi necessitatibus sunt sed explicabo? Error vel facilis qui eos quisquam voluptas facere magni distinctio quaerat autem, harum doloremque nobis accusantium possimus quia aperiam dolores deserunt minus ea corporis dolor eius beatae perspiciatis ipsam? Magnam beatae repellendus dolor officiis numquam unde. Minus doloremque dolorum voluptate amet totam numquam quae voluptates illum! Consectetur quam totam facere aut sed corrupti aspernatur quod commodi impedit unde aliquid nisi, architecto doloremque distinctio assumenda, dolorum corporis cum obcaecati provident? Neque nulla officiis quaerat hic amet eligendi necessitatibus, iste ex expedita quis numquam nemo suscipit eos dolores architecto voluptatum laudantium aliquam dolore itaque facilis nostrum? Quae doloribus nam, blanditiis ipsa veritatis corrupti sed neque nihil quos fugiat rerum aut! Vel accusamus voluptatum tempore perspiciatis totam. Adipisci perspiciatis molestiae inventore ad odit eligendi repellendus possimus ipsa.
</div>

<br><br>
<!--cards-->
<div class="container row">
  <div class="col s2">
    <div class="card-panel white">
      <span>
        <img src="images/appointment-icon.jpg" class="circle responsive-img" alt="number_of_appointments">
        <!--Number of doctors-->
        <p style="font-size:2vw;" class="center">
         <b><b><?php 
         $s="select  COUNT(appointment_id) from appointment_info";
         $rs=mysqli_query($conn, $s);
         while($row=mysqli_fetch_row($rs)){echo $row[0];}
         ?></b>
        </p>
        <p class="center" style="font-size:1vw;">
          Appointments
        </p>
       </span>
    </div>
  </div>
  <div class="col s2 offset-s2">
    <div class="card-panel white">
      <span>
        <img src="images/departments-icon.png" class="circle responsive-img" alt="number_of_dep">
        <!--Number of doctors-->
        <p style="font-size:2vw;" class="center">
         <b><?php 
         $s="select COUNT(DISTINCT field) from doctorinfo";
         $rs=mysqli_query($conn, $s);
         while($row=mysqli_fetch_row($rs)){echo $row[0];}
         ?></b>
        </p>
        <p class="center" style="font-size:1vw;">
          Departments 
        </p>
       </span>
    </div>
  </div>
  <div class="col s2 offset-s2">
    <div class="card-panel white">
      <span>
        <img src="images/doc-icon.png" class="circle responsive-img" alt="number_of_doc">
        <!--Number of doctors-->
        <p style="font-size:2vw;" class="center">
         <b><?php 
         $s="select  COUNT(doc_email) from doctorinfo";
         $rs=mysqli_query($conn, $s);
         while($row=mysqli_fetch_row($rs)){echo $row[0];}
         ?></b>
        </p>
        <p class="center" style="font-size:1vw;">
          Doctors
        </p>
       </span>
    </div>
  </div>
</div>







  <!--Footer-->
<section class="ffooter">
    <footer class="footer-one">
        <div class="conatiner">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Contact Us</h5>
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
                    <h5 class="white-text">Social Media</h5>
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
<script>
  function logout(){
    if(confirm("Do you want to log out ?")){
    location.replace("http://localhost/project/")

    }
   }
  </script>
  </html>
