<html>
  <head>
        <link href="afterlogin.css" rel="stylesheet" type="text/css" media="all">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		
		<style>
		body
		{
			overflow-x:hidden;
		}
		     #divkyc
			 {
				 
				 border-radius:10px;
			 }
		     #kyc
			 {
				 border:10px solid rgba(0,0,0,0.9);
				 position:absolute;
				 top:30%;
				 left:30%;
				 background:rgba(0,0,0,0.7);
				 color:white;
				 font-weight:bold;
				 width:50%;
				 height:80%;
				 border-radius:10px;
			 }
			 .imgdiv
			 {
				 height:40%;
			 }
			  #footer
				   {
					   position:relative;
					   top:90%;
					   color:white;
				   }
				   
 @media screen and (max-width: 650px) 
 {				   
				   
               #divkyc
			   {
				   position:relative;
				   top:30%;
				   left:5%;
				   width:85%;
				   height:450px;
				   background:rgba(0,0,0,0.7);
			   }
             #kyc
			 {
				 position:absolute;
				 top:0%;
				 left:0%;
				 background:rgba(0,0,0,0.7);
				 color:white;
				 font-weight:bold;
				 width:100%;
				 height:100%;
				 border-radius:10px;
				 
			 }
			  .imgdiv
			 {
				 height:30%;
			 }
	
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
	
        	<div id="user_info"  style="">
			            <?php 
						    //user info
							$uquery="SELECT * FROM adminregistration where epin='".$epin."'";
							$uresult=mysqli_query($con,$uquery);
							$urow=mysqli_fetch_array($uresult);
						?>
			              USERNAME:- <?php $url="userprofile.php?epin='".$epin."'";  
					                  echo "<a href='$url' target='_blank'>"; echo $urow['username']; echo "</a>";?>
	                 <!-- D.O.J:-<?php //echo ""?> -->
					 <!-- REFFERED BY:---><?php //echo $urow['referalid'];?>
					  
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
                          header('Location:http://miwallet.online');
						 }
					  ?>
					  
	       </div>
   
   
         <div id="divkyc" style="border='1px solid red';background='black'">
		      <?php
			     $iquery="select * from adminregistration where epin='".$epin."'";
				 $iresult=mysqli_query($con,$iquery);
				 $irow=mysqli_fetch_array($iresult);
			  ?>
		 
		 
		      <form id="kyc"  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
			      <label style="padding-left:10px;">ADHAR CARD:</label><input style="padding:10px;" type="file" name="adhar_card" id="adhar_card">
				  <input type="submit" name="submit_adhar" id="submit"></br>
				  <div class="imgdiv" style="width:80%;padding-left:10px;"><img alt="upload image" width="100%" height="100%" src="<?php echo "image/".$irow['adhar_image'] ?>"></div>
				  <label style="padding-left:10px;">BANK PASSBOOK:</label><input style="padding:10px;" type="file" name="bank_passbook" id="bank_passbook">
				  <input type="submit" name="submit_bank" id="submit">
				  <div class="imgdiv" style="width:80%;padding-left:10px;"><img alt="upload image" width="100%" height="100%" src="<?php echo "image/".$irow['bank_image'] ?>"></div>
				  
                             
			  </form>
			  
			  
			   <?php
			   if(isset($_POST['submit_adhar']))
				{
					//$email=$_POST['email'];
					   if($_FILES['adhar_card']['size']=true)
					   {      
				              //echo $email;
					          $path="image/";
					          $imagename=$_FILES['adhar_card']['name'];
					          //$q="insert into adminregistration (epin,adhar_image_name) values($epin,'$imagename')";
					          $q="update adminregistration set adhar_image='".$imagename."' where epin='".$epin."'";
							  $target=$path.basename($_FILES['adhar_card']['name']);
							  $filename=$_FILES['adhar_card']['tmp_name'];
							 
					          $m=move_uploaded_file($filename,$target);
					          $r=mysqli_query($con,$q);
							         
                                  // if($m){echo "ssssssssssssssssssssssssssssssssssssssssssssssssssssss";}else{echo "nnnnnnnnnnnnnnnnnnnnnnnnnnnnn";}
							 /* $p=strrpos($imagename,".");
							  $filename=substr($imagename,0,$p);
							  $myfile="image/".$filename.".txt";
							  $h=fopen($myfile,"a");
							  if($h){echo "success";}
							  fwrite($h," ");*/  
							  
					   }
					   else
					   {
						   echo "it is not an image";
					   }
				}
				?>
			  
			  <?php
			   if(isset($_POST['submit_bank']))
				{
					//$email=$_POST['email'];
					   if($_FILES['bank_passbook']['size']=true)
					   {      
				              //echo $email;
					          $path="image/";
					          $imagename=$_FILES['bank_passbook']['name'];
					          //$q="insert into adminregistration (epin,adhar_image_name) values($epin,'$imagename')";
					          $q="update adminregistration set bank_image='".$imagename."' where epin='".$epin."'";
							  $target=$path.basename($_FILES['bank_passbook']['name']);
							  $filename=$_FILES['bank_passbook']['tmp_name'];
							 
					          $m=move_uploaded_file($filename,$target);
					          $r=mysqli_query($con,$q);
							         
                                   //if($m){echo "sssssssssssssssssssssssssssssssssssssssssssssssssssssstttt";}else{echo "nnnnnnnnnnnnnnnnnnnnnnnnnnnnn";}
							 /* $p=strrpos($imagename,".");
							  $filename=substr($imagename,0,$p);
							  $myfile="image/".$filename.".txt";
							  $h=fopen($myfile,"a");
							  if($h){echo "success";}
							  fwrite($h," ");*/  
							  
					   }
					   else
					   {
						   echo "it is not an image";
					   }
				}
				?>
		 </div>
		 <?php
		    
		 ?>
		  <div id="footer" background="BLUE" width="100%" height="10px" >
		           
				          <p align="center"><b>your <u><strong>EPIN</strong></u> number is:- <?php echo $epin;?></b></p>
				   
		   </div>
   </body>
  
</html>

