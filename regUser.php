<?php
  //this page can receive data from join form and it can insert data in data base
  require_once("inc/dbConnect.php");
  echo $email = $_POST['email'];
  echo $name = $_POST['name'];
  echo $query = ("INSERT INTO `reg_user`(`user_name`, `user_email`) VALUES('$name', '$email')");
  $run = mysqli_query($conn, $query);
  if($run){
    $sql = ("SELECT * FROM `reg_user`");
    $res = mysqli_query($conn, $sql);
    if(mysqli_num_rows($res) > 0){
      $sql = "SELECT * FROM `reg_user` ORDER BY `user_id` DESC LIMIT 1";
      $run = mysqli_query($conn, $sql);
      $result = array();
      if($run){
        while($row = mysqli_fetch_array($run)){
          $result["name"] = $row['user_name'];
          $result["id"] = $row['user_id'];
          $result["email"] = $row['user_email'];
        }
          echo json_encode($result);
      }
    }else{
      echo "Insertion failed";
    }
  }

?>
