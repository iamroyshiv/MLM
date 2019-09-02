
	            <?php
				     $username="root";
		             $host="localhost";
                     $password="rohitkumar";
                     $database="wallet";

					 DEFINE('username','root');
					 DEFINE('host','localhost');
					 DEFINE('password','rohitkumar');
					 DEFINE('database','indus');
				       $con=mysql_connect($host,$username,$password,$database)
				        or die("unable to connect database");
						
						
						mysql_select_db($database,$con)
	                      or die("U to connect database");
				?>
	