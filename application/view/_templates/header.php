<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Komis samochodowy</title>
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
            <!-- <a href="<?php echo URL; ?>account"> -->
                Zalogowany jako: 
                    <?php echo $_SESSION['username']; ?>
            <!-- </a> -->
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
    <!-- <div class="logo">
        KOMIS
    </div> -->

    <!-- navigation -->
    <div class = "navbar">
    <!-- <div class="navigation "> -->
        
        <img src="http://funkyimg.com/i/2QxzF.png" alt="logo" height='40px';>
        <ul>
        <li><a href="<?php echo URL; ?>">Strona główna</a></li>
        <li><a href="<?php echo URL; ?>home/kontakt">Kontakt</a></li>
        <li><a href="<?php echo URL; ?>home/onas">O nas</a></li>
        <?php if(isset($_SESSION["username"])) { ?>
            <?php if(in_array("d_pracownika", $_SESSION['permissions'])) { ?> <li><a href="<?php echo URL; ?>dictionary">Słowniki</a></li> <?php } ?>
            <?php if(in_array("zaawansowane", $_SESSION['permissions'])) { ?> <li><a href="<?php echo URL; ?>staff">Personel</a> </li><?php } ?>
            <?php if(in_array("d_samochod", $_SESSION['permissions'])) { ?> <li><a href="<?php echo URL; ?>cars">Dodaj samochód</a></li> <?php } ?>
            <?php if(in_array("d_klienta", $_SESSION['permissions'])) { ?> <li><a href="<?php echo URL; ?>clients">Dodaj klienta</a> </li><?php } ?>
           <li> <a href="<?php echo URL; ?>auth/changePasswordPage">Zmień hasło</a></li>
        <?php } ?>
        <!-- <a href="<?php echo URL; ?>home/exampleone">zakładka 1</a> -->
        <!-- <a href="<?php echo URL; ?>home/exampletwo">zakładka 2</a> -->
        <!-- <a href="<?php echo URL; ?>cars">Tajna zakładka</a> -->
        </ul>
    </div>
    <div class="infoBox">
        <?php 
            if(isset($_SESSION["message"])) {
                echo $_SESSION["message"];
                unset($_SESSION["message"]);
            }
        ?>
    </div>
