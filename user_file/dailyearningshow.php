<html>
      <head>
	          
			  <link href="earning.css" rel="stylesheet" type="text/css" media="all">
			  <link href="afterlogin.css" rel="stylesheet" type="text/css" media="all">
			  <meta name="viewport" content="width=device-width,initial-scale=1">
			  
			  <style>
			       #footer
				   {
					   position:relative;
					   top:90%;
				   }
				   body{
				   
    background-image: linear-gradient(to right top, #36d527, #00bb92, #0097e5, #006af8, #3b10b3);
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
	color:white;font-weight:400;
	}
				   </style>
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
								
								$epin=$_SESSION['epin'];
					?>
	  
	  
	  
	  
	  
	  
	  
	              <!-- top bar-->
	       <div id="top_bar" >
		          <div id="top_bar_item1">
				     <?php $url="after_login.php?epin='".$epin."'"; 
					                echo "<a href='$url'>";?><img id="dicon" href='$url' src="enterprise.png"><?php echo "</a>";?> 
					 
				  </div>
				  <div id="top_bar_item2">
				          <?php $url="dailyearningshow.php?epin='".$epin."'"; 
					                 echo "<a href='$url'>";?><img id="dailyicon" href='$url' src="calendar.png"><?php echo "</a>";?>
				  </div>
				  <div id="top_bar_item3">
				       <?php $url="paymentretrivation.php?epin='".$epin."'"; 
					                echo "<a href='$url'>";?><img id="payment" href='$url' src="rupee-indian.png"><?php echo "</a>";?>
				  </div>
				  <div id="top_bar_item4">
				       <?php $url="withdraw.php?epin='".$epin."'"; 
					                echo "<a href='$url'>";?><img id="withdraw" href='$url' src="withdraw.png"><?php echo "</a>";?>
				  </div>
				  <div id="top_bar_item5">
				        <?php $url="support.php?epin='".$epin."'"; 
					                echo "<a href='$url'>";?><img id="support" href='$url' src="delivery.png"><?php echo "</a>";?>
				  </div>
		   </div>
	  
	  
	  
	  
	  
	  
	       
		    <div id="side_bar">
		          <div id="side_bar_item1">
				     <?php $url="after_login.php?epin='".$epin."'"; 
					                echo "<a href='$url'>";?><img id="dicon" href='$url' src="enterprise.png"><?php echo "DASHBOARD</a>";?> 
					 
				  </div>
				  <div id="side_bar_item2">
				          <?php $url="dailyearningshow.php?epin='".$epin."'"; 
					                 echo "<a href='$url'>";?><img id="dailyicon" href='$url' src="calendar.png"><?php echo "DAILY</a>";?>
				  </div>
				  <div id="side_bar_item3">
				       <?php $url="paymentretrivation.php?epin='".$epin."'"; 
					                echo "<a href='$url'>";?><img id="payment" href='$url' src="rupee-indian.png"><?php echo "PAYMENT</a>";?>
				  </div>
				  <div id="side_bar_item4">
				       <?php $url="withdraw.php?epin='".$epin."'"; 
					                echo "<a href='$url'>";?><img id="withdraw" href='$url' src="withdraw.png"><?php echo "WITHDRAW</a>";?>
				  </div>
				  <div id="side_bar_item5">
				        <?php $url="support.php?epin='".$epin."'"; 
					                echo "<a href='$url'>";?><img id="support" href='$url' src="delivery.png"><?php echo "SUPPORT</a>";?>
				  </div>
		   </div>
	
        	<div id="user_info"  style="">
			            <?php 
						    //user info
							$uquery="SELECT * FROM adminregistration where epin='".$epin."'";
							$uresult=mysqli_query($con,$uquery);
							$urow=mysqli_fetch_array($uresult);
						?>
			           
					    USERNAME:- <?php $url="userprofile.php?epin='".$epin."'";  
					                  echo "<a href='$url' target='_blank'>"; echo $urow['username']; echo "</a>";?>
	                  <!--D.O.J:-<?php //echo ""?> 
					  REFFERED BY:-<?php //echo $urow['referalid'];?>-->
					  
					  <form id="user_form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					  <input type="submit" name="logout" value="" id="logout">
					  </form>
					  </div>
					  <?php
					     if(isset($_POST['logout']))
						 {
					       $tmp=$_SESSION['epin'];
                          session_destroy();
                          session_regenerate_id();
                          $_SESSION['epin']=$tmp;
                          header('Location:login.html');
						 }
					  ?>
	       </div>
		    
		   
		   
	  
	        <div id="tblearning" style="background:rgba(0,0,0,0.5);color:white;font-weight:400;">
			  
			      <?php
				       $query="select * from daily where epin='".$epin."'";
					   $result=mysqli_query($con,$query);
					   
					    echo "";?><table id="tblearningtable" border='1px solid black' width="100%"><?php
						        echo "<tr><td></td><td>DAILY EARNING</td><td></td></tr>";
						          echo "<tr>";
								       echo '<td>EPIN</td>'; echo '<td>DATE</td>'; echo '<td>AMOUNT</td>';
								  echo "</tr>";
						   
					   
					   while($row=mysqli_fetch_array($result))
					   {
						  
						          echo "<tr>";
								       echo '<td>'.$row['epin'].'</td>'; echo '<td>'.$row['date'].'</td>'; echo '<td>'.$row['amount'].'</td>';
								  echo "</tr>";
						   
					   }
					   echo "</table>";
				  ?>
			</div>
			
			
			 <div id="footer" background="BLUE" width="100%" height="10px" >
		           
				          <p align="center"><b>your <u><strong>EPIN</strong></u> number is:- <?php echo $epin;?></b></p>
				   
		   </div>
	  </body>

</html>