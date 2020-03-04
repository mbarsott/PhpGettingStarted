<?php
  //delete.php?id=2
  if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
      $id = $_GET['id'];
  } else {
      header('Location: select.php');
  }
  $db = new mysqli(
      'localhost',
      'php_getting_started_user',
      'php_getting_started_password',
      'php_getting_started'
  );
$sql = "DELETE FROM users WHERE id=$id";
$db->query($sql);
echo '<p>User deleted.</p>';
$db->close();
