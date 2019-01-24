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
    
    public function dodaj_marke($marka) {
        $procedure = "Call dodaj_marke(:marka)";
        $query = $this->db->prepare($procedure);
        $parameters = array(':marka' => $marka);
        $query->execute($parameters);

    }

    public function getFuels() {
        
        $sql = "SELECT nazwa_rodzaju_paliwa FROM rodzaj_paliwa";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
    public function getTransmissions() {
        
        $sql = "SELECT nazwa_skrzyni_biegow FROM skrzynia_biegow";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
    public function getCarBodies() {
        
        $sql = "SELECT nazwa_typu_samochodu FROM typ_samochodu";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
    public function getDrives() {
        
        $sql = "SELECT nazwa_napedu FROM naped";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
    public function getColors() {
        
        $sql = "SELECT nazwa_koloru FROM kolor";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function d_kolor($kolor) {
        $procedure = "Call dodaj_kolor(:kolor)";
        $query = $this->db->prepare($procedure);
        $parameters = array(':kolor' => $kolor);
        $query->execute($parameters);
    }
    public function d_naped($naped) {
        $procedure = "Call d_naped(:naped)";
        $query = $this->db->prepare($procedure);
        $parameters = array(':naped' => $naped);
        $query->execute($parameters);
    }
    public function d_biegi($skrzynia) {
        $procedure = "Call d_biegi(:skrzynia)";
        $query = $this->db->prepare($procedure);
        $parameters = array(':skrzynia' => $skrzynia);
        $query->execute($parameters);
    }
    public function d_paliwo($paliwo) {
        $procedure = "Call d_paliwo(:paliwo)";
        $query = $this->db->prepare($procedure);
        $parameters = array(':paliwo' => $paliwo);
        $query->execute($parameters);
    }
    public function d_typ_samochodu($nadwozie) {
        $procedure = "Call d_typ_samochodu(:nadwozie)";
        $query = $this->db->prepare($procedure);
        $parameters = array(':nadwozie' => $nadwozie);
        $query->execute($parameters);
    }

    public function getPositions() {
        $sql = "SELECT nazwa_stanowiska FROM stanowisko";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();

    }
    //TODO zmienic na ID
    public function dodaj_pracownika($imie, $nazwisko, 
    $pesel, $nrDowoduOsobistego, $startPracy,
    $id, $wynagrodzenie, $stanowisko) {
        $procedure = "Call dodaj_pracownika(:imie, :nazwisko, :pesel, :nrDowoduOsobistego, :startPracy, :id, :wynagrodzenie, :stanowisko)";
        $query = $this->db->prepare($procedure);
        $parameters = array(':imie' => $imie, ':nazwisko' => $nazwisko, ':pesel' => $pesel, ':nrDowoduOsobistego' => $nrDowoduOsobistego,
             ':startPracy' => $startPracy, ':id' => $id, ':wynagrodzenie' => $wynagrodzenie, ':stanowisko' => $stanowisko);
        $query->execute($parameters);
    }

    public function uzupelnij_telefon($pesel, $telefon) {
        $procedure = "Call uzupelnij_telefon(:pesel, :telefon)";
        $query = $this->db->prepare($procedure);
        $parameters = array(':pesel' => $pesel, ':telefon' => $telefon);
        $query->execute($parameters);
    }
    public function uzupelnij_imie($pesel, $imie) {
        $procedure = "Call uzupelnij_imie(:pesel, :imie)";
        $query = $this->db->prepare($procedure);
        $parameters = array(':pesel' => $pesel, ':imie' => $imie);
        $query->execute($parameters);
    }

    public function changePassword($id, $newPass) {
        $sql = "UPDATE pracownik SET haslo = :newPass WHERE pesel = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':newPass' => $newPass, ':id' => $id);
        $query->execute($parameters);
        return $query->fetch();

    }

    public function getLogin($id) {
        $sql = "SELECT login FROM pracownik WHERE pesel = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);
        $query->execute($parameters);
        return $query->fetch();
    }

    public function getUserId($username) {
        $sql = "SELECT pesel FROM pracownik WHERE login = :username";
        $query = $this->db->prepare($sql);
        $parameters = array(':username' => $username);
        $query->execute($parameters);
        return $query->fetch();

    }

    public function getPermissions($login) {
        $returnArray = array();
        
        $procedure = "Call czy_d_prac(:login)";
        $query = $this->db->prepare($procedure);
        $parameters = array(':login' => $login);
        $query->execute($parameters);
        if($query->fetch()->d_pracownika == 1) {
            array_push($returnArray, "d_pracownika");
        }
        $procedure = "Call czy_d_sam(:login)";
        $query = $this->db->prepare($procedure);
        $parameters = array(':login' => $login);
        $query->execute($parameters);
        if($query->fetch()->d_samochod == 1) {
            array_push($returnArray, "d_samochod");
        }
        $procedure = "Call czy_u_prac(:login)";
        $query = $this->db->prepare($procedure);
        $parameters = array(':login' => $login);
        $query->execute($parameters);
        if($query->fetch()->u_pracownika == 1) {
            array_push($returnArray, "u_pracownika");
        }
        $procedure = "Call czy_zaawansowane(:login)";
        $query = $this->db->prepare($procedure);
        $parameters = array(':login' => $login);
        $query->execute($parameters);
        if($query->fetch()->zaawansowane == 1) {
            array_push($returnArray, "zaawansowane");
        }
        $procedure = "Call czy_d_spotkanie(:login)";
        $query = $this->db->prepare($procedure);
        $parameters = array(':login' => $login);
        $query->execute($parameters);
        if($query->fetch()->d_spotkanie == 1) {
            array_push($returnArray, "d_spotkanie");
        }
        $procedure = "Call czy_u_spotkanie(:login)";
        $query = $this->db->prepare($procedure);
        $parameters = array(':login' => $login);
        $query->execute($parameters);
        if($query->fetch()->u_spotkanie == 1) {
            array_push($returnArray, "u_spotkanie");
        }
        $procedure = "Call czy_e_samochod(:login)";
        $query = $this->db->prepare($procedure);
        $parameters = array(':login' => $login);
        $query->execute($parameters);
        if($query->fetch()->e_samochod == 1) {
            array_push($returnArray, "e_samochod");
        }
        $procedure = "Call czy_s_samochod(:login)";
        $query = $this->db->prepare($procedure);
        $parameters = array(':login' => $login);
        $query->execute($parameters);
        if($query->fetch()->s_samochod == 1) {
            array_push($returnArray, "s_samochod");
        }
        $procedure = "Call czy_d_klienta(:login)";
        $query = $this->db->prepare($procedure);
        $parameters = array(':login' => $login);
        $query->execute($parameters);
        if($query->fetch()->d_klienta == 1) {
            array_push($returnArray, "d_klienta");
        }
        $procedure = "Call czy_u_klienta(:login)";
        $query = $this->db->prepare($procedure);
        $parameters = array(':login' => $login);
        $query->execute($parameters);
        if($query->fetch()->u_klienta == 1) {
            array_push($returnArray, "u_klienta");
        }

        return $returnArray;
    }

    public function d_klient_umowa($imie, $nazwisko, $pesel, $telefon, $miasto, 
    $adres, $numerDowoduOsobistego, $dowodDodanyPrzez) {
        $procedure = "Call d_klient_umowa(:imie, :nazwisko, :pesel, :telefon, :miasto, :adres, :numerDowoduOsobistego, :dowodDodanyPrzez)";
        $query = $this->db->prepare($procedure);
        $parameters = array(':imie' => $imie, ':nazwisko' => $nazwisko, ':pesel' => $pesel, ':telefon' => $telefon, 
            ':miasto' => $miasto, ':adres' => $adres, ':numerDowoduOsobistego' => $numerDowoduOsobistego,
             ':dowodDodanyPrzez' => $dowodDodanyPrzez);
        $query->execute($parameters);

    }

}
