
<?php include("header.php") ?>
<?php include("navbar.php") ?>
<?php include("../includes/function.php") ?>
<?php
if(isset($_COOKIE['id']) && isset($_COOKIE['security'])){

      if(isset($_COOKIE['id'])){
        $id = $_COOKIE['id'];
          $user_id = user_data($id);
            $user_name = $user_id[0][1];
              $user_email = $user_id[0][2];
                $user_pwd = $user_id[0][3];
      if(empty($user_id[0][4])){
        $user_img = 'user.png';
          } else {
            $user_img = $user_id[0][4];
            }
      $btn = 'default';
        $mes_head = 'Your Account Details';
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
          <form action="account_update.php" method="post" enctype="multipart/form-data">
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
            <button type="submit" class="btn btn-primary" name="submit">Update Account</button>
        </form>
    </div>
    <div class="col-md-3"></div>
  </div>
</div>
<?php } else {
  redirect("../logout.php");
} ?>
<?php include("footer.php") ?>
