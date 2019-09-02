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
			   
			   
			   <!-- top bar-->
	      
		
		
		
		
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
					                echo "<a href='$url'>";?><img id="support" href='$url' src="delivery.png"><?php echo "SUPPORT</a>";?>
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
                          $_SESSION['username']=$tmp;
                          header('Location:http://miwallet.online');
						 }
					  ?>
					  
	       </div>
		   
		   <div id="div_all_users">
		          <?php
				      $query="select * from adminregistration";
					  $result=mysqli_query($con,$query);
					  
					     echo "";?><table id="tbl_users" border='1px solid black';><?php
						 echo "<tr style='color:'RED''><td>USERS LIST</td></tr>";
					   echo "<tr>";
					   echo "<td>EPIN</td>";echo "<td>USERNAME</td>";echo "<td>MOBILE</td>";echo "<td>EMAIL</td>";echo "<td>JOINING DATE</td>"; echo "<td>INVESTEMENT AMOUNT</td>";
				       echo "</tr>";
				      while($row=mysqli_fetch_array($result))
					  {
						  //$g=$_SESSION[$row['epin']];
						  echo "<tr>";
						  echo "<td>"; 
						                   $url="userprofile.php?epin=".$row['epin']."'";  
					                  echo "<a href='$url' target='_blank'>".$row['epin']."</a></td>";echo "<td>".$row['username']."</td>";echo "<td>".$row['mobileno']."</td>";echo "<td>".$row['email']."</td>"; echo "<td>".$row['doj']."</td>"; echo "<td>Rs500</td>";
					      echo "</tr>";
					  }
					  echo "</table>";
				  ?>
		   </div>
</body>
</html>		   