<!--Assignment #3, Question #3-->
<!--Written by: Sagar Patel ID:40029417-->
<!--For SOEN 287-W - Winter 2017-->
<!--Page when user clicks login, asks for username and password and when user presses submit, the inputs are verified using PHP to catch any incorrect input, if there is an issue an alert is shown and the user
must reenter their information, if valid, the code opens the file containing login info and goes through every line to check whether the account is on record, if not a new account is created and written to the file(user is then redirected to register page),
if it is an account the user is redirected back to Main Search with a welcome message-->
<?php include('header.php'); session_start();?>
	<h1>Login</h1>
	<form method="post">
		Username: <br />
		<input type="text" name="username"> <br />
		Can only contain letters (both upper and lower case) and digits <br />
		Password: <br />
		<input type="password" name="pw"> <br />
		Must be at least 4 characters long (characters are to be letters and digits only), and must have at least one letter and at least one digit. <br />
		<input type="submit" value="Login" name="submit"> <br />
	</form>
<?php include('footer.php'); ?>
<?php 
	
	if(isset($_POST['submit'])) {
		
		$valid = 0;
		if(preg_match('/[^A-Za-z0-9]+/', $_POST['username']) || strlen($_POST['username']) == 0) {
			echo("<script type='text/javascript'>alert('Username can only contain letters and digits!');</script>");
		} else if(strlen($_POST['pw']) < 4 || preg_match('/[^A-Za-z0-9]+/', $_POST['pw'])) {
			echo("<script type='text/javascript'>alert('Password can only contain letters and digits and must be at least 4 characters!');</script>");
		} else if(!preg_match('/\d/', $_POST['pw']) || !preg_match('/[A-Z]/i', $_POST['pw'])) {
			echo("<script type='text/javascript'>alert('Password must contain at least 1 letter and at least 1 digit!');</script>");
		} else {
			$valid = 1;
		}			
	}
	if($valid==1) {
			
	$username = $_POST['username'];
	$password = $_POST['pw'];
	
	$file = fopen("logins.txt", "r");
	
	$register = 0;
	while($info = fgets($file)) {
		
		$info = trim($info);
		$temp = explode(';', $info);
	
		if(($username==$temp[0])&&($password==$temp[1])) {
			$register = 1;
			$_SESSION['loginuser'] = $username;
			header("Location:SearchPage.php");
		} else if(($username==$temp[0])&&($password!=$temp[1])) {
			$register = 1;
			echo("<script type='text/javascript'>alert('Invalid Login');</script>");
		} 
	}
	if($register == 0) {
		fclose($file);
		$_SESSION['loginuser'] = $username;
		$write = fopen("logins.txt", "a");
		fwrite($write, $username . ";" . $password . PHP_EOL);
		fclose($write);
		header("Location:register.php");
	}
	
	}
	
?>