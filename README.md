![GitHub Logo](http://i.imgur.com/wjZ7R.png)
cured-mongodb - An overly simple CRUD App for MongoDB with in-place editing
===================================================================================

### Unique Features
*   jquery-in-place-editor
*   Twitter Bootstrap

### crude-mongodb provides in place editing of documents, and very basic viewing/removal features. ###

### access.php
Basic sha1 password protection, use something else if you plan on using this app in any real capacity.

### add.php
A pre-built form that creates a new document on post.

### config.php
Choose the collection you want to work with.

### delete.php
Receives a $_GET request for document removal

### edit.php - not working yet :(
Edits a multi-dimensional json object from view.php

### post.php
Accepts $_POST data from add.php and creates a new document

### remove.php
Displays all documents with an option to delete, sends $_GET request to delete.php

### saved.php
Accepts ajax queries from view.php for in place editing of documents

### view.php
Displays all documents in a table and allows the in place editing of documents

```
I'm new to MongoDB and my PHP is also quite lax so if you would like to make improvements to this app please fork and send a pull request.
```