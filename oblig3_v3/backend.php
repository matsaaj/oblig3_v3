<?php
header('Content-Type', 'application/json');
  session_start();
  require_once('dbconfig.php');

  // Send user data from registration form to database
  if(isset($_POST['firstname'])) {
    $fname = $_POST['firstname'];
    $lname = $_POST['surname'];
    $email = $_POST['email'];
    $pw = $_POST['password'];
    $confirmPw = $_POST['passwordCheck'];
    $pwHashed = password_hash($pw, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (firstname, surname, email, password)
            VALUES (:firstname, :surname, :email, :password)";
    $stmt = $db->prepare($sql);
    $stmt->bindparam(':firstname', $fname);
    $stmt->bindparam(':surname', $lname);
    $stmt->bindparam(':email', $email);
    $stmt->bindparam(':password', $pwHashed);
    $result = $stmt->execute();
  }

  // Login
  if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $pw = $_POST['password'];

    $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute(array(':email' => $email));
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user && $stmt->rowCount() > 0) {
      if (password_verify($pw, $user['password'])) {
        $_SESSION['user_session'] = $user['id'];
        echo json_encode(true);
      } else {
        echo json_encode(false);
      }
    } else {
      echo json_encode(false);
    }
  }

  // Create new item
  if(isset($_POST['createItem'])) {
    $item_name = $_POST['item_title'];
    $category_id = $_POST['category'];
    $description = $_POST['description'];
    $userId = $_SESSION['user_session'];

    $sql = "INSERT INTO items (category_id, user_id, item_name, item_description)
            VALUES (:category_id, :user_id, :item_name, :item_description)";
    $stmt = $db->prepare($sql);
    $stmt->bindparam(':category_id', $category_id);
    $stmt->bindparam(':user_id', $userId);
    $stmt->bindparam(':item_name', $item_name);
    $stmt->bindparam(':item_description', $description);
    $result = $stmt->execute();

    if ($result) {
      echo json_encode(true);
    } else {
      echo json_encode(false);
    }
  }



?>
