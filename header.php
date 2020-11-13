<?php
    // File: header.php
    // This contains the <header> elements for all pages.

    /* I will start the session once here. I will remove all other instances of "session_start()" on the rest of
    the pages, or I'll get an error message popping up. */
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Eduardo Salinas">
    <title>Wistarr List</title>

    <!-- Stylesheet source for the cookie consent banner. -->
    <link rel="stylesheet" href="./css/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <?php
        /* This calls the navbar. */
        require "navbar.php";
    ?>
    <!-- Everything inside this container will be affected by Bootstrap. I will
     have to move the cookie banner consent out of this container since the
     banner has its own custom CSS. -->
    <div class="container-fluid">