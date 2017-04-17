<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Main Menu</title>
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700|Archivo+Narrow:400,700" rel="stylesheet" type="text/css">
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>

<div id="header-wrapper">
	<div id="header">
		<div id="logo">
			<h1>Swift Dental Technologies</h1>
			<p>Creating lasting impressions.</p>
		</div>
	</div>
</div>
<div id="wrapper"> 
	<!-- end #header -->
	<div id="page">
	
				<div id="content">
					<div class="post">
			
			
			<span style="font-weight: bold; float: right;">
            <?php
            //Show user that is currently logged in to the system.  
            session_start();
            $cname = $_SESSION['cname'];
            echo "User: " . "<font color='red'>$cname</font>" ?>
            </span>
						
		 <div class="menuPage">				
		<h2 class="title">Main Menu</h2>
		  </div>				
            
          
						
        <form method="post" action="#">
            
   
            <br />
            
            <?php
            // Create connection to db.
            $connection = mysqli_connect('localhost', 'root', '','swift');
            //check connecion
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();}    
           
           
                //new mysqli query
                $mysql_query = "SELECT * FROM `users` WHERE firstName='$cname'";//mysql
                $result = mysqli_query($connection,$mysql_query);//mysqli 
                $user = (mysqli_num_rows($result)==1) ? mysqli_fetch_assoc($result) : null ;
                $count = mysqli_num_rows($result);//not used
                
                //Display buttons
                
                //Admin Button
                if ($user['admin']=='yes'){
                echo '<input class="submit" type="submit" name="admin" value="Administration">'; 
                echo '<br />';}
				echo '<br />';
                //Exit Button
                if ($user['logout']=='yes'){
                echo '<input class="submit" type="submit" name="logout" value="Exit">'; 
                echo '<br />';             
                }
                
            
                  
     
            //MAIN MENU selection
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //checks if menu button was clicked.
    
            if (isset($_POST['logout'])) {
            header("Location: index.php");}
            if (isset($_POST['admin'])) {
            header("Location: admin.php");}
            
            
            }
                ?>
            
            <br />
            <br />    
  
     </form>     
  
 
</body>
</html>

