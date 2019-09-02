<html>
   <head>
            
			<link href="earning.css" rel="stylesheet" type="text/css" media="all">
			<link href="afterlogin.css" rel="stylesheet" type="text/css" media="all">
			<meta name="viewport" content="width=device-width,initial-scale=1">
			<style>
			   #send
			   {
				   border-radius:10px;
				   width:20%;
				   height:10%;
			   }
			   #footer
				   {
					   position:relative;
					   top:90%;
					   color:white;
				   }
			</style>
			
   </head>
   
   <body>
   
           <?php
		     //database connnection
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
   
   
   
   
            
   
   
   
   <!--side bar-->
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
	
        	<div id="user_info"  style="color:white;">
			            <?php 
						    //user info
							$uquery="SELECT * FROM adminregistration where epin='".$epin."'";
							$uresult=mysqli_query($con,$uquery);
							$urow=mysqli_fetch_array($uresult);
						?>
			          
					    
	                  <!--<div>D.O.J:-<?php //echo "";?> </br></div>
					  <div>REFFERED BY:-<?php //echo $urow['referalid'];?></div>-->
					   USERNAME:- <?php $url="userprofile.php?epin='".$epin."'";  
					                  echo "<a href='$url' target='_blank'>"; echo $urow['username']; echo "</a>";?>
					  
					  <div>
					  <form  id="user_form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
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
                          header('Location:http://miwallet.online');
						 }
					  ?>
	       </div>
   
   
   
     
	      <div id="query_sentence">
		       <p id="query_sentence" align="center" font="100%">IF YOU HAVE ANY QUERY, ASK HERE</p>
		  </div>
		  <div id="query_form">
		       <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		        <textarea name="textarea" id="textarea" rows="10" cols="80"> YOUR QUERY</textarea></br>
				<input type="submit" id="send" value="SEND" name="send">
			   </form>
		  </div>
	 
	 
	 
	 <?php
         	 if(isset($_POST['send']))
			 {
				 $adminmail="www.rohit983544@gmail.com";
				 $message=$_POST['textarea'];
				 $query="select * from adminregistration where epin='".$epin."'";
				 $result=mysqli_query($con,$query);
				 $row=mysqli_fetch_array($result);
				 $string="USERNAME is".$row['username']."</br> EPIN IS ".$row['epin']."</br>".$message;
				 $checkmail=mail($adminmail,'NEED HELP',$string);
				 if($checkmail)
				 {
					 echo "MAIL SEND TO ADMIN";
				 }
				 else
				 {
					 echo "SORRY! UNABLE TO SEND MAIL";
				 }
			 }
	 ?>
	 
	  <div id="footer" background="BLUE" width="100%" height="10px" >
		           
				          <p align="center"><b>your <u><strong>EPIN</strong></u> number is:- <?php echo $epin;?></b></p>
				   
		   </div>
	 
   </body>
</html>