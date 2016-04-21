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
			  	
			<?php
          		require_once('connect.php');
          			session_start();
					if(isset($_SESSION['dpt'])){
						$user = $_SESSION['name'];
						echo '<h1 style="text-align:center;">Welcome '.$user.'</h1>';
						echo '<a href="admin.php"><h1 style="text-align:right;">Back</h1></a>';
						$dpt=$_SESSION['dpt'];
						echo '<h1 style="text-align:center;">STUDENTS </h1><br>';
	          			$query = "SELECT * FROM students ";
	          			$response = @mysqli_query($dbc, $query);
	          			if($response)
							{
								echo '<table border=".1" align="middle" cellspacing="5" 
							      cellpadding="8" >
								   <tr ><td class="row" align = "left"><b>STUDENT_ID</b></td>
								   <td class="row" align = "left"><b>NAME</b></td>
								   <td class="row" align = "left"><b>DEPARTMENT</b></td>
								   <td class="row" align = "left"><b>PHONE_NO</b></td></tr>';
							while($row = mysqli_fetch_array($response)){
							 echo '<tr><td align="left">'.$row['id'].
							     '</td><td align ="left">'.$row['name'].
								 '</td><td align ="left">'.$row['dpt'].
								 '</td><td align ="left">'.$row['phone'].'</tr>';
							}	
							 echo '</table>';  
							}
							else{echo '<h4 style="text-align:center;color:red;"><br><br><br>Login Failed</h4>';}
						}
						echo '<h1 style="text-align:center;">FACULTY </h1><br>';
						$query = "SELECT * FROM login ";
	          			$response = @mysqli_query($dbc, $query);
	          			if($response)
							{
								echo '<table border=".1" align="middle" cellspacing="5" 
							      cellpadding="8" >
								   <tr ><td class="row" align = "left"><b>FACULTY_ID</b></td>
								   <td class="row" align = "left"><b>NAME</b></td>
								   <td class="row" align = "left"><b>PASSWORD</b></td>
								   <td class="row" align = "left"><b>DEPARTMENT</b></td></tr>';
							while($row = mysqli_fetch_array($response)){
							 echo '<tr><td align="left">'.$row['id'].
							     '</td><td align ="left">'.$row['user'].
							     '</td><td align ="left">'.$row['password'].
								 '</td><td align ="left">'.$row['dpt'].'</tr>';
							}	
							 echo '</table>';  
							}
							else{echo '<h4 style="text-align:center;color:red;"><br><br><br>Login Failed</h4>';}
						

          	?>		
          	
  			</br>
  		</br> </br>
  			<p > Welcome . Details of students and faculties Registered Under Department </p>
	</div>	  							
		
		</div><!--close content_item-->	  
	  
	  </div><!--close content-->
<div class="bottom_footer">
  <p>&copy; Praseed Melethil</p>
</div>
	  
	</div><!--close site_content--> 
 
  <!--close main-->
 
  
  

</body></html>
