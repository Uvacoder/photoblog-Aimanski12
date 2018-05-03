
<?php include("header.php") ?>
<?php include("navbar.php") ?>
<?php include("../includes/function.php") ?>
<?php
if(isset($_COOKIE['id']) && isset($_COOKIE['security'])){
    if(isset($_POST['submit'])){
      $id_user = $_COOKIE['id'];
          $email = $_POST['email'];
            $pwd = $_POST['pwd'];
      $name = addslashes($_POST['username']);
  			$user_result = sort_username($name);
  				if($user_result == 3){
  					$mes_user = " New username must be alphanumeric!";
  				} else {
            $user_result = true;
            $name_new = $name;
          }

      $email = addslashes($_POST['email']);
  			$email_result = sort_email($email);
  			if($email_result == 3){
  				$mes_email = "Please enter a valid email!";
  			} else {
          $email_result = true;
          $email_new = $email;
        }
      $password = addslashes($_POST['pwd']);
        $pwd_result = sort_password($password);
            if($pwd_result == 2){
              $mes_pwd = "New password must be more than 6 characters!";
            } else {
              $pwd_result = true;
                $pwd_new = md5($password);
            }
      if($user_result == 1 && $email_result == 1 && $pwd_result == 1){
        $user_id = user_data($id_user);
          $user_img = $user_id[0][4];
          if( $_FILES['post_image']['size'] !== 0 ){
              $file_name = $_FILES['post_image']['name'];
                $temp_name = $_FILES['post_image']['tmp_name'];
                  $file_location = "img_upload/$file_name";
                      $upload = upload_file($temp_name, $file_name);

              if($upload){
                $update_check = update_user($id_user, $name_new, $email_new, $pwd_new, $file_name);

                  if(!empty($user_img)){
                    unlink("../img_upload/$user_img");
                      }
                }
            } else if( $_FILES['post_image']['size'] == 0 ) {
              if(!empty($user_img)){
                  $update_check = update_user($id_user, $name_new, $email_new, $pwd_new, $user_img);
                } else if (empty($user_img)) {
                  $user_img = "user.png";
                  $update_check = update_user($id_user, $name_new, $email_new, $pwd_new, $user_img);
                }
            }
      }
        $user_data = user_data($id_user);
          $user_name = $user_data[0][1];
            $user_email = $user_data[0][2];
              $user_pwd = $user_data[0][3];
                $user_img = $user_data[0][4];
                  $btn = 'success';
                    $mes_head = 'Changes has been updated in your account. <a href="account.php">View Account</a>';
                      $mes_user = '';
                        $mes_email = '';
                          $mes_pwd = '';
  }

?>
<div class="container">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <div class="message-setter">
        <div class="panel panel-<?php echo $btn; ?>">
          <div class="panel-heading"><?php echo $mes_head; ?></div>
        </div>
      </div>
          <form action="account.php" method="post" enctype="multipart/form-data">
            <div class="form-group img-upload">
              <label for="file">File Image</label>
              <a href=""><img class="thumbnail " src="../img_upload/<?php echo $user_img; ?>"></a>
            </div>
            <div class="form-group">
              <label for="file">Enter New File</label>
              <input type="file" class="form-control-file" name="post_image">
              <small class="form-text text-muted">Please enter (jpg, png, wmnp) file only.</small>
            </div>

            <div class="form-group form-height">
              <label for="title">Username</label>
              <small class="alert small-text"><?php echo $mes_user; ?></small>
              <input type="text" class="form-control" autofocus name="username" value="<?php echo $user_name; ?>" >
            </div>
            <div class="form-group form-height">
              <label for="title">Email</label>
              <small class="alert small-text"><?php echo $mes_email ?></small>
              <input type="email" class="form-control" autofocus name="email" value="<?php echo $user_email; ?>" >
            </div>
            <div class="form-group form-height">
              <label for="title">Password</label>
              <small class="alert small-text"><?php echo $mes_pwd ?></small>
              <input type="password" class="form-control" autofocus name="pwd" value="<?php echo $user_pwd; ?>" >
            </div>
            <!-- <button type="submit" class="btn btn-primary" name="submit">Update Account</button> -->
        </form>
    </div>
    <div class="col-md-3"></div>
  </div>
</div>
<?php } else {
  redirect("../logout.php");
} ?>
<?php include("footer.php") ?>
