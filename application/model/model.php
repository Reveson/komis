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
        $sql = "SELECT password FROM `uzytkownik` WHERE username = :username";
        $query = $this->db->prepare($sql);
        $parameters = array(':username' => $username);
        $query->execute($parameters);  
        
        $count = $query->rowCount();
        if ($count == 1){
            return $query->fetch()->password;
        }
        return null;
    }
    

    public function createUser($username, $password) {
        $sql = "INSERT INTO uzytkownik (id, username, password, privileges) VALUES (NULL, :username, :password, '0')";
        $query = $this->db->prepare($sql);
        $parameters = array(':username' => $username, ':password' => $password);
        $query->execute($parameters);  
    }
}
