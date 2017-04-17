<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Login Page</title>
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
          	
            <h2 class="title">Please Login</h2>
            <div class="loginPage">
            <form method="post" action="index.php">    
                <table>
                    <tr>
                    <td align="right" >User Name:</td>
                    <td align="left"><input type="text" name="userName" value="" size="20" /></td> 
                    </tr>
	    <br /> 
                    <tr>
                    <td align="right" >Practice No: </td>
                    <td align="left"><input type="text" name="pracNo" size="20" value="" /></td>
                    </tr>
                    <br /> 
                    <tr>
                    <td align="right" >Password: </td>
                    <td align="left"><input type="password" name="password" size="20" value="" /></td>
                    </tr>
                </table>
            </div>
            <br /> 
            <br />
            <div id="button">
            <input class="submit" type="submit" name="submit" value="Login">
            </div>
            <br />
               
   <?php
    //checks if Submit button was clicked.
    if (isset($_POST['submit'])) {
        // Create connection to db.
        $connection = mysqli_connect('localhost', 'root', '','swift');
        //check connecion
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();}
        
    //Start session
    session_start();
    // username and password sent from form     
    $userName=$_POST['userName'];
    $pracNo=$_POST['pracNo'];
    $password=$_POST['password'];
    //session username set
  
    // To protect MySQL injection
    $userName = stripslashes($userName);
    $password = stripslashes($password);
    $pracNo = stripslashes($pracNo);
   
    //new mysqli query
    $mysql_query = "SELECT * FROM `users` WHERE firstName='$userName' and pracNo='$pracNo' and password='$password'";//mysql
    $result = mysqli_query($connection,$mysql_query);//mysqli 
    $count = mysqli_num_rows($result);
    //If the posted values are equal to the database values, then session will be created for the user.
    if ($count == 1){
    //set username in a session
    $_SESSION['cname'] = $userName; 
    header("location: mainMenu.php");}
    else{
    echo "<br />";    
    echo "<font color='red'>Invalid login credentials! </font>";
    echo "<font color='red'>Please try again...</font>";}
    
     mysqli_close($connection);
    }
    ?>
     </form>
    
    <br /> 
    <div id="footer">
	<p>&copy; Design by Stuart Wilson</p>
    </div>

</body>
</html>
