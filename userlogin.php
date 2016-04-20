<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>User Login</title>
  
  <link href="./raw/css" rel="stylesheet" type="text/css">    
  <link rel="stylesheet" type="text/css" href="./raw/style.css">
</head>

<body>
  <div id="main">
 
	<div id="headerin">  
	  
	  <div id="welcome">
	    <a href="index.html"><img src="raw/ktu.jpg" alt="logo" height="110" width="500"></a>
	  </div><!--close welcome-->	  
	  
	  <div id="menubar_container">
		
		<div id="menubar">
		
          <div id="menu_items">
	        <ul id="menu">
              <li><a href="index.html">Home</a></li>
              <li class="current"><a href="userlogin.php">User Login</a></li>
              <li><a href="galery.html">Gallery</a></li>
              <li><a href="contactus.html">Contact Us</a></li>
            </ul>
          </div><!--close menu-->
		
        </div><!--close menubar-->	
		
      </div><!--close menubar_container-->		 
	
	<div id="site_content">  
	        
	  <div id="content">		
		
		<div class="content_item">		
		
          	<h1 style="text-align:center;">User Login</h1>	
          	<?php
          		 // session_destroy();
          		require_once('connect.php');

          		if(isset($_POST['submit'])){
          			$user=trim($_POST['user']);
          			$pass=trim($_POST['pass']);
          			$query = "SELECT id,user,password,dpt FROM login  WHERE user='$user'";
          			$response = @mysqli_query($dbc, $query);
          			if($response)
						{ 
							while($row = mysqli_fetch_array($response)){
								if($pass == $row['password']){
									$dpt = $row['dpt'];
									session_start();
									$_SESSION['dpt']=$dpt;
									$_SESSION['name']=$row['user'];
									if($dpt == 'admin'){ header('location:admin.php'); }
									   else { header('location:user.php'); }
								}
								else{echo '<h4 style="text-align:center;color:red;">Login Failed</h4>';	}
							}
						} 
						else{echo '<h4 style="text-align:center;color:red;">Login Failed</h4>';}
          		}

          	?>

		  	<form method="POST" action="userlogin.php" >
 		 		<input type="text" placeholder="username" name="user" required><br><br>
  				<input type="password" placeholder="password" name="pass" required><br><br>
  				<input type="submit" name='submit' value="Sign in">
  			</form>   
  		</br>
  		</br>
  			<p>If you are new to this site, Create a Sign in ID in Brilliant Student portal for applying to our programmes.</p>       	
  			
  			<p>Welcome! Here is the port of information that you need from the university. Whether your acadamic performance details, time table, exam time table,</p>
	</div>	  							
		
		</div><!--close content_item-->	  
	  
	  </div><!--close content-->
<div class="bottom_footer">
  <p>&copy; Praseed Melethil</p>
</div>
	  
	</div><!--close site_content--> 
 
  <!--close main-->
 
  
  

</body></html>
