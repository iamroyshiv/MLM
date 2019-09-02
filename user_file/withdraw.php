<html>

   <head>
          
		   <link href="earnin.css" rel="stylesheet" type="text/css" media="all">
            <link href="afterlogin.css" rel="stylesheet" type="text/css" media="all">		  
		  <meta name="viewport" content="width=device-width,initial-scale=1">
		   <style>
		   body
		   {
			   color:white;
			   font-weight:bold;
		   }
		        #total_amount
				{
					padding:px;
				}
#total
{
	position:relative;
	top:10%;
	left:30%;
	width:70%;
	height:10%;
	background:;
	padding:10px;
}
#total_amount
{
	position:absolute;
	top:120%;
	left:60%;
	padding:0px;
	border:none;
	
}
#possible_withdraw
{
	position:absolute;
	top:120%;
	left:80%;
	border:none;
}
#withdraw_div
{
	
	position:absolute;
	top:40%;
	left:75%;
	margin-left: 0%;
	width:20%;
	height:20%;
	
}
#submit{
	margin-left:20%;
	background-color:pink;
	border-color:pink;
	padding:10px;
	margin-top:2%;
}
#form_withdraw{
	
	margin-left: 0%;
	margin-top: 1%;
	width: 100%;
	background:rgba(0,0,0,0.7);
	height: 100%;
	border:2px solid black;
	border-radius: 10px;
}
#amount_in input[type="text"]{
	left: 60%;
	border: none;
    border-bottom: 2px solid rgb(215, 5, 243);
    background: transparent;
    color:#F91D03;
    font-family: Georgia, 'Times New Roman', Times, serif;
    outline: none;
    height: 40px;
    width: 70%;
    font-size: 15px;
}
#amt{
	margin-left:20%;
	margin-top:10%;
}
#withdraw_list
{
	background:rgba(0,0,0,0.7);
	border-radius:10px solid rgba(0,0,0,0.9);
	top:30%;
	left:10%;
}
#tbl_withdraw_list{
	text-align:center;
	position:absolute;
	background:rgba(0,0,0,0.7);
	border:10px solid rgba(0,0,0,0.9);
	border-radius:10px;
	margin-top: %;
	margin-left: %;
	top:30%;
	left:20%;
}
#tbl_row1,#tbl_row2{
	width:40%;
}



                  #footer
				   {
					   position:relative;
					   top:90%;
				   }
				   
				   
				   
 @media screen and (max-width: 650px) 
 {
	#total
{
	position:relative;
	top:10%;
	left:0%;
	width:100%;
	height:20%;
	background:;
	padding:10px;

	 
 }
 
 #total_amount
{
	position:absolute;
	top:75%;
	left:10%;
	padding:0px;
	border:none;
	
}
#possible_withdraw
{
	position:absolute;
	top:90%;
	left:10%;
	border:none;
}
#withdraw_div
{
	background:rgba(0,0,0,0.5);
	position:absolute;
	top:50%;
	left:10%;
	margin-left: 0%;
	width:80%;
	height:30%;
	
}
 
 #withdraw_list
{
	position:absolute;
	top:100%;
	left:-5%;
	width:80%;
}
 
 
 }
		   </style>
   </head>
   
   <body>
         <?php
		     //database connnection
		//	 include ('connect_db.php');
			      $username="root";
		             $host="localhost";
                     $password="rohitkumar";
                     $database="indus";
					 
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
         <div id="side_bar" style=" background-image: linear-gradient(to right top, #1a1d1e, #00324a, #004480,#0050b5,#5a4ddc);">
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
	
        	<div id="user_info"  style=" background-image: linear-gradient(to right top, #1a1d1e, #00324a, #004480,#0050b5,#5a4ddc);">
			            <?php 
						    //user info
							$uquery="SELECT * FROM adminregistration where epin='".$epin."'";
							$uresult=mysqli_query($con,$uquery);
							$urow=mysqli_fetch_array($uresult);
						?>
			                <!--REFFERED BY:---><?php //echo $urow['referalid'];?>
	                  USERNAME:- <?php $url="userprofile.php?epin='".$epin."'";  
					                  echo "<a href='$url' target='_blank'>"; echo $urow['username']; echo "</a>";?>
					  
					  
					  <form id="user_form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					  <input type="submit" name="logout" value="" id="logout">
					  </form>

					  
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
   
   
   
       <strong><b>  <div id="total">
		        <div id="total_amount">
                          <?php				        
						             $tquery="select * from level where epin='".$epin."'";
									 $tresult=mysqli_query($con,$tquery);
									 $trow=mysqli_fetch_array($tresult);
									 echo " TOTAL= ";
						             echo $trow['total'];
						   ?>
				</div>
				<div id="possible_withdraw">
				            <?php
							     echo "CAN WITHDRAW=";
								 echo $trow['total']-500;
							?>
				</div>
		 </div></b></strong>
		 <div id="withdraw_div">
		        <form id="form_withdraw" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				    <input id="amt" type="text" name="amount" id="amount" id="amount_in" placeholder="Enter your Amount:">
					<input id="submit" type="submit" name="submit" id="submit" id="amount_submit">
				</form>
		 </div>
		 
		 <div id="withdraw_list">
		        <?php
				     $rquery="select * from payment where epin='".$epin."'";
					 $rresult=mysqli_query($con,$rquery);
					  
					     echo ""?><table id="tbl_withdraw_list" border='1px solid black';><?php
					   echo "<tr>";
					   echo "<td id='tbl_row1'>EPIN</td>";echo "<td id='tbl_row2'>DATE</td>"; echo "<td id='tbl_row2'>AMOUNT</td>";
				       echo "</tr>";
					  
					 while($rrow=mysqli_fetch_array($rresult))
					 {
						 
						    echo "<tr>";
						  echo "<td id='tbl_row2'>".$rrow['epin']."</td>"; echo "<td id='tbl_row2'>".$rrow['date']."</td>"; echo "<td id='tbl_row2'>".$rrow['amount']."</td>";
					      echo "</tr>";
					 }
					  echo "</table>";
				?>
		 </div>
		   
		   <?php
		        if(isset($_POST['submit']))
				{
					$pin=$epin;
					$amount=$_POST['amount'];
					$iquery="insert into payment (epin,date,amount) values('$epin',NOW(),$amount)";
					$iresult=mysqli_query($con,$iquery);
					if($iresult)
					{
						echo "your request is uploaded";
					}
					else
					{
						echo "sorry! try again";
					}
				}
		      
		   ?>
		   
		    <div id="footer" background="BLUE" width="100%" height="10px" >
		           
				          <p align="center"><b>your <u><strong>EPIN</strong></u> number is:- <?php echo $epin;?></b></p>
				   
		   </div>
		 
   </body>
</html>