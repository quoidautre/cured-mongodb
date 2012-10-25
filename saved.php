<?php
/*!
* cured-mongodb
* Copyright 2012 Chris Cheney <ccheney05@gmail.com> @_cheney
* Licensed under the MIT license
*/
require('access.php');
require_once('config.php');

// i'm sure there's a better way to pass the key, 
// preferably through the jquery edit in place script like
// <td key="name" id="5087d672cdf0557e0b000003">
// don't laugh :(
$idKey = $_POST['element_id'];
$idKeyParts = explode(" ", $idKey);
$id = $idKeyParts[0];
$key = $idKeyParts[1];

// wrap the $id object in MongoID
$mongoId = new MongoID($id);

// grab the updated value from post
$updatedValue = $_POST['update_value'];

// build an array for the updated data
$newData = array('$set' => array($key => $updatedValue));

// replace the old data with the new, yay
$collection->update(
	array("_id" => $mongoId),
	array('$set' => array($key => $updatedValue)),
	array("upsert" => false));

// grab the value which was updated and echo it back
$savedValue = $collection->findOne(array('_id' => $mongoId), array($key));
echo $savedValue[$key];


?>
