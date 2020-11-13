<?php
/* This connects to the database. I will use "require" to call the databse connection from every other script.
Insert the name of your own MySQL username and password in "DB_USERNAME" and in "DB_PASSWORD". */
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=wistarr_list', 'DB_USERNAME', 'DB_PASSWORD');

// This will display errors if I can't connect to the database.
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);