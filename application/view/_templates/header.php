<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Komis</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- JS -->
    <!-- please note: The JavaScript files are loaded in the footer to speed up page construction -->
    <!-- See more here: http://stackoverflow.com/q/2105327/1114320 -->

    <!-- CSS -->
    <link href="<?php echo URL; ?>css/style.css" rel="stylesheet">
</head>
<body>
    <!-- logged in user -->
    <div class="loggedInUser">
        <a href="<?php echo URL; ?>account">
            Zalogowany jako: 
                <?php
                    if(isset($_SESSION['username']))
                        echo $_SESSION['username']; ?>
        </a>
    </div>
    <div class="logoutButton">
        <a href="<?php echo URL; ?>auth/logout">Wyloguj</a>
    </div>
    <!-- logo -->
    <div class="logo">
        KOMIS
    </div>

    <!-- navigation -->
    <div class="navigation">
        <a href="<?php echo URL; ?>">Strona główna</a>
        <a href="<?php echo URL; ?>home/exampleone">zakładka 1</a>
        <a href="<?php echo URL; ?>home/exampletwo">zakładka 2</a>
        <a href="<?php echo URL; ?>cars">Tajna zakładka</a>
    </div>
