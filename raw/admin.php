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
						echo '<a href="logout.php"><h1 style="text-align:right;">Logout</h1></a>';
						$dpt=$_SESSION['dpt'];
						}
						else{echo '<h4 style="text-align:center;color:red;"><br><br>Login Failed<br>Login to get acess</h4>';}
          	?>		
          		<div>
          			<div>
          				<h2 style="text-align:center;">ADD STUDENT</h2>
          			<form method="POST" action="admin.php" >
		 		 		<input type="text" placeholder="Studentname" name="name" required><br><br>
						 <select name="dpt">
						    <option value="cse">CSE</option>
						    <option value="ce">CE</option>
						    <option value="eee">EEE</option>
						    <option value="mech">Mech</option>
						  </select><br><br>
		  				<input type="number" placeholder="phone no" name="phone" size ="10" value=""required><br><br>
		  				<input type="submit" name='add_student' value="Add Student">
		  			</form>
		  				<?php 
          	
          					if(isset($_POST['add_student'])){
          						if(empty($_POST['phone']) || strlen($_POST['phone'])!=10 )
									{
									  $data_missing[]='phone_no';
									  echo '<h4 style="text-align:center;color:red;">wrong Phone number</h4>';
									}else{$phone_no=trim($_POST['phone']);
											$name=trim($_POST['name']);
											$dpt=$_POST['dpt'];}
								if(empty($data_missing)){
									require_once('connect.php');
									$query = "INSERT INTO students (name,dpt,id,phone)
  								      VALUES('$name','$dpt',NULL,'$phone_no')";
  								      $response = mysqli_query($dbc, $query);
  								      if($response == 1){
									   echo '<h4 style="text-align:center;color:red;">ADDED SUCESSFULLY</h4>';}
									    mysqli_close($dbc); 
									  }
								}

          				?>
		  			</div>
		  			<br><br>
		  			<div>

		  				<h2 style="text-align:center;">ADD FACULTY</h2>
          			<form method="POST" action="admin.php" >
		 		 		<input type="text" placeholder="Facultyname" name="name" required><br><br>
		  				<select name="dpt">
						    <option value="cse">CSE</option>
						    <option value="ce">CE</option>
						    <option value="eee">EEE</option>
						    <option value="mech">Mech</option>
						  </select><br><br>
		  				<input type="text" placeholder="PassWord" name="password" required><br><br>
		  				<input type="submit" name='add_faculty' value="Add Faculty">
		  			</form>
		  				<?php 
          	
          					if(isset($_POST['add_faculty'])){
          						if(empty($_POST['password']) || strlen($_POST['password']) < 8 )
									{
									  $data_missing[]='password';
									  echo '<h4 style="text-align:center;color:red;">password min 8 letters required</h4>';
									}else{$password=trim($_POST['password']);
											$name=trim($_POST['name']);
											$dpt=$_POST['dpt'];}
								if(empty($data_missing)){
									require_once('connect.php');
									$query = "INSERT INTO login (id,user,password,dpt)
  								      VALUES(NULL,'$name','$password','$dpt')";
  								      $response = mysqli_query($dbc, $query);
  								      if($response == 1){
									   echo '<h4 style="text-align:center;color:red;">ADDED SUCESSFULLY</h4>';}
									    mysqli_close($dbc); 
									  }
								}

          				?>
		  			</div>
		  			<div><br><br>
		  				<div>
		  						<h2 style="text-align:center;">REMOVE STUDENT</h2>
          			<form method="POST" action="admin.php" >
		 		 		<input type="number" placeholder="Student ID" name="s_id" max="20" required><br><br>
		  				<input type="submit" name='remove_student' value="REMOVE">
		  			</form>
		  				<?php 
          	
          					if(isset($_POST['remove_student'])){
          						if(empty($_POST['s_id']) || strlen($_POST['s_id']) > 4 )
									{
									  $data_missing[]='password';
									  echo '<h4 style="text-align:center;color:red;">Valied ID required</h4>';
									}else{$id=trim($_POST['s_id']);}
								if(empty($data_missing)){
									require_once('connect.php');
									$query ="DELETE FROM students WHERE id={$id}";
  								      
  								      if(mysqli_query($dbc,$query) == TRUE){
									   echo '<h4 style="text-align:center;color:red;">REMOVED SUCESSFULLY</h4>';}
									    mysqli_close($dbc); 
									  }
								}

          				?>
		  				</div>
		  				<div><br><br>
		  				<div>
		  						<h2 style="text-align:center;">REMOVE FACULTY</h2>
          			<form method="POST" action="admin.php" >
		 		 		<input type="number" placeholder="Faculty ID" name="f_id" max="20" required><br><br>
		  				<input type="submit" name='remove_faculty' value="REMOVE">
		  			</form>
		  				<?php 
          	
          					if(isset($_POST['remove_faculty'])){
          						if(empty($_POST['f_id']) || strlen($_POST['f_id']) > 4 )
									{
									  $data_missing[]='password';
									  echo '<h4 style="text-align:center;color:red;">Valied ID required</h4>';
									}else{$id=trim($_POST['f_id']);}
								if(empty($data_missing)){
									require_once('connect.php');
									$query ="DELETE FROM login WHERE id={$id}";
  								      
  								      if(mysqli_query($dbc,$query) == TRUE){
									   echo '<h4 style="text-align:center;color:red;">REMOVED SUCESSFULLY</h4>';}
									    mysqli_close($dbc); 
									  }
								}

          				?>
		  				</div>
		  			</div>
          		</div>
          	
  			</br>
  		</br> </br>
  		
  			<div ><p > Welcome . Details of students and faculties Registered Under Department </p></div>
  			
		 </div> 							
		
		</div><!--close content_item-->	  
	  
	  </div><!--close content-->
<div class="bottom_footer">
  <p>&copy; Praseed Melethil</p>
</div>
	  
	</div><!--close site_content--> 
 
  <!--close main-->
 
  
  

</body></html>
