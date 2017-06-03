<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Oblig 3</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <!-- Material Icons font -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="index.php">GiveAway</a>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="item.php">Mine annonser</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="create_item.php">Legg ut ny annonse</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link2</a>
          </li>
        </ul>

        <ul class="navbar-nav ml-auto">
          <div id="user_display">
            <a href="#"><i class="material-icons" id="acc_icon">account_circle</i><?php echo $user['firstname'] . " " . $user['surname'];?></a>
            <ul>
              <li>
                <a href="#" class="btn btn-secondary dropdown_link">Min profil</a>
              </li>
              <li>
                <form class="form-inline" id="logout_form" method="post">
                  <button type="submit" class="btn btn-secondary dropdown_link" name="logout" id="logoutBtn">Logg ut</button>
                </form>
              </li>
            </ul>
          </div>
        </ul>
      </div>
    </nav>
