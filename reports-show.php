<?php
             session_start();
                include_once "config.php";
               $em= $_SESSION["email"];
              $re=$_POST['user_id'];
              // Get images from the database
              $query = "SELECT * FROM documents WHERE sender='$em' AND receiver='$re' OR sender='$re' AND receiver='$em'  ORDER BY doc_id DESC";
              $res=mysqli_query($conn,$query);
              if(mysqli_num_rows($res)>0){
                  while($row = mysqli_fetch_assoc($res)){
                      $imageURL = 'docs/'.$row["filename"];
              ?>
                  <img src="<?php echo $imageURL; ?>"class="materialboxed" width="150" alt="" />
              <?php }
              }else{ ?>
                  <p>No documents yet...</p>
              <?php } ?>