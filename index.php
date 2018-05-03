<?php include("includes/header.php") ?>
<?php include("includes/function.php") ?>
<?php

  if(isset($_COOKIE['id']) && isset($_COOKIE['security'])){
    $default = 'default';
      $message = 'All Post Here!';

    if(isset($_POST['delete'])){
      $id = $_POST['delete_post'];

        $data = edit_data($id);
        $delete_post = delete_post($data['post_id'], $data['post_image'] );
      if($delete_post){
        $default = 'success';
          $message = 'Post has been deleted!';
      }
    }

    include("includes/navbar.php");
      // global $db;
      //   require_once("includes/db.php");
        $db = new mysqli();
          $db->connect("localhost", "bonbon", "123", "social_media");
          $sql1 = "SELECT * FROM `post` ";
            $post_items = $db->query($sql1);
?>
<div class="container">
  <div class="row">
    <div class="w3-container">
        <div class="message-setter">
          <div class="panel panel-<?php echo $default; ?>">
            <div class="panel-heading"><?php echo $message; ?></div>
          </div>
        </div>
        <?php
        while($array = $post_items->fetch_array()){
          $post_id = $array['post_id'];
          $post_title = $array['post_title'];
          $post_comment = $array['post_comment'];
          $post_image = $array['post_image'];
      ?>
        <div class="col-md-4 display-background">
            <h2><?php echo $post_title; ?></h2>
                <div class="w3-card-4 cards-bkg" style="width:100%">
                  <a href="links/comments.php?post_id=<?php echo $post_id; ?>"><img class="thumbnail" src="img_upload/<?php echo $post_image; ?>"></a>
                  <p class="card-text"><?php echo $post_comment; ?></p>
                  <form action="index.php" method="post">
                    <input type="hidden" name="delete_post" value="<?php echo $post_id; ?>">
                    <button type="submit" class="btn btn-danger pull-left" name="delete">Delete Post</button>
                  </form>
                <a href="./links/edit.php?post_id=<?php echo $post_id; ?>" class="btn btn-primary pull-right">Edit Post</a>
              </div>
        </div>
          <?php } ?>
      </div>
  </div>
</div>
<?php
    $post_items->free();
  $db->close();
} else { redirect("logout.php"); }  ?>
<?php include("includes/footer.php") ?>
