<?php
  mysql_connect("ezprint.000webhostapp.com","id3508824_user","mahasiswateknik");
  $db= mysql_select_db("id3508824_login");
  $password=$_POST["password"];
  $username=$_POST["username"];

  if (!empty($_POST)) {
  if (empty($_POST['username']) || empty($_POST['password'])) {
  // Create some data that will be the JSON response
          $response["success"] = 0;
          $response["message"] = "One or both of the fields are empty .";

          //die is used to kill the page, will not let the code below to be executed. It will also
          //display the parameter, that is the json data which our android application will parse to be //shown to the users
          die(json_encode($response));
      }
  $query = " SELECT * FROM login WHERE username = '$username'and password='$password'";

     $sql1=mysql_query($query);
  $row = mysql_fetch_array($sql1);
  if (!empty($row)) {
       $response["success"] = 1;
          $response["message"] = "You have been sucessfully login";
         die(json_encode($response));
  }
  else{

  $response["success"] = 0;
          $response["message"] = "invalid username or password ";
  die(json_encode($response));
  }
  }
  else{

  $response["success"] = 0;
          $response["message"] = " One or both of the fields are empty ";
  die(json_encode($response));
  }

  mysql_close();
  ?>
