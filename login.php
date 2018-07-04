<?php
		session_start();
		$_SESSION['log']=0;
		
		include "webconfig.php";

		$username = $_POST["username"];
		$password = $_POST["password"];

		// connect to ldap server
		/*$ldapconn = ldap_connect("10.100.10.21");
					
		if (!$ldapconn)
		{
			 echo '<META HTTP-EQUIV="Refresh" Content="2; URL=index.php">';    	
			 echo "Error 101 : LDAP server is malfunctioning. Please contact ICT at 5072.";
			 exit;
		}
			
		if (!ldap_bind($ldapconn,$username."@tnbr.com.my", $password))
		{
			 echo '<META HTTP-EQUIV="Refresh" Content="2; URL=index.php">';  
			 echo "Your username and password did not match our database. Please try again.";
			 exit;
		}
			
		ldap_unbind($ldapconn);*/

			$sqlstr = mysql_query("SELECT * FROM staff WHERE username_tnb = '$username'");
			if (mysql_numrows($sqlstr) != 0) 
			{
			
					while ($row = mysql_fetch_array($sqlstr)) 
					{
						$staffno = $row['staff_no'];
						$name = $row['name'];
						$unit = $row['unit'];
						$designation = $row['designation'];
						
					}
					
					$sqlstr = mysql_query("SELECT * FROM access WHERE username = '$username'");
					while ($row = mysql_fetch_array($sqlstr)) 
					{
						$group = $row['group'];
					}
				
					if ($username == 'kamal.kiram')
					{
						$_SESSION['log']=1; //administrator
					}
					else
					{	
						if ($group == 'Manager')
						{
							$_SESSION['log']=2; //Manager
						}
						else if ($group == 'SMOD')
						{
							$_SESSION['log']=3; //SMOD
						}
						else 
						{
							$_SESSION['log']=4; //Staf
						}
					}
					
					$_SESSION['username']=$username; 
					$_SESSION['password']=$password; 
					$_SESSION['name']=$name; 
					$_SESSION['unit']=$unit; 
					$_SESSION['designation']=$designation;
					$_SESSION['staffno']=$staffno;
					$ip = $_SERVER['REMOTE_ADDR'];
					$_SESSION['ip']=$ip; 

					echo '<META HTTP-EQUIV="Refresh" Content="0; URL=project.php">';    
					exit;
			
			}				
			else
			{
				$_SESSION['log']=0;
				echo '<META HTTP-EQUIV="Refresh" Content="2; URL=index.php">';    
				exit;  
			}
?>
