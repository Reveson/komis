<?php

class Staff extends Controller
{
    //TODO add check for privileges
    
    public function index()
    {
        $positions = $this->model->getPositions();
        require APP . 'view/_templates/header.php';
        require APP . 'view/staff/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function addEmployee() {
        if(isset($_POST["Przeslij"])) {
            $id_number = $_POST["pesel"];
            $this->model->dodaj_pracownika($_POST["imie"], $_POST["nazwisko"], 
                $id_number, $_POST["nrDowoduOsobistego"], $_POST["startPracy"],
                $_SESSION["username"], $_POST["wynagrodzenie"], $_POST["stanowisko"]);
                
            $password = password_hash($id_number, PASSWORD_DEFAULT);
            $this->model->changePassword($id_number, $password);

            if(isset($_POST["drugieImie"])) {
                $this->model->uzupelnij_imie($_POST["pesel"], $_POST["drugieImie"]);
            }
            if(isset($_POST["telefon"])) {
                $this->model->uzupelnij_telefon($_POST["pesel"], $_POST["telefon"]);
            }
            $login = $this->model->getLogin($id_number)->login;
            $_SESSION["message"] = "Dodano nowego pracownika o loginie: ".$login." na stanowisko ".$_POST["stanowisko"].". Tymczasowe hasło to numer pesel. Proszę zmienić je po zalogowaniu.";
        }
        
        header('location: ' . URL . 'staff/index');
    }

}