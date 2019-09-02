<html>
       <head>
	   </head>
	   
      <body>
	        <?php
			//connecting database
			     //include 'connect_db.php';
					
					
					 $username="root";
		             $host="localhost";
                     $password="rohitkumar";
                     $database="wallet";					 
				       $con=mysqli_connect($host,$username,$password,$database)
				        or die("unable to connect database");
						
						
						mysqli_select_db($con,$database)
	                      or die("U to connect database");
					
					
					
					
					//getting information from login page
					
					$username=$_POST['username'];
					$password=$_POST['password'];
					
					//querring from table
					$query="SELECT * FROM admin WHERE username='".$username."'";  //." AND password=".$password;
					$result=mysqli_query($con,$query);
					$r=mysqli_fetch_array($result);
					
					if($r['password']==$password)
					{	
					   
					     session_start();
						   if(isset($_SESSION['username']))
						   {
							  $url="after_login_admin.php";
						      header('Location:'.$url);
						      exit(); 
						   }
						 else
						 {
						  $_SESSION['username']=$username;
					      $url="after_login_admin.php?username='".$username."'";
						  header('Location:'.$url);
						  exit();
					     }
					   
					}
					else
					{
						echo "your epin or password is wrong";
					}
					
					
					//checking it query is excuted or not
					  
					
					
					
					
					
					
					
					
					
				/*	$q="select * from adminregistration";
					$r=mysqli_query($con,$q);
					
					 while($row=mysqli_fetch_array($r))
					   {
						   if($row['email']=$email && $row['password']=$password)
						   {
							   echo "welcome".$email;
							   header("Location:forumheaderpage.php?email=".$email);
						       
						   }
						   else
						   {
							   echo "check your email and password";
						   }
					   }*/
					
					include 'close_db.php';
			?>
	  </body>
</html>