<!--
  data: 19/06/2018
  devoloper: shubham
  prject: we can work on PHP assingnment
-->
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Join us</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <style media="screen">
      input[type=text], input[type=email]{
        padding: 8px 16px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <form class="col-sm-12 center-block" id="form" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1"><h2>Join us</h2></label>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">User Name <small><span id="error"></span></small> </label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter user name">
            </div>
            <div class="form-group">
              <input type="email" class="form-control" id="email" name="email" placeholder="example@email.com">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
          <hr>
          <table  class="table">
            <thead>
              <tr>
                <th scope="col">User_id</th>
                <th scope="col">User Name</th>
                <th scope="col">User_email</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody id="result" >
              <?php
                  require_once("inc/dbConnect.php");
                  $query = ("SELECT * FROM `reg_user` ORDER BY `user_id` DESC");
                  $result = mysqli_query($conn, $query);
                  if(mysqli_num_rows($result) > 0):
                    while($row = mysqli_fetch_assoc($result)):
               ?>
               <tr id="row_<?php echo $row['user_id']; ?>">
                 <th scope='row'>
                   <input type="text" id="id_<?php  echo $row['user_id']; ?>" name="id" style="border:none; background-color:#fff;" disabled="true" value="<?php echo $row['user_id']; ?>">
                 </th>
                 <td>
                   <input  id="user_<?php  echo $row['user_id']; ?>" style="border:none; background-color:#fff;" disabled="true" type="text" name="name" value="<?php echo $row['user_name']; ?>">
                 </td>
                 <td>
                   <input  id="user_email_<?php  echo $row['user_id']; ?>" style="border:none; background-color:#fff;" disabled="true" type="text" name="email" value="<?php echo $row['user_email']; ?>">
                 </td>
                 <td>
                   <button id="edit_<?php  echo $row['user_id']; ?>" onclick="getId(this)" type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter"  value="<?php echo $row['user_id']; ?>">Edit
                   </button>
                  <button id="update_<?php  echo $row['user_id']; ?>" style="display:none;" onclick="update(this)" type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter"  value="<?php echo $row['user_id']; ?>">update
                  </button>
                  </td>
                 <td>
                   <a href="delete.php?id=<?php echo $row['user_id']; ?>">
                     <button type="button" class="btn btn-danger">Delete</button>
                   </a>
                 </td>
               </tr>
               <?php
                    endwhile;
                  endif;
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      function getId(event){
        //this function can change the state of requesated row
        var Id = event.value;
        var Name = document.getElementById("user_"+Id).value;
        var editButton = document.getElementById("edit_"+Id).style.display="none";
        var updateButton = document.getElementById("update_"+Id).style.display = "block";
        var row = document.getElementById("row_"+Id);
        row.style.boxShadow = "1px 1px 20px 1px #ccc";
        document.getElementById("user_"+Id).disabled = false;
        document.getElementById("id_"+Id).disabled = false;
        document.getElementById("user_email_"+Id).disabled = false;
        document.getElementById("id_"+Id).style.border = "1px solid #ccc";
        document.getElementById("user_"+Id).style.border = "1px solid #ccc";
        document.getElementById("user_email_"+Id).style.border = "1px solid #ccc";
      }
      function update(event){
        //this function can update the value of requesated row
        var Id = event.value;
        console.log(Id);
        var newId = document.getElementById("id_"+Id).value;
        var Name = document.getElementById("user_"+Id).value;
        var email = document.getElementById("user_email_"+Id).value;
        var editButton = document.getElementById("edit_"+Id).style.display="block";
        var updateButton = document.getElementById("update_"+Id).style.display = "none";
        var row = document.getElementById("row_"+Id);
        row.style.boxShadow = "none";
        document.getElementById("user_"+Id).disabled = true;
        document.getElementById("id_"+Id).disabled = true;
        document.getElementById("user_email_"+Id).disabled = true;
        document.getElementById("user_"+Id).style.border = "none";
        document.getElementById("id_"+Id).style.border = "none";
        document.getElementById("user_email_"+Id).style.border = "none";
        var path ="update.php?id="+Id+"&newId="+newId+"&name="+Name+"&email="+email;
        console.log(path);
        $.ajax({
          // this is send the data from post method..
          url : path,
          type : "POST",
          dataType : 'json',
          success: function(data){
            if(data == 1){
              alert(" already exist try some unique id");
              location.reload(true);
            }else{
              var new_row =
              "<th scope='row'><input type='text' id='id_"+data.id+"' name='id' style='border:none; background-color:#fff;' disabled='true' value='"+data.id+"'></th><td><input id='user_"+data.id+"' style='border:none; background-color:#fff;' disabled='true' type='text' name='name' value='"+data.name+"'></td><td><input id='user_email_"+data.id+"' style='border:none; background-color:#fff;' disabled='true' type='text' name='email' value='"+data.email+"'></td><td><button id='edit_"+data.id+"' onclick='getId(this)' type='button' class='btn btn-success' data-toggle='modal' data-target='#exampleModalCenter' value='"+data.id+"'>Edit</button><button id='update_"+data.id+"' style='display:none;' onclick='update(this)' type='button' class='btn btn-success' data-toggle='modal' data-target='#exampleModalCenter' value='"+data.id+"'>update</button></td><td><a href='delete.php?id="+data.id+"'><button type='button' class='btn btn-danger'>Delete</button></a></td>";
              $("#"+row).html(new_row);
            }
          }
        });
      }
      $("#form").submit(function(){
        //if the form can be submited, all data can send `regUser.php` page by ajax call
        var Name = $("#name").val();
        var Email = $("#email").val();
        if(Name == "" || Email == ""){
          $("#error").show().text("All field required").delay(5000).hide(100);
        }else{
          $.ajax({
            type: "POST",
            url: "regUser.php",
            dataType : 'json',
            data:{name: Name, email: Email},
            success: function(data){
              $("#form")[0].reset();
              location.reload(true);
              alert(data);
            }
          });
        }
      });
    </script>
  </body>
</html>
