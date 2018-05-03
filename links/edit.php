
<?php include("header.php") ?>
<?php include("navbar.php") ?>
<?php include("../includes/function.php") ?>
<?php

if(isset($_COOKIE['id']) && isset($_COOKIE['security'])){
    if(isset($_POST['submit'])){
      // setcookie("post_id",$post_id,0,"/");
      $post_id = $_COOKIE['post_id'];
      $data = edit_data($post_id);
      $delete_id = $post_id;
      $user_id = $_COOKIE['id'];
      $image = $data['post_image'];


  if($_FILES['post_image']['error'] == 1 || empty($_POST['post_title']) || empty($_POST['post_comment']) ){
          $message = 'please fill all the forms';
          } else {
                  $post_title = $_POST['post_title'];
                    $post_comment = $_POST['post_comment'];

        if( $_FILES['post_image']['size'] !== 0 ){
          $file_name = $_FILES['post_image']['name'];
            $temp_name = $_FILES['post_image']['tmp_name'];
              $file_location = "img_upload/$file_name";
                  $upload = upload_file($temp_name, $file_name);

                    if($upload){
                      $update_check = update_post12($post_id, $user_id, $post_title, $post_comment, $file_name, $file_location);
                        unlink("../img_upload/$image");
                        if($update_check){
                          // $post_id = get_id_post();
                          $message = "Post has been updated! <a href='../index.php'>View Post</a>";
                            $default = 'success';
                              $post_image = $file_name;
                                $post_title = $post_title;
                                  $post_comment = $post_comment;
                          }
                        }
        } else {
            $file_name = $data['post_image'];
            $file_location = "img_upload/$file_name";

        $update_check = update_post12($post_id, $user_id, $post_title, $post_comment, $file_name, $file_location);
          if($update_check){
            // $post_id = get_id_post();
            $message = "Post has been updated! <a href='../index.php'>View Post</a>";
              $default = 'success';
                $post_image = $file_name;
                  $post_title = $post_title;
                    $post_comment = $post_comment;
            }
        }
      }
    }
//  GET ID
if(isset($_GET['post_id'])){
    $post_id = $_GET['post_id'];
    setcookie("post_id",$post_id,0,"/");
    $message = 'Edit Post Here';
    $default = 'default';

    $data = edit_data($post_id);
    $delete_id = $data['post_id'];
    $post_image = $data['post_image'];
    $post_title = $data['post_title'];
    $post_comment = $data['post_comment'];
}

?>
<div class="container">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <div class="message-setter">
        <div class="panel panel-<?php echo $default; ?>">
          <div class="panel-heading"><?php echo $message; ?></div>
        </div>
      </div>
          <form action="edit.php" method="post" enctype="multipart/form-data">
            <div class="form-group img-upload">
              <label for="file">File Image</label>
              <a href=""><img class="thumbnail " src="../img_upload/<?php echo $post_image; ?>"></a>
            </div>
            <div class="form-group">
              <label for="file">Enter New File</label>
              <input type="file" class="form-control-file" name="post_image">

              <small class="form-text text-muted">Please enter (jpg, png, wmnp) file only.</small>
            </div>
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" autofocus name="post_title" value="<?php echo $post_title; ?>" >
              <small class="form-text text-muted">Title must be less than 20 characters.</small>
            </div>
            <div class="form-group">
              <label for="comments">Comments</label>
              <textarea class="form-control" rows="3" name="post_comment"><?php echo $post_comment; ?></textarea>
              <small class="form-text text-muted">Comments with violent contents will be removed.</small>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Update Post</button>
            <a href="../index.php" class="btn btn-primary pull-right">Main Page</a>
        </form>
    </div>
    <div class="col-md-3"></div>
  </div>
</div>
<?php } else {
  redirect("../logout.php");
} ?>
<?php include("footer.php") ?>
