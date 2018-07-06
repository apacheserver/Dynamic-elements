<?php
  //this page can update all the data from database by requested id
  require_once "inc/dbConnect.php";
  $Id = $_REQUEST['id'];
  $name = $_REQUEST['name'];
  $email = $_REQUEST['email'];
  $newId = $_REQUEST['newId'];
  $dbh = "SELECT * FROM `reg_user` WHERE `user_id`= '$newId'";
  $value = mysqli_query($conn, $dbh);
  mysqli_num_rows($value);
  if(mysqli_num_rows($value) != 1 || $Id == $newId){
    $query = "UPDATE `reg_user` SET `user_id` = '$newId', `user_name` = '$name', `user_email` = '$email' WHERE `user_id` = '$Id'";
    $run = mysqli_query($conn, $query);
    $result = array();
    if($run){
      $sql = "SELECT * FROM `reg_user` WHERE `user_id`= '$newId'";
      $temp = mysqli_query($conn, $sql);
      while($val = mysqli_fetch_assoc($temp)){
        $result['id'] = $val['user_id'];
        $result['name'] = $val['user_name'];
        $result['email'] = $val['user_email'];
      }
      echo json_encode($result);
    }
  }else{
    echo 1;
  }

  ?>
