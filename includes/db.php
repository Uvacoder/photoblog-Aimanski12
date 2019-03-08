<?php

  $db = new mysqli();

  $db->connect("localhost", "bonbon", "123", "social_media");

  if($db->error){
    echo 'no connection';
  } else {
    echo 'we have connection';
  }

?>
