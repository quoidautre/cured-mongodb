<?php
require('access.php');
require_once('config.php');

$clients = $collection->find();
$clients_count = $clients->count();

if($clients_count > 0){
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
                <div class="span4">
                <?php 
                    /*$allCollections = $db->getCollectionNames();
                    var_dump($allCollections);*/
                ?>
                </div>
                <div class="">
                <h2><?php echo $clients_count . ' record(s) found<br/>';?></h2>
                    <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>name</th>
                            <th>address</th>
                            <th>city</th>
                            <th>state</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($clients as $client){ ?>
                        <tr>
                            <td class="edit" id="<?php echo $client['_id'];?> name">
                                <?php
                                    if(is_array($client['name'])) {
                                        echo "<button id='" . $client['_id'] . "'type='button' class='btn btn-inverse btn-small'>Object</button>";
                                    } else {
                                        echo $client['name'];
                                    }
                                ?>
                            </td>
                            <td class="edit" id="<?php echo $client['_id'];?> address">
                                <?php
                                    if(is_array($client['address'])) {
                                        echo "<button id='" . $client['_id'] . "'type='button' class='btn btn-inverse btn-small'>Object</button>";
                                    } else {
                                        echo $client['address'];
                                    }
                                ?>
                            </td>
                            <td class="edit" id="<?php echo $client['_id'];?> city">
                                <?php
                                    if(is_array($client['city'])) {
                                        echo "<button id='" . $client['_id'] . "'type='button' class='btn btn-inverse btn-small'>Object</button>";
                                    } else {
                                        echo $client['city'];
                                    }
                                ?>
                            </td>
                            <td class="edit" id="<?php echo $client['_id'];?> state">
                                <?php
                                    if(is_array($client['state'])) {
                                        echo "<button id='" . $client['_id'] . "'type='button' class='btn btn-inverse btn-small'>Object</button>";
                                    } else {
                                        echo $client['state'];
                                    }
                                ?>
                            </td>
                        </tr>
                        <?php } ?>
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
            /* Default class modification */
            $.extend( $.fn.dataTableExt.oStdClasses, {
                "sSortAsc": "header headerSortDown",
                "sSortDesc": "header headerSortUp",
                "sSortable": "header"
            } );

            /* API method to get paging information */
            $.fn.dataTableExt.oApi.fnPagingInfo = function ( oSettings )
            {
                return {
                    "iStart":         oSettings._iDisplayStart,
                    "iEnd":           oSettings.fnDisplayEnd(),
                    "iLength":        oSettings._iDisplayLength,
                    "iTotal":         oSettings.fnRecordsTotal(),
                    "iFilteredTotal": oSettings.fnRecordsDisplay(),
                    "iPage":          Math.ceil( oSettings._iDisplayStart / oSettings._iDisplayLength ),
                    "iTotalPages":    Math.ceil( oSettings.fnRecordsDisplay() / oSettings._iDisplayLength )
                };
            }

            /* Bootstrap style pagination control */
            $.extend( $.fn.dataTableExt.oPagination, {
                "bootstrap": {
                    "fnInit": function( oSettings, nPaging, fnDraw ) {
                        var oLang = oSettings.oLanguage.oPaginate;
                        var fnClickHandler = function ( e ) {
                            e.preventDefault();
                            if ( oSettings.oApi._fnPageChange(oSettings, e.data.action) ) {
                                fnDraw( oSettings );
                            }
                        };

                        $(nPaging).addClass('pagination').append(
                            '<ul>'+
                                '<li class="prev disabled"><a href="#">&larr; '+oLang.sPrevious+'</a></li>'+
                                '<li class="next disabled"><a href="#">'+oLang.sNext+' &rarr; </a></li>'+
                            '</ul>'
                        );
                        var els = $('a', nPaging);
                        $(els[0]).bind( 'click.DT', { action: "previous" }, fnClickHandler );
                        $(els[1]).bind( 'click.DT', { action: "next" }, fnClickHandler );
                    },

                    "fnUpdate": function ( oSettings, fnDraw ) {
                        var iListLength = 5;
                        var oPaging = oSettings.oInstance.fnPagingInfo();
                        var an = oSettings.aanFeatures.p;
                        var i, j, sClass, iStart, iEnd, iHalf=Math.floor(iListLength/2);

                        if ( oPaging.iTotalPages < iListLength) {
                            iStart = 1;
                            iEnd = oPaging.iTotalPages;
                        }
                        else if ( oPaging.iPage <= iHalf ) {
                            iStart = 1;
                            iEnd = iListLength;
                        } else if ( oPaging.iPage >= (oPaging.iTotalPages-iHalf) ) {
                            iStart = oPaging.iTotalPages - iListLength + 1;
                            iEnd = oPaging.iTotalPages;
                        } else {
                            iStart = oPaging.iPage - iHalf + 1;
                            iEnd = iStart + iListLength - 1;
                        }

                        for ( i=0, iLen=an.length ; i<iLen ; i++ ) {
                            // Remove the middle elements
                            $('li:gt(0)', an[i]).filter(':not(:last)').remove();

                            // Add the new list items and their event handlers
                            for ( j=iStart ; j<=iEnd ; j++ ) {
                                sClass = (j==oPaging.iPage+1) ? 'class="active"' : '';
                                $('<li '+sClass+'><a href="#">'+j+'</a></li>')
                                    .insertBefore( $('li:last', an[i])[0] )
                                    .bind('click', function (e) {
                                        e.preventDefault();
                                        oSettings._iDisplayStart = (parseInt($('a', this).text(),10)-1) * oPaging.iLength;
                                        fnDraw( oSettings );
                                    } );
                            }

                            // Add / remove disabled classes from the static elements
                            if ( oPaging.iPage === 0 ) {
                                $('li:first', an[i]).addClass('disabled');
                            } else {
                                $('li:first', an[i]).removeClass('disabled');
                            }

                            if ( oPaging.iPage === oPaging.iTotalPages-1 || oPaging.iTotalPages === 0 ) {
                                $('li:last', an[i]).addClass('disabled');
                            } else {
                                $('li:last', an[i]).removeClass('disabled');
                            }
                        }
                    }
                }
            } );

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
