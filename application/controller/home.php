<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Home extends Controller
{
    
    public function index()
    {
        $cars = $this->model->getCars();
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function kontakt()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/kontakt.php';
        require APP . 'view/_templates/footer.php';
    }


    public function oNas()
    {
        
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/onas.php';
        require APP . 'view/_templates/footer.php';
    }
}
