<?php

class Fournisseur
{
    private $name;
    private $phone;
    private $address;

    public function __construct()
    {
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    /**
     * get all fournisseur table
     * @return array
     */
    public function getAllFournisseur() : array {
        $servname = 'localhost';
        $dbname = 'tp4';
        $user = 'root';
        $pass = '';

        try{
            $conn = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
        }
        $req = $conn->prepare("SELECT * FROM fournisseur");
        $req->execute();
        return $req->fetchAll();
    }

    /**
     * Save the instance in bdd
     */
    public function save(){
        $servname = 'localhost';
        $dbname = 'tp4';
        $user = 'root';
        $pass = '';

        try{
            $conn = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
        }
        $req = $conn->prepare("INSERT INTO fournisseur (nom, tel, adresse) VALUES (:nom, :tel, :adresse)");
        $req->bindParam(':nom', $this->name);
        $req->bindParam(':tel', $this->phone);
        $req->bindParam(':adresse', $this->address);
        $req->execute();
    }
}
