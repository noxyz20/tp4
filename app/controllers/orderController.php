<?php
require '../app/models/Article.php';

class orderController
{
    public function index(){
        $title = 'Commander';
        $articles = new Article();
        $articles = $articles->getAllArticle();
        require '../app/views/order.php';
    }
}
