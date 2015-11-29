<?php 

include ("db_connect.php");?>

<?php 

            echo '
          	<form method="post" action="change.php">
              <label class="control-label" >Enter your username<span class="red">&nbsp;*</span></label>
              <div class="controls">
                <input name="username" id="username" type="text" placeholder="Username"/>
              </div>
          		<label class="control-label" >Enter your email<span class="red">&nbsp;*</span></label>
          		<div class="controls">
          			<input name="email" id="email" type="text" placeholder="Email"/>
          		</div>
          </div>
          
         
            <div class="pull-left">
              
           
				<input name="submit"  type="submit" class="btn btn-success" value="&nbsp; Request Reset &nbsp;" />
                
                <span class="registerbox">Not a member yet? &nbsp;<a href="register.php">Sign-up!</a></span>
                </div>
                </fieldset>
				</form>';
          if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];

            $query = mysql_query("SELECT * FROM users WHERE username ='$username'");
            $numrow = mysql_num_rows($query);

            if($numrow!=0){
              while($row = mysql_fetch_assoc($query)){
                $db_email = $row['email'];
              }  
              if($email = $db_email)
              {
                $code = rand(100000, 1000000);

                $to = $db_email;
                $subject ="Password Reset";

                $body= "This is an automated email. Please DO NOT response

                        Click the link below or paste it into your get_browser
                        http://sulley.cah.ucf.edu/psrecovery.php/?code&username=$username"; 

                        mysql_query("UPDATE users SET passreset = '$code' WHERE username='$username'");

                        mail($to,$subject,$body);

                        echo"Check Your Email";
              }else
              {
                echo "Email is incorrect";
              }
            }else{
              echo "That username doesn't exits";
            }
          }
        ?>