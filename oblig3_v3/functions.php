<?php
  session_start();
  include_once('dbconfig.php');

  //Redirect page function
  function redirect($target) {
    header('Location: ' . $target);
    die();
  }

  if(isset($_POST['logout'])) {
    session_destroy();
    redirect('index.php');
  }

  // User is logged in
  if (isset($_SESSION['user_session'])) {
    $userId = $_SESSION['user_session'];
    $stmt = $db->prepare("SELECT firstname, surname, email FROM users WHERE id = :uid");
    $stmt->execute(array(':uid' => $userId));
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    // Include navbar for logged in users
    include_once('layouts/user_menu.php');
  } else { // User is not logged in
    if ( basename($_SERVER['PHP_SELF']) !== 'index.php' ) {
      // If guest user is not on homepage(index.php), redirect to it
      redirect('index.php');
    }
    // Include navbar for guest users
    include_once('layouts/guest_menu.php');
  }

?>
