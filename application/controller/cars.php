<?php
Class Cars extends Controller {

    public function index() {
        
        $models = $this->model->getModels();
        $fuels = $this->model->getFuels();

        require APP . 'view/_templates/header.php';
        require APP . 'view/cars/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function addNewCar() {
        if(isset($_POST['Przeslij'])) {
            $this->model->addCar($_POST["model"], $_POST["rok"], $_POST["przebieg"], $_POST["pojemnosc"], $_POST["paliwo"], $_POST["cena"]);
        }
        header('location: ' . URL . 'cars');
    }
}