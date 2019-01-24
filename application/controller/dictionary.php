<?php

class Dictionary extends Controller
{
    //TODO add check for privileges
    
    public function index()
    {
        $brands = $this->model->getBrandNames();
        $fuels = $this->model->getFuels();
        $transmissions = $this->model->getTransmissions();
        $bodies = $this->model->getCarBodies();
        $drives = $this->model->getDrives();
        $colors = $this->model->getColors();
        require APP . 'view/_templates/header.php';
        require APP . 'view/dictionary/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function addBrand() {
        if (isset($_POST["Przeslij"])) {
            if(isset($_POST["marka_input"]) && $_POST["marka_input"] != "") {
                $this->model->dodaj_marke($_POST["marka_input"]);
                if(isset($_POST["model"]) && $_POST["model"] != "") {
                    $this->model->d_model($_POST["marka_input"], $_POST["model"]);
                    $_SESSION["message"] = "Dodano nowy model marki ".$_POST["marka_input"]." o nazwie ".$_POST["model"];
                }
                else {
                    $_SESSION["message"] = "Dodano nową markę: ".$_POST["marka_input"];
                }
            }
            else if(isset($_POST["model"]) && $_POST["model"] != "") {
                $this->model->d_model($_POST["marka_combo"], $_POST["model"]);
                $_SESSION["message"] = "Dodano nowy model marki ".$_POST["marka_combo"]." o nazwie ".$_POST["model"];
            }
        }
        header('location: ' . URL . 'dictionary/index');
    }

    public function addColor() {
        if (isset($_POST["Przeslij"])) {
            if(isset($_POST["kolor"]) && $_POST["kolor"] != "") {
                $this->model->d_kolor($_POST["kolor"]);
                $_SESSION["message"] = "Dodano nowy kolor: ".$_POST["kolor"];
            }
        }
        header('location: ' . URL . 'dictionary/index');
    }

    public function addFuel() {
        if (isset($_POST["Przeslij"])) {
            if(isset($_POST["paliwo"]) && $_POST["paliwo"] != "") {
                $this->model->d_paliwo($_POST["paliwo"]);
                $_SESSION["message"] = "Dodano nowy rodzaj paliwa: ".$_POST["paliwo"];
            }
        }
        header('location: ' . URL . 'dictionary/index');

    }
    public function addTransmission() {
        if (isset($_POST["Przeslij"])) {
            if(isset($_POST["rodzajSkrzyni"]) && $_POST["rodzajSkrzyni"] != "") {
                $this->model->d_biegi($_POST["rodzajSkrzyni"]);
                $_SESSION["message"] = "Dodano nowy rodzaj napędu: ".$_POST["rodzajSkrzyni"];
            }
        }
        header('location: ' . URL . 'dictionary/index');

    }
    public function addCarBody() {
        if (isset($_POST["Przeslij"])) {
            if(isset($_POST["typSamochodu"]) && $_POST["typSamochodu"] != "") {
                $this->model->d_typ_samochodu($_POST["typSamochodu"]);
                $_SESSION["message"] = "Dodano nowy rodzaj nadwozia: ".$_POST["typSamochodu"];
            }
        }
        header('location: ' . URL . 'dictionary/index');

    }
    public function addDrive() {
        if (isset($_POST["Przeslij"])) {
            if(isset($_POST["naped"]) && $_POST["naped"] != "") {
                $this->model->d_naped($_POST["naped"]);
                $_SESSION["message"] = "Dodano nowy rodzaj napędu: ".$_POST["naped"];
            }
        }
        header('location: ' . URL . 'dictionary/index');

    }

}
