<?php

$connection = mysqli_connect(
  'localhost', 'admin_ingeniot', 'ingeniot2828', 'admin_ingeniot'
);

// for testing connection
#if($connection) {
#  echo 'database is connected';
#}

?>
