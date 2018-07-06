<?php
  //we can donnig deletion by help of this query
  require_once("inc/dbConnect.php");
  $id = $_REQUEST['id'];
  // the deletion sql query
  $query = ("DELETE FROM `reg_user` WHERE `user_id` = '$id'");
  $result = mysqli_query($conn, $query);
  if($result){
    echo "<script>alert('{$id} deleted success')</script>";
    echo "<script>window.open('index.php','_self');</script>";
  }else{
      echo "<script>alert('Deletion failed')</script>";
  }
?>
