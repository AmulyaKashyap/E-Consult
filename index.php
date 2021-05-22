<?php 
  session_start();
  include_once "config.php";
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

<body class="body-content" >
 

<!--Sign up option pop-up-->
  <section class="signupModal">
    <div class="modal" id="modalSign">
      <div class="modal-content">
        <h4 id="info-modal-heading">Sign-Up Options: </h4>
        <p id="info-modal-content"> ................</p>      
        <div class="row">
        <div class="col s6 l6"><a href="#" onclick="toggleModal_doctor();" >As a doctor<i class="material-icons left">person</i></a></div> 
        <div class="col s6 l6"><a href="#" onclick="toggleModal_patient();" >As a patient<i class="material-icons left">person</i></a></div>     
      </div>
      </div>
        <div class="modal-footer">
          <a href="#" class="modal-close waves-effect btn-flat">close</a>
        </div>
    </div>
  </section>

  <!--Sign-UP Doctor Form  :post:signupDoc.php-->
  <div id="asdoc" class="modal">
    <a href="#" class="modal-close waves-effect btn-flat"><i class="material-icons">close</i></a>
    <form class="modal-content" action="signupDoc.php" method="POST" >
      <div class="container">
        <h3 class="subheading"><u>Sign Up as a Doctor</u></h3>
        <p style="font-size: 1.6vw;">Please fill in this form to create an account.</p>
        <div class="row">
          <div class="input-field col s6">
            <i class="material-icons prefix">account_circle</i>
            <input placeholder="First name" id="first_name" name="fname" type="text" class="validate" required>
          <label for="first_name">First Name</label>
          </div>
          <div class="input-field col s6">
            <i class="material-icons prefix">account_circle</i>
            <input placeholder="Last name" id="last_name" name="lname" type="text" class="validate" >
          <label for="first_name">Last Name</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <i class="material-icons prefix">email</i>
            <input placeholder="Placeholder" id="email" name="email" type="email" required class="validate">
            <label for="first_name">Email id:</label>
          </div>
          <div class="input-field col s6">
            <i class="material-icons prefix">phone</i>
            <input placeholder="Placeholder" id="phone" name="phone" type="tel" required class="validate">
          <label for="first_name">Phone no.:</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <i class="material-icons prefix">lock</i>
            <input placeholder="**********" id="password" name="pass" type="password" required class="validate">
            <label for="first_name">Password:</label>
          </div>
          <div class="input-field col s6">
            <i class="material-icons prefix">lock</i>
            <input placeholder="***********" id="cpassword" name="cpass" type="password" required class="validate">
          <label for="first_name">Confirm Password:</label>
          </div>
        </div>
        <div class="row">
          <input placeholder="Qualification" id="quali" name="quali" type="text" class="validate" >
        <label for="first_name">Qualification</label>
        </div>
      <div class="row ">
        <div class="input-field col s12">
        <i class="material-icons prefix">dehaze</i>
        <select id="field" name="field">
          <option value="" disabled selected>Choose your field</option>
          <option value="cardiology">Cardiology</option>
          <option value="Eyecare">Eye care</option>
          <option value="Dental">Dental care</option>
          <option value="Pediatrics">Pediatrics</option>
          <option value="Hepatology">Hepatology</option>
          <option value="Neurology">Neurology</option>
        </select>
        <label for="field">Select your fied -Depatment</label>
      </div>
      </div>
        <p style="font-size: 1.6vw;">By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
        <div class="clearfix row">
        <button type="button" onclick="document.getElementById('asdoc').style.display='none'" class=" offset-s2 col s4 btn waves-effect waves-light">Clear</button>
        <button class="btn waves-effect waves-light col s4 offset-s2" type="submit">Sign Up</button>
        </div>
      </div>
    </form>
  </div>
<!--SignUP Patient-->
<div id="aspat" class="modal">
  <a href="#" class="modal-close waves-effect btn-flat"><i class="material-icons">close</i></a>
  <form class="modal-content" action="signupPat.php" method="POST" >
    <div class="container">
      <h3 class="subheading"><u>Sign Up as a Patient</u></h3>
      <p style="font-size: 1.6vw;">Please fill in this form to create an account.</p>
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input placeholder="First name" id="first_name" name="fname" type="text" class="validate" required>
        <label for="first_name">First Name</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input placeholder="Last name" id="last_name" name="lname" type="text" class="validate" >
        <label for="first_name">Last Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">email</i>
          <input placeholder="Placeholder" id="email" name="email" type="email" required class="validate">
          <label for="first_name">Email id:</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">phone</i>
          <input placeholder="Placeholder" id="phone" name="phone" type="tel" required class="validate">
        <label for="first_name">Phone no.:</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">lock</i>
          <input placeholder="**********" id="password" name="pass" type="password" required class="validate">
          <label for="first_name">Password:</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">lock</i>
          <input placeholder="***********" id="cpassword" name="cpass" type="password" required class="validate">
        <label for="first_name">Confirm Password:</label>
        </div>
      </div>
      <div class="row">
        <label class="col s4">
          <input class="with-gap" name="gender" value="male" type="radio"  />
          <span>Male</span>
        </label>
        <label class="col s4">
          <input class="with-gap" name="gender" value="female" type="radio" />
          <span>Female</span>
        </label>
        <label class="col s4">
          <input class="with-gap" name="gender" value="others" type="radio"  />
          <span>Others</span>
        </label>
      </div>
    <div class="row ">
      <div class="input-field col s12">
        <input placeholder="age" id="age" name="age" type="text" >
      <label for="field">Age</label>
    </div>
    </div>
      <p style="font-size: 1.6vw;">By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
      <div class="clearfix row">
      <button type="button" onclick="document.getElementById('asdoc').style.display='none'" class=" offset-s2 col s4 btn waves-effect waves-light">Clear</button>
      <button class="btn waves-effect waves-light col s4 offset-s2" type="submit">Sign Up</button>
      </div>
    </div>
  </form>
</div>




<!--Login form-->
<section class="LoginModal">
    <div class="modal" id="loginF" style="width: 36vw;">
        <form class="modal-content" action="login.php" method="POST" >
          <div class="container">
            <h3 class="subheading"><u>Login</u></h3>
            <hr>
            <div class="row">
              <div class="input-field col s12">
                <i class="material-icons prefix">email</i>
                <input placeholder="Placeholder" id="email" name="email" type="email" required class="validate">
                <label for="first_name">Email id:</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <i class="material-icons prefix">lock</i>
                <input placeholder="**********" id="password" name="pass" type="password" required class="validate">
                <label for="first_name">Password:</label>
              </div>
            </div>    
        <div class="modal-footer">
          <a href="#" class="modal-close waves-effect btn-flat">close</a>
          <button class="btn waves-effect waves-light col s4 offset-s2" type="submit">Log In</button>
        </div>
    </div>
  </section>






  <!--parallex-->
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
        <li><a href="#departments">Departments</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#doctors">Doctors</a></li>
        <!-- Dropdown Trigger -->
        <li><a href="#" onclick="toggleModal_signup();" >Sign-Up<i class="material-icons left">person</i></a></li>
        <li><a href="#" onclick="toggleModal_login();">Login</a></li>
    </ul>
    </div>
  </nav>
  </div>
  <ul class="sidenav" id="mobile-demo">
    <li class="active"><a href="#about" >About  </a></li>
    <li><a href="#doctors">Doctors  </a></li>
    <li><a href="#departments">Departments  </a></li>
    <li><a href="#" onclick="toggleModal_signup();">Sign-Up<i class="material-icons left">person</i></a></li>
    <li><a href="#" onclick="toggleModal_login();">Login<i class="material-icons left">person</i></a></li>
  </ul>
</section>

<br><br>
<div class=" container "><div class="content-header">Welcome to E-Consult</div>
Online Consultancy -Consult your prefferd doctor right at your home. <br>No need to step out in this pandemic as well..
<br><a onclick="toggleModal_login();" class="waves-effect waves-light btn "><i class="material-icons right">person</i>LOG IN</a>
</div>

  <div class="parallax"><img src="images/doctor-iStock-949812160_2.jpg"></div>
</div>
</section>
<br>


<section class="section scrollspy white" id="about">
  <div class="section">
    <div class="row ">
      <div class="col s8 l8 offset-s4 offset-l4 subheading" >
      E-Consult -Get doctors consult at your home<br>
      </div>
    </div>
    <br>
    <div class="row left-align">
      <div class="col center l5 s6">
        <div class="slider">
        <ul class="slides">
          <li><img src="images/doctorPotrait.jpg" alt="docImage"  ></a> </li>   
          <li><img src="images/477f75c.jpg" alt="docImage"></a></li>
        </ul>
        </div>
        </div>
      <div class="col center l7 s6">

        <div class="container" style="font-size:1.2vw;">At Fortis Healthcare, our utmost priority is to ensure safety and well being of our patients.<br> To avoid adverse health conditions later, Fortis came up with online video/tele consultations for people who couldn't reach the hospital. At this time, it is even more essential to get an experts consultation to keep ourselves healthy. Taking precautions is always the right choice not only for you but also for your family members.<br>At Fortis Healthcare, our utmost priority is to ensure safety and well being of our patients.<br> To avoid adverse health conditions later, Fortis came up with online video/tele consultations for people who couldn't reach the hospital. At this time, it is even more essential to get an experts consultation to keep ourselves healthy. <br>Taking precautions is always the right choice not only for you but also for your family members.
        </div></div>
    </div>
  </div>
</section>
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

<!--Departments section-->
<section class="departments scrollspy white" id="departments">
  <div class="row">
  <div class="subheading col offset-s5 offset-l5">Departments</div>
  </div>
  <div class="row">
    <div class="col s12">
      <ul class="tabs swipeable=true">
        <li class="tab"><a  class="active" href="#cardiology">Cardiology</a></li>
        <li class="tab"><a href="#eye">Eye</a></li>
        <li class="tab"><a href="#dental">Dental</a></li>
        <li class="tab"><a  href="#neuro">Neurology</a></li>
        <li class="tab"><a href="#pedia">Pediatrics</a></li>
        <li class="tab"><a href="#hepath">Hepatology</a></li>
      </ul>
    </div>
    
    <div id="cardiology" class="row">
      <div class="col offset-s1 s7 "><br><u class="subheading-two">Cardiology</u><br><br>Cardiology is a branch of internal medicine. A cardiologist is not the same as a cardiac surgeon. A cardiac surgeon opens the chest and performs heart surgery.
        <br>
        A cardiologist specializes in diagnosing and treating diseases of the cardiovascular system. The cardiologist will carry out tests, and they may perform some procedures, such as heart catheterizations, angioplasty, or inserting a pacemaker.
        <br>
        Heart disease relates specifically to the heart, while cardiovascular disease affects the heart, the blood vessels, or both.  <br>
        </div>
        <div class="col s4"><img src="images/cardiology.jpg" class="circle responsive-img" alt="cardiology"></div>
    </div>
    <div id="eye" class="row">
      <div class="col offset-s1 s7 "><br><u class="subheading-two">Eye Care</u><br><br>Cardiology is a branch of internal medicine. A cardiologist is not the same as a cardiac surgeon. A cardiac surgeon opens the chest and performs heart surgery.
        <br>
        A cardiologist specializes in diagnosing and treating diseases of the cardiovascular system. The cardiologist will carry out tests, and they may perform some procedures, such as heart catheterizations, angioplasty, or inserting a pacemaker.
        <br>
        Heart disease relates specifically to the heart, while cardiovascular disease affects the heart, the blood vessels, or both.  <br>
        </div>
        <div class="col s4"><img src="images/eye.jpg" class="circle responsive-img" alt="cardiology"></div>
    </div>
    <div id="neuro" class="row">
      <div class="col offset-s1 s7 "><br><u class="subheading-two">Neurology</u><br><br>Cardiology is a branch of internal medicine. A cardiologist is not the same as a cardiac surgeon. A cardiac surgeon opens the chest and performs heart surgery.
        <br>
        A cardiologist specializes in diagnosing and treating diseases of the cardiovascular system. The cardiologist will carry out tests, and they may perform some procedures, such as heart catheterizations, angioplasty, or inserting a pacemaker.
        <br>
        Heart disease relates specifically to the heart, while cardiovascular disease affects the heart, the blood vessels, or both.  <br>
        </div>
        <div class="col s4"><img src="images/neuro.jpg" class="circle responsive-img" alt="cardiology"></div>
    </div>
    <div id="pedia" class="row">
      <div class="col offset-s1 s7 "><br><u class="subheading-two">Pediatrics</u><br><br>Cardiology is a branch of internal medicine. A cardiologist is not the same as a cardiac surgeon. A cardiac surgeon opens the chest and performs heart surgery.
        <br>
        A cardiologist specializes in diagnosing and treating diseases of the cardiovascular system. The cardiologist will carry out tests, and they may perform some procedures, such as heart catheterizations, angioplasty, or inserting a pacemaker.
        <br>
        Heart disease relates specifically to the heart, while cardiovascular disease affects the heart, the blood vessels, or both.  <br>
        </div>
        <div class="col s4"><img src="images/pedia.jpg" class="circle responsive-img" alt="cardiology"></div>
    </div>
    <div id="hepath" class="row">
      <div class="col offset-s1 s7"><br><u class="subheading-two">Hepatology</u><br><br>Cardiology is a branch of internal medicine. A cardiologist is not the same as a cardiac surgeon. A cardiac surgeon opens the chest and performs heart surgery.
        <br>
        A cardiologist specializes in diagnosing and treating diseases of the cardiovascular system. The cardiologist will carry out tests, and they may perform some procedures, such as heart catheterizations, angioplasty, or inserting a pacemaker.
        <br>
        Heart disease relates specifically to the heart, while cardiovascular disease affects the heart, the blood vessels, or both.  <br>
        </div>
        <div class="col s4"><img src="images/hepathology.jpg" class="circle responsive-img" alt="cardiology"></div>
    </div>
    <div id="dental" class="row">
      <div class="col offset-s1 s7 "><br><u class="subheading-two">Dental Care</u><br><br>Cardiology is a branch of internal medicine. A cardiologist is not the same as a cardiac surgeon. A cardiac surgeon opens the chest and performs heart surgery.
        <br>
        A cardiologist specializes in diagnosing and treating diseases of the cardiovascular system. The cardiologist will carry out tests, and they may perform some procedures, such as heart catheterizations, angioplasty, or inserting a pacemaker.
        <br>
        Heart disease relates specifically to the heart, while cardiovascular disease affects the heart, the blood vessels, or both.  <br>
        </div>
        <div class="col s4"><img src="images/dent.jpg" class="circle responsive-img" alt="cardiology"></div>
    </div>
  </div>
</section>


<!--Doctor section-->
<br>

<section class="fdoctors white" id="doctors">
  <br>
    <h3 class="subheading center">Doctors Available</h3>
    <p class="center">We have a great numbers of doctors attached with our application. Some big names among them are :</p>
    <div class="carousel doctors" style="margin-bottom: 30px;">
        
      <?php
        $sq="select * from doctorinfo";
        $res=mysqli_query($conn, $sq);
        while($row=mysqli_fetch_assoc($res)){
        echo '<a href="" class="carousel-item">
          <div class="row">
            <div class="col s12">
              <div class="card-panel" style="background-color:#012E55 !important;">
                <img src="images/doc1.png" class="circle responsive-img" alt="">
                <span class="white-text" style="font-size:1vw;">'.$row['fname'].' '.$row['lname'].'</span>
                <p class="grey-text" style="font-size: x-small;">'.$row['field'].'<br>'.$row['qualification'].'<br>'.$row['phone'].'<br>'.$row['doc_email'].'</p>
              </div>
            </div>
          </div>
        </a>';}?>
    </div>
    <p class="center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit minima eos vel architecto praesentium, nulla est deserunt ducimus quos illum suscipit blanditiis adipisci, quasi magnam aspernatur reprehenderit possimus consequuntur excepturi?</p>
</section>

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
      
</html>