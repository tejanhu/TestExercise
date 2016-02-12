<?php



 $app_info = file_get_contents("http://localhost/hussain/MainWork/API/api.php?action=get_app&id=10");
  $app_info = json_decode($app_info, true);

  print_r($app_info);


  echo "<br><br><br>";

  // echo $app_info[0]['title'];




?>