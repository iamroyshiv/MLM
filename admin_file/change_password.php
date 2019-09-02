<html>
    <head>
	      <style>
		         body
				 {
					 background:;
				 }
		  </style>
		 
		 		 <link href="admin.css" rel="stylesheet" type="text/css">
				  <link href="afterlogin.css" rel="stylesheet" type="text/css">
				  <meta name="viewport" content="width=device-width,initial-scale=1">
	</head>
	
	<body>
	         <?php
			     //include 'connect_db.php';
				 
				  $username="root";
		             $host="localhost";
                     $password="rohitkumar";
                     $database="wallet";
					 
				       $con=mysqli_connect($host,$username,$password,$database)
				        or die("unable to connect database");
						
						
						mysqli_select_db($con,$database)
	                      or die("U to connect database");
			 ?>
	
	           <?php
			                    session_start();
								
								/*if(!isset($_SESSION['cepin']))
								{
									header("Location:login.php");
									exit();
								}*/
								
								$username=$_SESSION['username'];
								
			   ?>
			   
			    <div id="top_bar">
		          <div id="top_bar_item1">
				     <?php $url="after_login_admin.php?username='".$username."'"; 
					                echo "<a href='$url'>";?><img id="dicon" href='$url' src="enterprise.png"><?php echo "</a>";?> 
					 
				  </div>
				  <div id="top_bar_item2">
				          <?php $url="payment_request.php?username='".$username."'"; 
					                 echo "<a href='$url'>";?><img id="dailyicon" href='$url' src="calendar.png"><?php echo "</a>";?>
				  </div>
				  <div id="top_bar_item3">
				       <?php $url="withdraw_payment.php?username='".$username."'"; 
					                echo "<a href='$url'>";?><img id="payment" href='$url' src="rupee-indian.png"><?php echo "</a>";?>
				  </div>
				  <div id="top_bar_item4">
				       <?php $url="list_of_users.php?username='".$username."'"; 
					                echo "<a href='$url'>";?><img id="withdraw" href='$url' src="withdraw.png"><?php echo "</a>";?>
				  </div>
				  <div id="top_bar_item5">
				        <?php $url="change_password.php?username='".$username."'"; 
					                echo "<a href='$url'>";?><img id="support" href='$url' src="delivery.png"><?php echo "</a>";?>
				  </div>
		   </div>
			   
			   
			   
	    
	       <!-- side bar-->
	       <div id="side_bar">
		          <div id="side_bar_item1">
				     <?php $url="after_login_admin.php?username='".$username."'"; 
					                echo "<a href='$url'>";?><img id="dicon" href='$url' src="enterprise.png"><?php echo "DASHBOARD</a>";?> 
					 
				  </div>
				  <div id="side_bar_item2">
				          <?php $url="payment_request.php?username='".$username."'"; 
					                 echo "<a href='$url'>";?><img id="dailyicon" href='$url' src="calendar.png"><?php echo "DAILY</a>";?>
				  </div>
				  <div id="side_bar_item3">
				       <?php $url="withdraw_payment.php?username='".$username."'"; 
					                echo "<a href='$url'>";?><img id="payment" href='$url' src="rupee-indian.png"><?php echo "PAYMENT</a>";?>
				  </div>
				  <div id="side_bar_item4">
				       <?php $url="list_of_users.php?username='".$username."'"; 
					                echo "<a href='$url'>";?><img id="withdraw" href='$url' src="withdraw.png"><?php echo "WITHDRAW</a>";?>
				  </div>
				  <div id="side_bar_item5">
				        <?php $url="change_password.php?username='".$username."'"; 
					                echo "<a href='$url'>";?><img id="support" href='$url' src="delivery.png"><?php echo "PASSWORD</a>";?>
				  </div>
		   </div>
	
        	<div id="user_info"  style="">
			            <?php 
						    //user info
							$uquery="SELECT * FROM admin where username='".$username."'";
							$uresult=mysqli_query($con,$uquery);
							$urow=mysqli_fetch_array($uresult);
						?>
			
	                   <?php echo "ADMIN:-";echo $urow['username'];?>
					  
					  
					  <form id="user_form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					  <input type="submit" name="logout" value="" id="logout">
					  </form>
					  </div>
					  <?php
					     if(isset($_POST['logout']))
						 {
					       $tmp=$_SESSION['username'];
                          session_destroy();

                          session_regenerate_id();
                          $_SESSION['epin']=$tmp;
                          header('Location:http://miwallet.online');
						 }
					  ?>
					  
					  
					  
	       </div>
		   <div id="div_change_password">
		            <form id="form_change" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					      <p class="field">OLD PASSWORD:</p><input id="old_pass" type="text" name="old_password" id="old_password"></br>
						  <p class="field">NEW PASSWORD:</p><input id="new_pass" type="text" name="new_password" id="new_password"></br>
						  <input type="submit" value="CHANGE PASSWORD" name="c_password" id="c_password">
					</form>
		   </div>
		   
		   <?php 
		        if(isset($_POST['c_password']))
				{
					$old_password=$_POST['old_password'];
					$new_password=$_POST['new_password'];
					$query="select * from admin";
					$result=mysqli_query($con,$result);
					$row=mysqli_fetch_array($result);
					if($row['password']==$old_password)
					{
						$q="update admin set password=".$new_password;
						$r=mysqli_query($con,$q);
						if($r)
						{
							echo "PASSWORD CHANGED!";
						}
						else
						{
							echo "SORRY! PASSWORD NOT CHANGED. TRY IT LATER.";
						}
					}
				}
		   ?>
		   
		   
</body>
</html>		   