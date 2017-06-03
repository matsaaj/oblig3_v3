<?php
  header('Content-type: application/json');
  require_once('dbconfig.php');

  $email = $_REQUEST['email'];

  $sql = 'SELECT COUNT(*) FROM users WHERE email = :email';
  $stmt = $db->prepare($sql);
  $stmt->bindparam(':email', $email);
  $stmt->execute();
  $exist = ($stmt->fetchColumn() > 0) ? false : true;

  echo json_encode($exist);

?>
