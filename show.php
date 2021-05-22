<?php
    include('config.php'); 
    session_start(); 
      $sql1="select * from doctorinfo where field='".$_GET['field']."'";
      $result=mysqli_query($conn,$sql1);?>
       <option value="" selected>select doctor:</option>
   <?php
      while($row6=mysqli_fetch_assoc($result)){?>
        <option value="<?php echo $row6['doc_email'];?>"><?php echo $row6['fname'];?>  <?php echo $row6['lname'];?></option>
     <?php }
?>    
