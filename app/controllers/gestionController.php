<?php
require '../app/models/Fournisseur.php';
require '../app/models/Service.php';
require '../app/models/Article.php';

class gestionController
{
    /**
     * return view with data
     */
    public function index(){
        $title = 'Gestion';
        $fournisseurs = new Fournisseur();
        $fournisseurs = $fournisseurs->getAllFournisseur();
        $services = new Service();
        $services = $services->getAllService();
        $articles = new Article();
        $articles = $articles->getAllArticle();
        require '../app/views/gestion.php';
    }

    /**
     * request the post function
     * @param $name
     * @param $phone
     * @param $address
     */
    public function fournisseur_request($name, $phone, $address){
        $fournisseur = new Fournisseur();
        $fournisseur->__set('name', $name);
        $fournisseur->__set('phone', $phone);
        $fournisseur->__set('address', $address);
        $fournisseur->save();
    }

    /**
     * request the post function
     * @param $name
     * @param $code
     */
    public function service_request($name, $code){
        $service = new Service();
        $service->__set('name', $name);
        $service->__set('code', $code);
        $service->save();
    }

    /**
     * request the post function
     * @param $name
     * @param $code
     */
    public function article_request($name, $price, $fournisseur){
        $service = new Article();
        $service->__set('name', $name);
        $service->__set('price', $price);
        $service->__set('fournisseur', $fournisseur);
        $service->__set('stock', 0);
        $service->save();
    }

}
