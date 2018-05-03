<?php

function redirect($location){
  return header("Location: ". $location);
}


function upload_file($temp_name, $file_name){
    if(move_uploaded_file($temp_name, "../img_upload/$file_name")){
      // echo 'file is uploaded';
      return true;
    } else {
      // echo 'el foto no enviarte';
      return false;
    }
}

function insert_post($id, $title, $comment, $filename, $location){
  $id = addslashes($id);
    $title = addslashes($title);
      $comment = addslashes($comment);
        $filename = addslashes($filename);
          $location = addslashes($location);
  global $db;
    require_once("db.php");
      $sql = " INSERT INTO `post` SET ";
        $sql .= " `post_user_id`='{$id}', ";
          $sql .= " `post_title`='{$title}', ";
            $sql .= " `post_comment`='{$comment}', ";
              $sql .= " `post_image`='{$filename}', ";
                $sql .= " `post_image_location`='{$location}' ";
                  $result = $db->query($sql);
      if($db->error){
        echo 'QUERY FAILED'. mysqli_error($db);
      }
      if(!$result){
        echo 'there was an error';
      } else {
        return true;
      }

      $return->free();
   $db->close();
   return $post_id;
}

function update_post12($post_id, $user_id, $post_title, $post_comment, $file_name, $file_location){
  $db = new mysqli();
    $db->connect("localhost", "bonbon", "123", "social_media");
      $post_id = addslashes($post_id);
        $user_id = addslashes($user_id);
          $post_title = addslashes($post_title);
            $post_comment = addslashes($post_comment);
              $file_name = addslashes($file_name);
                $file_location = addslashes($file_location);
  $sql = "UPDATE `post` SET ";
  $sql .= " `post_user_id`='{$user_id}', ";
  $sql .= " `post_title`='{$post_title}', ";
  $sql .= " `post_comment`='{$post_comment}', ";
  $sql .= " `post_image`='{$file_name}', ";
  $sql .= " `post_image_location`='{$file_location}' ";
  $sql .= " WHERE `post_id`=$post_id ";
    $result = $db->query($sql);

        if($db->error){
          return 'false';
        } else {
          return true;
        }
    $return->free();
  $db->close();
}


function update_user($id, $name, $email, $pwd, $file){

  $db = new mysqli();
    $db->connect("localhost", "bonbon", "123", "social_media");
  $sql = "UPDATE `user` SET ";
  $sql .= " `user_name`='{$name}', ";
  $sql .= " `user_email`='{$email}', ";
  $sql .= " `user_password`='{$pwd}', ";
  $sql .= " `user_image`='{$file}' ";
  $sql .= " WHERE `user_id`=$id ";
    $result = $db->query($sql);

        if($db->error){
          return 'false';
        } else {
          return true;
        }
    // $return->free();
  $db->close();
}

function get_id_post(){
  global $db;
  require_once("db.php");
    $id = $db->insert_id;
      return $id;
    $db->close();
}

function sort_username($username){
  global $db;
  $pattern = "/([A-Za-z]+[0-9]|[0-9]+[A-Za-z])[A-Za-z0-9]*/";
    if(!preg_match($pattern, $username)){
      return 3;
    } else {
      require_once("db.php");
        $sql = " SELECT * FROM `user` WHERE `user_name`='{$username}' ";
          $result = $db->query($sql);
            if($db->error){
              echo 'QUERY FAILED'. mysqli_error($db);
            }
            if(!$result->num_rows == 0){
              return 2;
            } else {
              return 1;
            }
        $result->free();
          $db->close();
          }
       }

function sort_email($user_email){
  global $db;
  $pattern = "/^\w+((-\w+)|(\.\w+))*\@[A-Za-z-0-9]+((\.|-)[A-Za-z-0-9]+)*\.[A-Za-z-0-9]+$/";
    if(!preg_match($pattern, $user_email)){
      return 3;
    } else {
      require_once("db.php");
        $sql = " SELECT * FROM `user` WHERE `user_email`='{$user_email}' ";
          $result = $db->query($sql);
            if($db->error){
              echo 'QUERY FAILED'. mysqli_error($db);
            }
            if(!$result->num_rows == 0){
              return 2;
            } else {
              return 1;
            }
        $result->free();
          $db->close();
    }
}

function sort_password($password){
   $pattern = "/^.{6,20}$/";
     if(!preg_match($pattern, $password)){
       return 2;
     } else {
       return 1;
     }
}

function insert_to_database($username, $email, $password, $image){
  $password = md5($password);
  global $db;
    require_once("db.php");
      $sql = " INSERT INTO `user` SET ";
      $sql .= " `user_name`='{$username}', ";
      $sql .= " `user_email`='{$email}', ";
      $sql .= " `user_password`='{$password}', ";
      $sql .= " `user_image`='{$image}' ";
        $result = $db->query($sql);
        var_dump(mysqli_error($db));
          if($db->error){
            return 3;
          } else if(!$result){
            return 2;
          } else {
            return 1;
          }
          $result->free();
            $db->close();
      }

function set_my_cookie($username, $password){
  global $db;
  require_once("db.php");
    $id = $db->insert_id;
      setcookie("id", $id,0,"/");
        $security = md5($username.$password."two_plus_two");
      setcookie("security",$security,0,"/");
  $db->close();
  var_dump($_COOKIE);
}

function set_this_cookie($id, $password){
    setcookie("id", $id,0,"/");
      $security = md5($id.$password."two_plus_two");
        setcookie("security",$security,0,"/");
}

function find_user($id){
  global $db;
    require_once("db.php");
      $sql = " SELECT * FROM `user` WHERE `user_id`='{$id}' ";
        $return = $db->query($sql);
          $array = $return->fetch_array();
        $name = $array['user_name'];
        $return->free();
      $db->close();
  return $array['user_name'];
}


function login_user($username, $pwd){
  global $db;
  $username = addslashes($username);
    $pwd = addslashes($pwd);
  $pattern = "/^\w+((-\w+)|(\.\w+))*\@[A-Za-z-0-9]+((\.|-)[A-Za-z-0-9]+)*\.[A-Za-z-0-9]+$/";
    if(preg_match($pattern, $username)){
      $email_check = sorter_email($username, $pwd);
    } else {
      $email_check = sorter_user($username, $pwd);
    }
    return $email_check;
}


function sorter_email($email, $pwd){
  global $db;
    require_once("db.php");
      $sql = " SELECT * FROM `user` WHERE `user_email`='{$email}' ";
        $result = $db->query($sql);
          if($result->num_rows == 0){
            return false;
          } else {
            $array = $result->fetch_array();
              if(md5($pwd) == $array['user_password']){
                set_this_cookie($array['user_id'], $array['user_password']);
                return 1;
              } else {
                return 2;
              }
           }

        $result->free();
    $db->close();
}

function sorter_user($user, $pwd){
  global $db;
    require_once("db.php");
      $sql = " SELECT * FROM `user` WHERE `user_name`='{$user}' ";
        $result = $db->query($sql);
          if($result->num_rows == 0){
      return false;
          } else {
            $array = $result->fetch_array();
              if(md5($pwd) == $array['user_password']){
                set_this_cookie($array['user_id'], $array['user_password']);
        return 1;
              } else {
          return 2;
              }
           }
}

// this will return the photo
function edit_data($post_id){
  global $db;
  require_once("db.php");
    $sql = "SELECT * FROM `post` WHERE `post_id`='{$post_id}' ";
      $result = $db->query($sql);
        $array = $result->fetch_array();
      $result->free();
    $db->close();
  return $array;
}




function data_edit($post_id){
  global $db;
  require_once("db.php");
    $sql = "SELECT * FROM `post` WHERE `post_id`='{$post_id}' ";
      $result = $db->query($sql);
        $array = $result->fetch_array();
      $result->free();
    $db->close();
  return $array;
}




function comment_data($post_id){
  $db = new mysqli();
    $db->connect("localhost", "bonbon", "123", "social_media");
    $sql = "SELECT * FROM `comments` WHERE `post_id`='{$post_id}' ";
      $result = $db->query($sql);
      $array_setter = []  ;
        while($array = $result->fetch_array()){
            $user_data = user_value($array['user_id']);
              foreach ($user_data as $key) {
                array_push($array, $key);
              }
            // var_dump($array);
          array_push($array_setter, $array);
        }
      $result->free();
    $db->close();
    return $array_setter;
}

function user_value($post_id){
  $db = new mysqli();
    $db->connect("localhost", "bonbon", "123", "social_media");
    $sql = "SELECT * FROM `user` WHERE `user_id`='{$post_id}' ";
      $result = $db->query($sql);
      $array_setter = [];
        while($array = $result->fetch_array()){
          array_push($array_setter, $array['user_name']);
          array_push($array_setter, $array['user_image']);
        }
      $result->free();
    $db->close();
    return $array_setter;
}



function get_comments($id){
  $db = new mysqli();
    $db->connect("localhost", "bonbon", "123", "social_media");
    $sql = "SELECT * FROM `comments` WHERE `comment_id`='{$id}' ";
      $result_set = $db->query($sql);
      $array_set = [];
        while($array = $result_set->fetch_array()){
          array_push($array_set, $array['comment_id']);
          array_push($array_set, $array['user_id']);
          array_push($array_set, $array['comment_title']);
          array_push($array_set, $array['comment_time']);
          array_push($array_set, $array['comments']);
        }
      // $result->free();
    $db->close();
    return $array_set;
}

function update_comments($id, $title, $comment){
  $db = new mysqli();
    $db->connect("localhost", "bonbon", "123", "social_media");
      $sql = "UPDATE `comments` SET ";
      $sql .= " `comment_title`='{$title}', ";
      $sql .= " `comments`='{$comment}' ";
      $sql .= " WHERE `comment_id`=$id ";
        $result = $db->query($sql);
}

function user_data($post_id){
  $db = new mysqli();
    $db->connect("localhost", "bonbon", "123", "social_media");
    $sql = "SELECT * FROM `user` WHERE `user_id`='{$post_id}' ";
      $result = $db->query($sql);
      $array_setter = []  ;
        while($array = $result->fetch_array()){
          array_push($array_setter, $array);
        }
      $result->free();
    $db->close();
    return $array_setter;
}




function delete_post($id, $image){
  $db = new mysqli();
    $db->connect("localhost", "bonbon", "123", "social_media");
      $sql = " DELETE FROM `post` WHERE `post_id`='{$id}' ";
        $delete_id = $db->query($sql);
          $value = $delete_id;
      // $delete_id->free();
    $db->close();
    unlink("img_upload/$image");
  return $value;
}


function insert_items($user, $id, $title, $time, $comment){
  $db = new mysqli();
    $db->connect("localhost", "bonbon", "123", "social_media");
      $sql = " INSERT INTO `comments` SET `user_id`='{$user}', `post_id`='{$id}', `comment_title`='{$title}', `comment_time`='{$time}', `comments`='{$comment}' ";
        $result = $db->query($sql);
        if($result){
          return true;
        } else {
          echo mysqli_error($db);
        }
        $result->free();
    $db->close();
}

function delete_comment($id){
  $db = new mysqli();
    $db->connect("localhost", "bonbon", "123", "social_media");
      $sql = " DELETE FROM `comments` WHERE `comment_id`='{$id}' ";
        $comment_del = $db->query($sql);

        // $comment_del->free();
    $db->close();
return $comment_del;
}














?>
