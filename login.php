<?php
  session_start();
?>
<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>

  <body>

    <div class="container">

    <div class="row">
      <p><br/></p>
    </div>
    <p id="fail"></p>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <div class="panel panel-default">
          <form name = "login" method='post' action='sendLogin.php'>
            <p></p>
            <table class="table table-bordered table-hover">
            <tbody>

              <tr>
                  <td class="col-md-6">User:</td>
                  <td class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" name="username" required maxlength="30">
                    </div>
                  </td>
              </tr>

              <tr>
                  <td class="col-md-6">Password:</td>
                  <td class="col-md-6">
                    <div class="form-group">
                     <input type="password" class="form-control" name="password" required maxlength="30">
                    </div>
                  </td>
              </tr>

              <tr>
                <td class="col-md-6"></td>
                <td class="col-md-6">
                  <input class="trigger" type="submit" value="Submit" name='submit'>
                </td>
              </tr>
            </tbody>
            </table>
          </form>
        </div>
      </div>
      <div class="col-md-4"></div>
    </div>
  </div>
  </body>
</html>
