<?php

Class Auth extends Controller {
    
    public function index() {
        if(!isset($_SESSION['username'])) {
            require APP . 'view/_templates/headerPlain.php';
            require APP . 'view/auth/login.php';
            require APP . 'view/_templates/footer.php';
        }
        else {
            header('location: '.URL.'home');
        }
    }

    // public function register() {
    //     if(!isset($_SESSION['username'])) {
    //         require APP . 'view/_templates/headerPlain.php';
    //         require APP . 'view/auth/register.php';
    //         require APP . 'view/_templates/footer.php';
    //     }
    //     else {
    //         header('location: '.URL.'home');
    //     }
    // }

    public function login() {
        if (isset($_POST['username']) and isset($_POST['password']) and !isset($_SESSION["username"])){
            //3.1.1 Assigning posted values to variables.
            $username = $_POST['username'];
            $password = $_POST['password'];

            $encryptedPassword = $this->model->getUsersPassword($username);
            if($encryptedPassword != null) {
                $isPasswordValid = password_verify($password, $encryptedPassword);
                if($isPasswordValid == 1) {
                    $_SESSION['username'] = $username;

                    ///zapiasnie uprawnień użytkownika
                    $permissions = $this->model->getPermissions($_SESSION['username']);
                    $_SESSION['permissions'] = $permissions;
                    ////////////////////

                    header('location: ' . URL . 'home');
                    return;
                }
            } 
            
            $_SESSION['message'] = 'Nieprawidłowa nazwa użytkownika lub hasło.';
        }
        header('location: ' . URL . 'auth');

    }

    // public function createAccount() {
    //     if (isset($_POST['username']) and isset($_POST['password'])){
    //         //3.1.1 Assigning posted values to variables.
    //         $username = $_POST['username'];
    //         $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    //         $this->model->createUser($username, $password);

    //         header('location: ' . URL . 'auth');
    //     }
            
    // }

    public function logout() {
        session_destroy();
        header('location: '.URL.'home');
    }

    public function changePasswordPage() {
        if(isset($_SESSION['username'])) {
            require APP . 'view/_templates/header.php';
            require APP . 'view/auth/changePassword.php';
            require APP . 'view/_templates/footer.php';
        }
        else {
            header('location: '.URL.'home');
        }
    }

    public function changePassword() {
        if (isset($_POST['oldPass']) and isset($_POST['newPass']) and isset($_POST['newPass2'])){
            $oldPass = $_POST['oldPass'];
            $newPass = $_POST['newPass'];
            $newPass2 = $_POST['newPass2'];
            $username = $_SESSION["username"];
            if($newPass == $newPass2 && $newPass != "") {
                $encryptedPassword = $this->model->getUsersPassword($username);
                $isPasswordValid = password_verify($oldPass, $encryptedPassword);
                if($isPasswordValid == 1) {
                    $password = password_hash($newPass, PASSWORD_DEFAULT);
                    $id = $this->model->getUserId($username)->pesel;
                    $this->model->changePassword($id, $password);
                    $_SESSION["message"] = "Hasło zostało zmienione.";
                }
                else {
                    $_SESSION["message"] = "Podano niepoprawne hasło.";
                }

            }
            else {
                $_SESSION["message"] = "Nowe hasła nie są takie same.";

            }

            header('location: ' . URL . 'auth/changePasswordPage');
        }

    }
}