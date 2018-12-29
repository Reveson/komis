<?php
Class Cars extends Controller {

    public function index() {

        $cars = $this->model->getAllCars();

        require APP . 'view/_templates/header.php';
        require APP . 'view/cars/index.php';
        require APP . 'view/_templates/footer.php';
    }
}