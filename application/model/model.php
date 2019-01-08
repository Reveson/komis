<?php

class Model
{
    /**
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function getAllCars()
    {
        $sql = "SELECT id, brand, model, mileage, img_src FROM samochod";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }





    public function getUsersPassword($username) {
        //3.1.2 Checking the values are existing in the database or not
        $sql = "SELECT haslo FROM `pracownik` WHERE login = :username";
        $query = $this->db->prepare($sql);
        $parameters = array(':username' => $username);
        $query->execute($parameters);  
        
        $count = $query->rowCount();
        if ($count == 1){
            return $query->fetch()->haslo;
        }
        return null;
    }
    

    public function createUser($username, $password) {
        $sql = "INSERT INTO pracownik (login, haslo) VALUES (:username, :password)";
        $query = $this->db->prepare($sql);
        $parameters = array(':username' => $username, ':password' => $password);
        $query->execute($parameters);  
    }

    public function getBrandNames() {
        
        $sql = "SELECT nazwa_marki FROM marka";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function d_model($marka, $model) {
        $procedure = "Call d_model(:marka, :model)";
        $query = $this->db->prepare($procedure);
        $parameters = array(':marka' => $marka, ':model' => $model);
        $query->execute($parameters);

    }
}
