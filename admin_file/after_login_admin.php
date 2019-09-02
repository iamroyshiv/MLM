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
	    
		
		<!-- side bar-->
	      
		
		
		
		
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
					                echo "<a href='$url'>";?><img id="dicon" href='$url' src="enterprise.png"><?php echo "</a>";?> <hr>
					 
				  </div>
				  <div id="side_bar_item2">
				          <?php $url="payment_request.php?username='".$username."'"; 
					                 echo "<a href='$url'>";?><img id="dailyicon" href='$url' src="calendar.png"><?php echo "</a>";?><hr>
				  </div>
				  <div id="side_bar_item3">
				       <?php $url="withdraw_payment.php?username='".$username."'"; 
					                echo "<a href='$url'>";?><img id="payment" href='$url' src="rupee-indian.png"><?php echo "</a>";?><hr>
				  </div>
				  <div id="side_bar_item4">
				       <?php $url="list_of_users.php?username='".$username."'"; 
					                echo "<a href='$url'>";?><img id="withdraw" href='$url' src="withdraw.png"><?php echo "</a>";?><hr>
				  </div>
				  <div id="side_bar_item5">
				        <?php $url="change_password.php?username='".$username."'"; 
					                echo "<a href='$url'>";?><img id="support" href='$url' src="delivery.png"><?php echo "</a>";?><hr>
				  </div>
		   </div>
		   
		   
		   
	
        	<div id="user_info"  style="">
			            <?php 
						    //user info
							$uquery="SELECT * FROM admin where username='".$username."'";
							$uresult=mysqli_query($con,$uquery);
							$urow=mysqli_fetch_array($uresult);
						?>
			
	                   <?php echo "ADMIN:-";?>
					  <?php echo $urow['username'];?>
					  
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
		   
		   <!--//body partttttttttttttttttt-->
		  <!-- <div id="update_daily">
		           <form id="update_daily_form" method="POST" action="<?php// echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				         UPDATE:-<input type="submit" name="submit" id="submit" value="UPDATE">
				   </form>
		   </div>-->
		   
		   <div id="generate_epin">
		       <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		         <input type="submit" id="pin_generate" name="pin_generate" value="PIN GENERATE" readonly>
				</form>
				<?php
				     if(isset($_POST['pin_generate']))
					 {
						 $pquery="select count(epin) as pin from pin_generate";
						 $presult=mysqli_query($con,$pquery);
						 $prow=mysqli_fetch_array($presult);
						 $pin=$prow['pin'];
						 $new_pin=$pin+1+10000;
						 echo "<input id='pin' type='text' name='pin' value='".$new_pin."'>";
						 $q="insert into pin_generate(epin) values('$new_pin')";
						 $r=mysqli_query($con,$q);
						 if($r)
						 {
							 echo "EPIN generator";
						 }
						 else
						 {
							 echo "EPIN NOT GENERATED!";
						 }
					 }
				?>
		   </div>

            <div id="update_button">
		          <button id="updatebtn" name="updatebtn" id="update"><b><a href="admin_update.php" style="list-style-type:none;text-decoration:none;color:black;">UPDATE</a></b></button>
		   </div>		   
		   <div id="users_list">
		         <?php 
				 users_lists($con);
                 ?>
			</div>
		   
		   
		   
		   <?php
		         if(isset($_POST['submit']))
				 {
					 $query="select * from level";
					 $result=mysqli_query($con,$query);
					 
					     while($row=mysqli_fetch_array($result))
						 { 
							 $t= $row['level0']*5+$row['level1']*3+$row['level2']*1+$row['level3']*1+$row['level4']*0.5+$row['level5']*0.2+$row['level6']*0.2+$row['level7']*0.1;
							 $sum=$row['total'];
							 
							 $total=$sum+$t;
							 echo $total;
							 $pin=$row['epin'];
							 
							 $q="update level set total=".$total ." where epin=".$pin."'";
							 $r=mysqli_query($con,$q);
							 //inserting data into daily table
							 $iq="insert into daily(epin,date,amount,total) values('$pin',NOW(),$t,$total)";
							 $ir=mysqli_query($con,$iq);
							    if($ir)
								{
									echo "daily income is updated";
								}
								else
								{
									echo "sorry not updated";
								}
						 }
				 }
		   ?>
		   
		  <b> 
		   <?php
		       function users_lists($con)
			   {
				   $query="select * from level";
				   $result=mysqli_query($con,$query);
				       echo ""?><table id="lvl_tbl" border='1px solid black;'  ;><?php
					    echo "<tr style='color:red'><td></td>";echo "<td>AWARD </td>";echo "<td>LIST</td>"; echo "<td></td></tr>";
					   echo "<tr>";
					   echo "<td>EPIN</td>";echo "<td>Total MEMEBER</td>";echo "<td>RANK</td>"; echo "<td>AWARD</td>";
				       echo "</tr>";
				      while($row=mysqli_fetch_array($result))
					  {
						  $t=$row['level0']+$row['level1']+$row['level2']+$row['level3']+$row['level4']+$row['level5']+$row['level6']+$row['level7'];
						  if($t>100)
						  {
							  echo "<tr>";
							  echo "<td>";
							   $url="userprofile.php?epin='".$row['epin']."'";  
					                  echo "<a href='$url' target='_blank'>".$row['epin']."</td>"; echo "<td>".$t."</td>"; echo "<td>";
							                             if($t>100 && $t<=1000)
														 {
															 echo "STAR SILVER </td>"; echo "<td>KATHMANDU TOUR";
														 }
														 else if($t>1000 && $t<=10000)
														 {
															 echo "STAR GOLD </td>"; echo "<td>LAPTOP";
														 }
														  else if($t>10000 && $t<=100000)
														 {
															 echo "H.R </td>"; echo "<t> ROYAL BULLET";
														 }
														  else if($t>100000 && $t<=1000000)
														 {
															 echo "STAR H.R </td>"; echo "<td>SWIFT DZIRE";
														 }
														  else if($t>1000000 && $t<10000000)
														 {
															 echo "STAR RUBY </td>"; echo "<td> SCORPIO";
														 }
														 else if($t>10000000)
														 {
															 echo "DIAMOND </td>"; echo "<td>PAJERO SPORT";
														 }
							echo "</td>";
							echo "</tr>";
						  }
					  }
					  echo "</table>";
			   }
		      
		   ?>
		   
		   </b>
		   
		   
		   
</body>
</html>		   