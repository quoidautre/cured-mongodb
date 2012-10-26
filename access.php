<?php
// if you plan on using this app in any real capacity
// i encourage you to implement something more secure
// than this silly thing, hehehe xD

// http://stackoverflow.com/users/22224/tom-haigh
// sha1 - password
$password = '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8';

session_start();
if (!isset($_SESSION['loggedIn'])) {
    $_SESSION['loggedIn'] = false;
}

if (isset($_POST['password'])) {
    if (sha1($_POST['password']) == $password) {
        $_SESSION['loggedIn'] = true;
    } else {
        die ('Incorrect password');
    }
} 

if (!$_SESSION['loggedIn']): ?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
        </style>
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="index.html"><img src="img/logo-mongodb-icon.png" alt="mongodb logo"> cured-mongodb</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li><a href="app/view.php">View</a></li>
                            <li><a href="app/add.php">Add</a></li>
                            <li><a href="app/remove.php">Remove</a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="span4">
                  <form class="" method="post">
                    <div class="control-group">
                      <div class="controls">
                        <input type="password" id="inputPassword" name="password" placeholder="see access.php">
                      </div>
                    </div>
                    <div class="control-group">
                      <div class="controls">
                        <button type="submit" class="btn">Sign in</button>
                      </div>
                    </div>
                  </form>
                </div>
            </div>
            <hr>
            <footer>
                <small><a href="https://github.com/ccheney/cured-mongodb">https://github.com/ccheney/cured-mongodb</a></small>
            </footer>
        </div> <!-- /container -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.2.min.js"><\/script>')</script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>

<?php
exit();
endif;
?>
