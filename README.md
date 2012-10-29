![GitHub Logo](http://i.imgur.com/wjZ7R.png)
cured-mongodb - An overly simple CRUD App for MongoDB with in-place editing
===================================================================================

### Unique Features
*   jquery-in-place-editor
*   Twitter Bootstrap

### crude-mongodb provides in place editing of collections, and very basic viewing/removal features. ###

### access.php
Basic sha1 password protection, use something else if you plan on using this app in any real capacity.

### add.php
A pre-built form that creates a new collection on post.

### config.php
Choose the collection you want to work with.

### delete.php
Receives a $_GET request for collection removal

### edit.php - not working yet :(
Edits a multi-dimensional json object from view.php

### post.php
Accepts $_POST data from add.php and creates a new collection

### remove.php
Displays all collections with an option to delete, sends $_GET request to delete.php

### saved.php
Accepts ajax queries from view.php for in place editing of collections

### view.php
Displays all collections in a table and allows the in place editing of collections

```
I'm new to MongoDB and my PHP is also quite lax so if you would like to make improvements to this app please fork and send a pull request.
```