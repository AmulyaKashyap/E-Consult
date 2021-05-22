<?php
include('config.php'); 
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <!--jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
    $('select').formSelect();
});
function show_doc(str){
    console.log("hi");
   $.ajax({
       type: "GET",
       url: "show.php",
       data: {field:str},    
       success: function(response){
         $('#doc_list').html(response);
       }
   });
}
  
   </script>


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
        <a href="index.html" class="brand-logo">E-Consult</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="patient.php">Dashboard</a></li>
          <li><a href="appointments_pat.php">Sessions</a></li>
          <li><a href="#" ><?php
  $em=$_SESSION["email"];
   $sql = "select fname from patientinfo where pat_email = '$em'";  
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
      <li><a href="patient.php">Dashboard</a></li>
      <li><a href="appointments_pat.php">Sessions</a></li>
      <li><a href="#" ><?php
  $em=$_SESSION["email"];
   $sql = "select fname from patientinfo where pat_email = '$em'";  
   $rs=mysqli_query($conn, $sql);
   while($row=mysqli_fetch_row($rs)){
     echo "$row[0]";
   }
    ?><i class="material-icons left">person</i></a></li><!--id-->
      <li><a href="#" onclick="logout();">LogOut<i class="material-icons left">person</i></a></li> </ul>
  </section>
  <br>
<span class="subheading center"><i class="material-icons down">person</i>Book Appointment</span>
<hr>
<!--body content-->
<div class="book-appointment">
<div class="container">
  
<form action="book.php" class="book-apt" method="POST" >
     <input  id="pat_email" name="pat_email" type="text"  value= "<?php echo $_SESSION["email"]; ?>" hidden/>
    
    <p  style="font-size: 1.6vw; center">Please fill in this form to book an appointment.</p>
   <div class="row">
    <div class="input-field col s10">
    <select name="field" onchange="show_doc(this.value);">
      <option value="" disabled selected>Choose field:</option>
      <?php     
      $sql1="select distinct field from doctorinfo";
      $result=mysqli_query($conn,$sql1);
      while($row=mysqli_fetch_assoc($result)){
      echo "<option value='".$row['field']."'>".$row['field']."</option>";
      }?>
    </select>
    <label>Select Field:</label></div>
    </div>
    <label for="docs">Select Doctor:</label>
  <div class="input-field"> 
    <select name="doc_email" id="doc_list" class="browser-default">  
    <option value="" selected>First select field</option>
    </select>
    
     </div>

<!---DATE SELECTION-->
    <div class="row">
    <input type="text" class="datepicker" name="ap_date" > 
    <label for="date">Choose date of appointment</label>
</div>
<div class="row" >
<input type="text" class="timepicker" name="ap_time">
<label for="time" >Select time: </label>
</div>
 <button class="btn waves-effect waves-light col s4 offset-s2" type="submit">BOOK</button>
      </div>
    </div>
  </form>
</div>
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
