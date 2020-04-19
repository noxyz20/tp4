<?php


class Article
{

    private $nom;
    private $price;
    private $fournisseur;
    private $stock;

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
     * get all service table
     * @return array
     */
    public function getAllArticle(): array
    {
        $servname = 'localhost';
        $dbname = 'tp4';
        $user = 'root';
        $pass = '';

        try {
            $conn = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
        $req = $conn->prepare("SELECT * FROM article");
        $req->execute();
        return $req->fetchAll();
    }

    /**
     * Save the instance in bdd
     */
    public function save()
    {
        $servname = 'localhost';
        $dbname = 'tp4';
        $user = 'root';
        $pass = '';

        try {
            $conn = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
        $req = $conn->prepare("INSERT INTO article (nom, prix_unit, id_fournisseur, stock) VALUES (:nom, :prix_unit, :id_fournisseur, :stock)");
        $req->bindParam(':nom', $this->name);
        $req->bindParam(':prix_unit', $this->price);
        $req->bindParam(':id_fournisseur', $this->fournisseur);
        $req->bindParam(':stock', $this->stock);
        $req->execute();
    }
}
