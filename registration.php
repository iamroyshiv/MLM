<html>
       <head>
	   
	          <style>
			        body
					{
						text-align:center;
						padding-top:10%;
						border:10px solid rgba(0,0,0,0.6);
					}
			  </style>
	   
	   </head>
	   
      <body>
	        <?php
			//error_reporting(E_ALL^E_WARNING);
			// connect database php file
			      include 'connect_db.php';
				
             
				 
				 
				       $username="root";
		             $host="localhost";
                     $password="rohitkumar";
                     $database="wallet";
					 
				       $con=mysqli_connect($host,$username,$password,$database)
				        or die("unable to connect database");
						
						
						mysqli_select_db($con,$database)
	                      or die("U to connect database");
				 
				 
				 
				 
				 if(isset($_POST['submit']))
			{
				 
				 
				 //collecting information for registration
				  $referalId=$_POST['referalid'];
				  $epin=$_POST['epin'];
			      $username=$_POST['username'];
				  $email=$_POST['email'];
				  $password=$_POST['password'];
				  
				  $mobileno=$_POST['mobileno'];
				  
				  $city=$_POST['city'];
				 
				 
				 
				  if(isset($_POST['referalid']))
					  {
						 
						  
						  
						  $rquery="select epin from adminregistration where epin='".$referalId."'";
					$rresult=mysqli_query($con,$rquery);
					$rrow=mysqli_fetch_array($rresult);
			       if($rrow>0)
				    {
						echo "VALID REFERAL ID<br>";
						$countquery="SELECT count(referalid) as total from adminregistration where referalid='".$referalId."'";
						$countresult=mysqli_query($con,$countquery);
						  if($countresult)
						  {
							  echo "COUNTING</br>";
						  }
						  else
						  {
							  echo "NOT COUNTING</br>";
						  }
						  
						$countrow=mysqli_fetch_array($countresult);
						echo "REFERALS USED:-".$countrow['total']." TIMES</br>";
						if($countrow['total']>10)
						{
							echo "THIS REFERAL ID CAN NOT BE USED</br>";
							//sleep(5);
							header("LOCATION:register.html");
							exit();
							
						}
						else
						{
							echo "REFERAL ID IS USABALE</br>";
						}
						
						
						$pquery="select * from pin_generate where epin='".$epin."'";
						$presult=mysqli_query($con,$pquery);
						$prow=mysqli_fetch_array($presult);
						if($prow>0)
						{
							echo "ALLOTED EPIN";
						}
						else
						{
							echo "NOT ALLOTED";
							//sleep(5);
							header("LOCATION:register.html");
							exit();
							
						}
						
						
			    	}
				  else
				   {
					   sleep(2);
					echo "THIS IS NOT VALID REFERAL ID</br>";
					header("LOCATION:register.html");
					exit();
				   }
						  
					  }
				
					
				 
				 
				 
				 
				 
				 
				 
				 
				 
				  
				  
				  
				  //inserting data into table
					$query="insert into adminregistration(referalid,epin,username,email,mobileno,password,doj,city) VALUES('$referalId','$epin','$username','$email','$password','$mobileno',NOW(),'$city')"; //VALUES($referalId,$epin,'$username','$email','$mobileno','$password')";
					
					$result=mysqli_query($con,$query);   
					      
						  if($result)
						  {
							  
							  echo "SUCCESSFULLY REGISTERED</br>";
							  
							  //updating superiors after entering his job
                     		creating_row_in_level_table($con,$epin);	

                             //creating table for user or alloting space for user
					
			                update_level($con,$epin);							

                            //creating row in withdrawtable
                            creating_row_in_withdraw_table($con,$epin);				   
					 		
                          //creating row in daily table
                             create_row_in_daily_table($con,$epin);
							  
							 echo "<a href='register.html'></br>GO BACK</a>";
							  
							  
						  }
						  else
						  {
							  echo "UNSUCCESSFUL REGISTERED</br>";
						  }
					   
					
						 
					
					
					//closing database
					include 'close_db.php';
					
					
					
					}
			else
			{
				echo "</br>";
				echo "<a href='register.html'>GO BACK</a>";
			}
				
			?>
			
			
			
			
			
			
			
			<?php
			    function create_row_in_daily_table($con,$epin)
				{
					$query="INSERT INTO daily (epin,date,amount,total) values('$epin',NOW(),0,500)";
					$result=mysqli_query($con,$query);
					
					if($result)
					{
						echo "<br>UPDATED IN DAILY TABLE";
					}
					else
					{
						echo "</br> NOT UPDATED IN DAILY TABLE";
					}
					
				}
			?>
			
			
			<?php
			     function update_level($con,$epin)
				 {
					for($i=1;$i<=7;$i++)
                    {						
					    $retrive="select * from adminregistration where epin='".$epin."'";
						$result_retrive=mysqli_query($con,$retrive);
						$rowretrive=mysqli_fetch_array($result_retrive);
						$cepin=$rowretrive['referalid'];
						
						
							    if($i==1)
								{
							        $query="select * from level where epin='".$cepin."'";
					                $result=mysqli_query($con,$query);
					                $row=mysqli_fetch_array($result);
									$level=$row['level1'];
									$l=$level+1;
							        $query_insert="update level set level1=$l where epin='".$cepin."'";
									$r=mysqli_query($con,$query_insert);
									
								}	
								else if($i==2)
								{
							        $query="select * from level where epin='".$cepin."'";
					                $result=mysqli_query($con,$query);
					                $row=mysqli_fetch_array($result);
									$level=$row['level1'];
									$l=$level+1;
							        $query_insert="update level set level2=$l where epin='".$cepin."'";
									$r=mysqli_query($con,$query_insert);
									
								}	
								else if($i==3)
								{
							          $query="select * from level where epin='".$cepin."'";
					                $result=mysqli_query($con,$query);
					                $row=mysqli_fetch_array($result);
									$level=$row['level3'];
									$l=$level+1;
							        $query_insert="update level set level3=$l where epin='".$cepin."'";
									$r=mysqli_query($con,$query_insert);
									
								}	    
								else if($i==4)
								{
							          $query="select * from level where epin='".$cepin."'";
					                $result=mysqli_query($con,$query);
					                $row=mysqli_fetch_array($result);
									$level=$row['level4'];
									$l=$level+1;
							        $query_insert="update level set level4=$l where epin='".$cepin."'";
									$r=mysqli_query($con,$query_insert);
									
								}	 
								else if($i==5)
								{
							          $query="select * from level where epin='".$cepin."'";
					                $result=mysqli_query($con,$query);
					                $row=mysqli_fetch_array($result);
									$level=$row['level5'];
									$l=$level+1;
							        $query_insert="update level set level5=$l where epin='".$cepin."'";
									$r=mysqli_query($con,$query_insert);
									
								}	
								else if($i==6)
								{
							          $query="select * from level where epin='".$cepin."'";
					                $result=mysqli_query($con,$query);
					                $row=mysqli_fetch_array($result);
									$level=$row['level6'];
									$l=$level+1;
							        $query_insert="update level set level6=$l where epin='".$cepin."'";
									$r=mysqli_query($con,$query_insert);
									
								}	
								else if($i==7)
								{
							          $query="select * from level where epin='".$cepin."'";
					                $result=mysqli_query($con,$query);
					                $row=mysqli_fetch_array($result);
									$level=$row['level7'];
									$l=$level+1;
							        $query_insert="update level set level7=$l where epin='".$cepin."'";
									$r=mysqli_query($con,$query_insert);
									
								}
                                else
								{
									
								}									
						    
							$epin=$cepin;
						
					}
				 }
			?>
			
			
			
			<?php 
			       function creating_row_in_level_table($con,$epin)
				   {
					   $query="INSERT INTO level (epin,level0,level1,level2,level3,level4,level5,level6,level7,total) VALUES('$epin',1,0,0,0,0,0,0,0,500)";
					   $result=mysqli_query($con,$query);
					   if($result)
					{
						echo "<br>UPDATED IN LEVEL TABLE";
					}
					else
					{
						echo "</br> NOT UPDATED IN LEVEL TABLE";
					}
					   
				   }
			?>
			<?php
			
			      function creating_row_in_withdraw_table($con,$epin)
				  {
					  $query="INSERT INTO withdraw(epin,date,amount) VALUES('$epin',NOW(),0);";
					  $result=mysqli_query($con,$query);
					  if($result)
					{
						echo "<br>UPDATED IN WITHDRAW TABLE";
					}
					else
					{
						echo "</br> NOT UPDATED IN WITHDRAW TABLE";
					}
					
				  }
			?>
			<?php 
			     function creating_row_in_payment_request($con,$epin)
				 {
					 $query="INSERT INTO payment_request (epin) VALUES('$epin')";
					 $result=mysqli_query($con,$query);
					 if($result)
					{
						echo "<br>UPDATED IN PAYMENT TABLE";
					}
					else
					{
						echo "</br> NOT UPDATED IN PAYMENT TABLE";
					}
				 }
			     
			?>
			
			
		<?php
		/*    function registration_creating_table($con,$table)
			{
					 $query="create table tbl".$table."(referalId int, epin int,username varchar(30),email varchar(30),password varchar(30),mobileno varchar(10));";
		              $registration_table= mysqli_query($con,$query);
			    if($registration_table)
				{
				  echo "your section is alloted";
				}
				else
				{
				  echo "secton is not alloted";
				}
			}
		?>
		
		
		
		
		<?php
		       function superior_update_db($con,$user)
			    {
				           for($i=0;$i<7;$i++)
			                 {
				                  $tbl="select referalId from".$user;
				                   $level="level".$i;
				                   $querry="insert into".$tbl."() values($username,$epin,NOW(),$level)";
					                $result=mysqli_query($query,$con);
									if($result)
									{
					                          $username="select epin from".$user;
					
					              if($username==NULL)
					                {
						               exit();
					                }
					               else
					                {
						                echo "superiors not updated";
					                }
									
									}
			                  }
			   }*/
		?>
		
	  </body>
</html>