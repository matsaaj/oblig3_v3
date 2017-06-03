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

        <ul class="nav navbar-nav ml-auto">
          <form class="form-inline" id="login_form" method="post">

            <div class="form-group">
              <div class="form-control-feedback mr-3 mt-0" id="loginErr"></div>

              <input type="email" class="form-control form-control-sm mr-sm-2" placeholder="E-mail" name="email">
            </div>
            <div class="form-group">
              <input type="password" class="form-control form-control-sm mr-sm-2" placeholder="Passord" name="password">
            </div>

            <div class="btn-group" role="group">
              <button type="submit" class="btn btn-primary btn-sm" name="login" id="loginBtn">Logg inn</button>
            </div>

          </form>
          <a href="#" id="registerToggle" data-toggle="modal" data-target="#registerModal">Registrer ny bruker</a>
      </ul>
        <!-- Modal -->
        <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrer ny bruker</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="register_form" method="post" autocomplete="new-password">

                  <div class="form-group row">
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Fornavn">
                    </div>

                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="surname" name="surname" placeholder="Etternavn">
                    </div>
                  </div>

                  <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
                  </div>

                  <br>

                  <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Passord">
                  </div>

                  <div class="form-group">
                    <input type="password" class="form-control" id="passwordCheck" name="passwordCheck" placeholder="Bekreft passord">
                  </div>

                </form>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success" name="register" id="registerFormBtn">Registrer</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
