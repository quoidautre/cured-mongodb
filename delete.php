<?php
require('access.php');
require_once('config.php');

// delete collection
if(isset($_GET['delete'])) {
    $collection->remove(array('_id' => new MongoId($_GET['delete'])), true);
}
?>