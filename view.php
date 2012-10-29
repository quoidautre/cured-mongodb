<?php
require('access.php');
require_once('config.php');

if($cursor_count > 0){
?>

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
                            <li class="active"><a href="view.php">View</a></li>
                            <li><a href="add.php">Add</a></li>
                            <li><a href="remove.php">Remove</a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="">
                <h2><?php echo $cursor_count . ' document(s) found<br/>';?></h2>
                    <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <?php
                                // building table head with keys
                                $cursor = $collection->find();
                                $array = iterator_to_array($cursor);
                                $keys = array();
                                foreach ($array as $k => $v) {
                                        foreach ($v as $a => $b) {
                                                $keys[] = $a;
                                        }
                                }
                                $keys = array_values(array_unique($keys));
                                // assuming first key is MongoID so skipping it
                                foreach (array_slice($keys,1) as $key => $value) {
                                    echo "<th>" . $value . "</th>";
                                }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $cursor = $collection->find();
                            $cursor_count = $cursor->count();
                                foreach ($cursor as $venue) {
                                    echo "<tr>";
                                    foreach (array_slice($keys,1) as $key => $value) {
                                       echo "<td class='edit' id='" . $venue['_id'] . " " . $value . "'>" . $venue[$value] . "</td>";
                                    }
                                    echo "</tr>";
                                }
                        ?>
                    </tbody>
                    </table>
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
        <script src="js/editinplace.js"></script>
        <script src="js/dataTables.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $(".edit").editInPlace({
                    url: "saved.php",
                });

             });
        </script>
        <script>
            /* Table initialisation */
            $(document).ready(function() {
                $('.table').dataTable( {
                    "sDom": "<'row'<'span4'l><'span4 offset4 align-right'f>r>t<'row'<'span8'i><'span8'p>>",
                    "sPaginationType": "bootstrap",
                    "oLanguage": {
                        "sLengthMenu": "_MENU_ records per page"
                    }
                } );
            } );
        </script>
        <script src="js/main.js"></script>
    </body>
</html>

<?php } ?>
