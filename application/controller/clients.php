<?php
Class Clients extends Controller {

    public function index() {
        require APP . 'view/_templates/header.php';
        require APP . 'view/clients/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function addClient() {
        if (isset($_POST["Przeslij"])) {
            $this->model->d_klient_umowa($_POST["imie"], $_POST["nazwisko"], $_POST["pesel"],
                $_POST["telefon"], $_POST["miasto"], $_POST["adres"], 
                $_POST["numerDowoduOsobistego"], $_POST["dowodDodanyPrzez"]);
            $_SESSION["message"] = "Dodano nowego klienta.";
        }
        header('location: ' . URL . 'clients');

    }

}