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

    public function register() {
        if(!isset($_SESSION['username'])) {
            require APP . 'view/_templates/headerPlain.php';
            require APP . 'view/auth/register.php';
            require APP . 'view/_templates/footer.php';
        }
        else {
            header('location: '.URL.'home');
        }
    }

    public function login() {
        if (isset($_POST['username']) and isset($_POST['password'])){
            //3.1.1 Assigning posted values to variables.
            $username = $_POST['username'];
            $password = $_POST['password'];

            $encryptedPassword = $this->model->getUsersPassword($username);
            if($encryptedPassword != null) {
                $isPasswordValid = password_verify($password, $encryptedPassword);
                if($isPasswordValid == 1) {
                    $_SESSION['username'] = $username;
                    header('location: ' . URL . 'home');
                    return;
                }
            } 
            
            $_SESSION['message'] = 'Nieprawidłowa nazwa użytkownika lub hasło.';
        }
        header('location: ' . URL . 'auth');

    }

    public function createAccount() {
        if (isset($_POST['username']) and isset($_POST['password'])){
            //3.1.1 Assigning posted values to variables.
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $this->model->createUser($username, $password);

            $encryptedPassword = $this->model->getUsersPassword($username);
            $v1 = password_verify($_POST['password'], $password);
            $v2 = password_verify($_POST['password'], $encryptedPassword);

            header('location: ' . URL . 'auth');
        }
            
    }

    public function logout() {
        session_destroy();
        header('location: '.URL.'home');
    }
}