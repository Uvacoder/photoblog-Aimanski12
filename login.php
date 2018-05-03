<?php include("includes/header.php") ?>
<?php include("includes/function.php") ?>
<?php
$login_message = '';
	$user_message = '';
		$pwd_message = '';
			$cookie_message = '';
if(isset($_COOKIE['id']) && isset($_COOKIE['security'])){
	$id = $_COOKIE['id'];
		$cookie_name = find_user($id);
			$cookie_message = "Login as <a href='index.php'>".$cookie_name."</a>";
}
	if(isset($_POST['submit'])){
		if(empty($_POST['user_name']) || empty($_POST['pwd'])){
			$login_message = 'Please fill all the items';
		} else {
			$user_name = $_POST['user_name'];
			$pwd = $_POST['pwd'];
				$login =	login_user($user_name, $pwd);
					if($login == 2){
						$pwd_message = 'Incorrect password !';
					} else if($login == 0){
						$user_message = 'Username / Email does not exists !';
					} else if($login == 1){
						redirect('index.php');
					}
		}
}
?>
<div class="container">
	<div class="container">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4 login">
				<h2>Login</h2>
				<small class="alert"><?php echo $login_message;?></small>
			  <form action="login.php" method="post">
				  <div class="form-group form-height">
					 	<label for="username">Username or Email</label>
					  <input type="text" class="form-control" placeholder="Username or Email" name="user_name">
						<small class="alert"><?php echo $user_message; ?></small>
				 </div>
				 <div class="form-group form-height btn-gap">
					 <label for="username">Password</label>
					 <input type="password" class="form-control" placeholder="Password" name="pwd">
					 <small class="alert"><?php echo $pwd_message; ?></small>
				</div>
				<div class="btn-setter">
					<div class="btn-one">
						<button type="submit" class="btn btn-primary" name="submit">Login</button>
					</div>
					<div class="mes">
						<p><?php echo $cookie_message; ?></p>
					</div>
					<div class="btn-two">
						<a href="signin.php" class="btn btn-primary pull-right">Sign In</a>
					</div>
				</div>
			 </form>
		 </div>
		 <div class="col-md-4"></div>
	 </div>
</div>
<?php include("includes/footer.php") ?>
