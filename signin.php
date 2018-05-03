<?php include("includes/header.php") ?>
<?php include("includes/function.php") ?>
<?php
if(isset($_COOKIE['id']) && isset($_COOKIE['security'])){
	redirect("index.php");
} else {
$message = '';
$user_message = '';
$email_message = '';
$pwd_message = '';
$cookie_message = '';
if(isset($_POST['submit'])){
	if(empty($_POST['user_name']) || empty($_POST['user_email']) || empty($_POST['pwd']) || empty($_POST['pswrd'])){
		$message = ' Please fill all the items!';
	} else {

		$username = addslashes($_POST['user_name']);
			$user_result = sort_username($username);
				if($user_result == 3){
					$user_message = "Username must be alphanumeric!";
				} else if($user_result == 2){
					$user_message = 'Username already exists!';
				}
		$user_email = addslashes($_POST['user_email']);
			$email_result = sort_email($user_email);
			if($email_result == 3){
				$email_message = "Please enter a valid email!";
			} else if($email_result == 2){
				$email_message = 'Email already exists!';
			}
		$password = addslashes($_POST['pwd']);
		$pswrd = addslashes($_POST['pswrd']);
			if($password !== $pswrd){
				$pwd_message = 'Password must be the same!';
			} else {
				$pwd_result = sort_password($password);
					if($pwd_result == 2){
						$pwd_message = "Password must be more than 6 characters!";
					}
			}
			if(($user_result == 1) && ($email_result == 1) && ($pwd_result == 1)){
				$image = "user.png";
				$insert_database = insert_to_database($username, $user_email, $password, $image);
					if($insert_database == 3){
						$message = "There was an error on the database!";
					} else if($insert_database == 2){
						$message = "There was an error in the query!";
					} else {
						set_my_cookie($username, $password);
						echo '<script>window.location.href="index.php"</script>';
					}
			}
	}
}
?>
<div class="container">
	<div class="container">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4 login">
				<h2>Registration</h2>
				<small class="alert small-text"><?php echo $message;?></small>
			  <form action="signin.php" method="post">
				  <div class="form-group form-height">
					 	<label for="username">Username</label>
						<small class="alert small-text"><?php echo $user_message; ?></small>
					  <input type="text" class="form-control" placeholder="Enter username" name="user_name">
				 </div>
				 <div class="form-group form-height">
					 <label for="email">Email</label>
					 <small class="alert small-text"><?php echo $email_message ?></small>
					 <input type="email" class="form-control" placeholder="Enter username" name="user_email">
				 </div>
				 <div class="form-group form-height">
					 <label for="pwd">Password</label>
					 <small class="alert small-text"><?php echo $pwd_message; ?></small>
					 <input type="password" class="form-control" placeholder="Enter password" name="pwd">
				 </div>
				 <div class="form-group form-height btn-gap">
					 <label for="pwd">Re-enter Password</label>
					 <input type="password" class="form-control" placeholder="Re-enter password" name="pswrd">
				 </div>
				 <div class="btn-setter">
 					<div class="btn-one">
						<button type="submit" class="btn btn-primary" name="submit">Register</button>
 					</div>
 					<div class="mes">
 						<p><?php echo $cookie_message; ?></p>
 					</div>
 					<div class="btn-two">
						<a href="login.php" class="btn btn-primary pull-right">Login</a>
 					</div>
 				</div>

			 </form>
		 </div>
		 <div class=;"col-md-4"></div>
	 </div>
</div>
<?php } ?>


<?php include("includes/footer.php") ?>
