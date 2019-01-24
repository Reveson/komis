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
    <?php  if(isset($_SESSION['username'])) { ?>
        <div class="loggedInUser">
            <a href="<?php echo URL; ?>account">
                Zalogowany jako: 
                    <?php echo $_SESSION['username']; ?>
            </a>
        </div>
        <div class="logButton">
            <a href="<?php echo URL; ?>auth/logout">Wyloguj</a>
        </div>
    <?php } else { ?>
        <div class="logButton">
            <a href="<?php echo URL; ?>auth/login">Zaloguj</a>
        </div>
    <?php } ?>
    <!-- logo -->
    <div class="logo">
        KOMIS
    </div>

    <!-- navigation -->
    <div class="navigation">
        <a href="<?php echo URL; ?>">Strona główna</a>
        <?php if(isset($_SESSION["username"])) { ?>
            <?php if(in_array("d_pracownika", $_SESSION['permissions'])) { ?> <a href="<?php echo URL; ?>dictionary">Słowniki</a> <?php } ?>
            <?php if(in_array("zaawansowane", $_SESSION['permissions'])) { ?> <a href="<?php echo URL; ?>staff">Personel</a> <?php } ?>
            <?php if(in_array("d_samochod", $_SESSION['permissions'])) { ?> <a href="<?php echo URL; ?>cars">Dodaj samochód</a> <?php } ?>
            <?php if(in_array("d_klienta", $_SESSION['permissions'])) { ?> <a href="<?php echo URL; ?>clients">Dodaj klienta</a> <?php } ?>
            <a href="<?php echo URL; ?>auth/changePasswordPage">Zmień hasło</a>
        <?php } ?>
        <!-- <a href="<?php echo URL; ?>home/exampleone">zakładka 1</a> -->
        <!-- <a href="<?php echo URL; ?>home/exampletwo">zakładka 2</a> -->
        <!-- <a href="<?php echo URL; ?>cars">Tajna zakładka</a> -->
    </div>
    <div class="infoBox">
        <?php 
            if(isset($_SESSION["message"])) {
                echo $_SESSION["message"];
                unset($_SESSION["message"]);
            }
        ?>
    </div>
