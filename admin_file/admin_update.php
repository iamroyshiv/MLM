<html>
    <head>
	      <style>
		         body
				 {
					 background:;
				 }
				 #tbl_update_amount
				 {
					 position:absolute;
					 left:10%;
					 top:40%;
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
                          $_SESSION['username']=$tmp;
                          header('Location:http://miwallet.online');
						 }
					  ?>
	       </div>
		   
		   <!--//body partttttttttttttttttt-->
		   <div id="update_daily">
		           <form id="update_daily_form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				         UPDATE:-<input  type="submit" name="submit" id="submit" onclick="" value="UPDATE"><!-- method="POST" action="<?php// echo htmlspecialchars($_SERVER["PHP_SELF"]);?>  >-->
				   </form>
		   </div>
		   
		      
			  
				   
		   
          
           
		    <?php
		         if(isset($_POST['submit']))
				 {
					 $query="select * from level ";
					 $result=mysqli_query($con,$query);
					 
					     while($row=mysqli_fetch_array($result))
						 { //echo "";
							 $t= $row['level0']*5+$row['level1']*3+$row['level2']*1+$row['level3']*1+$row['level4']*0.5+$row['level5']*0.2+$row['level6']*0.2+$row['level7']*0.1;
							 $sum=$row['total'];
							 
							 $total=$sum+$t;
							 //echo $total;
							 $pin=$row['epin'];
							 
							 $q="update level set total=".$total ." where epin='".$pin."'";
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
								$levelupdate="select total from daily where date=curdate() and epin='".$pin."'";
								$levelresult=mysqli_query($con,$levelupdate);
								//if($levelupdate){echo "sssssssssssssssssssssssssssssssssssssss";}else{echo "nnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn";}
								$levelrow=mysqli_fetch_array($levelresult);
								$leveltotal=$levelrow['total'];
								//echo "sssssssssssssssssssssssssssssssssssssss".$leveltotal;
								$q="update level set total=".$leveltotal ." where epin='".$pin."'";
						     	 $r=mysqli_query($con,$q);
						}
			      }
			?>  
		  
								
						
								
								
								
						 
				 
				 
				
								<?php	
				                      //showing table of updation					
									 $uquery="select * from daily where date=CURDATE()";  //where date=sysdate()";
					                 $uresult=mysqli_query($con,$uquery);
					   
					                 echo "";?><table id="tbl_update_amount" border='1px solid black' width="70%"  ><?php
						             echo "<tr>";
								         echo '<td>EPIN</td>'; echo '<td>DATE</td>'; echo '<td>AMOUNT</td>';
								     echo "</tr>";
						    
					   
					                  while($row=mysqli_fetch_array($uresult))
					                       {
						  
						                     echo "<tr>";
								                  echo '<td>'.$row['epin'].'</td>'; echo '<td>'.$row['date'].'</td>'; echo '<td>'.$row['amount'].'</td>'; echo '<td>'.$row['total'].'</td>';
								            echo "</tr>";
						   
					                       }
					                  echo "</table>";
								
								
				 
		   ?>
		   
		   
		 </body>  
		</html>