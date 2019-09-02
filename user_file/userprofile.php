<html>

<head>
           <style>
		          body
				  {
				       color:white;
					   font-weight:bold;
					   overflow-x:hidden;
					   background-image:linear-gradient(to right top,#f01e55 ,#b71b66,#70245e,#321e3f,#000812);
					   background-size:cover;
					   background-repeat:no repeat;
				  }
				  #divprofile
				  {
					  border:10px solid rgba(0,0,0,0.7);
					  background:rgba(0,0,0,0.7);
					  margin-left:20%;
					  width:40%;
					  border-radius:10%;
					  padding:10%;
					  text-align:justify;
				  }
				  @media screen and (max-width: 650px) 
				  {
					 #divprofile
				  {
					  background:rgba(0,0,0,0.7);
					  margin-left:5%;
					  width:75%;
					  border-radius:10%;
					  padding:5%;
					  text-align:justify;
				  }  
				  }
		   </style>
</head>

<body>
      <!--user profile-->
	  
	  
	              <?php
		     //database connnection
		//	 include ('connect_db.php');
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
	  
	  <div id="divprofile">
	  <?php
	        $q="select * from adminregistration where epin='".$epin."'";
			$r=mysqli_query($con,$q);
			$row=mysqli_fetch_array($r);
	  ?>
	                <h1 style="text-align:center;color:red;"><u>PROFILE</u></h1>
			  USERNAME:-<?php echo $row['username'];?></br><hr>
			  EPIN:-<?php echo $row['epin'];?></br><hr>
			  REFERALID:-<?php echo $row['referalid'];?></br><hr>
			  EMAIL:-<?php echo $row['email'];?></br><hr>
			  MOBILE NO.:-<?php echo $row['mobileno'];?></br><hr>
			  city:-<?php echo $row['city'];?></br><hr>
			  DOJ:-<?php echo $row['doj'];?></br><hr>
			  INVESTMENT:-Rs500<hr>
			  
			  
	  </div>
</body>
</html>