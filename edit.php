<?php
require('access.php');
require_once('config.php');

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
                <div class="span12">
                <h2>Editing <?php 
                if(!isset($_GET['id'])) {
                    exit;
                }
                echo new MongoId($_GET['id']); ?></h2>
                    <pre contenteditable="true">
<?php echo json_format(json_encode($collection->findOne(array('_id' => new MongoId($_GET['id'])), array('events'))));?>
                    </pre>
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
        <script type="text/javascript">
            $(document).ready(function() {
                $(".edit").editInPlace({
                    url: "saved.php",
                });
                
             });
        </script>
        <script src="js/main.js"></script>
    </body>
</html>

<?php
// http://www.php.net/manual/en/function.json-encode.php#80339
function json_format($json) 
{ 
    $tab = "  "; 
    $new_json = ""; 
    $indent_level = 0; 
    $in_string = false; 

    $json_obj = json_decode($json); 

    if($json_obj === false) 
        return false; 

    $json = json_encode($json_obj); 
    $len = strlen($json); 

    for($c = 0; $c < $len; $c++) 
    { 
        $char = $json[$c]; 
        switch($char) 
        { 
            case '{': 
            case '[': 
                if(!$in_string) 
                { 
                    $new_json .= $char . "\n" . str_repeat($tab, $indent_level+1); 
                    $indent_level++; 
                } 
                else 
                { 
                    $new_json .= $char; 
                } 
                break; 
            case '}': 
            case ']': 
                if(!$in_string) 
                { 
                    $indent_level--; 
                    $new_json .= "\n" . str_repeat($tab, $indent_level) . $char; 
                } 
                else 
                { 
                    $new_json .= $char; 
                } 
                break; 
            case ',': 
                if(!$in_string) 
                { 
                    $new_json .= ",\n" . str_repeat($tab, $indent_level); 
                } 
                else 
                { 
                    $new_json .= $char; 
                } 
                break; 
            case ':': 
                if(!$in_string) 
                { 
                    $new_json .= ": "; 
                } 
                else 
                { 
                    $new_json .= $char; 
                } 
                break; 
            case '"': 
                if($c > 0 && $json[$c-1] != '\\') 
                { 
                    $in_string = !$in_string; 
                } 
            default: 
                $new_json .= $char; 
                break;                    
        } 
    } 

    return $new_json; 
} 
?>