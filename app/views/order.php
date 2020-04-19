<?php
require '../app/controllers/homeController.php';
require 'layout/header.php';
$crsf_token = bin2hex(random_bytes(32));
$_SESSION['crsf_token'] = $crsf_token;
?>


<div class="container">
    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <div class="row">
            <div class="col-12">
                <h6 class="border-bottom border-gray pb-2 mb-0">Passer une commande</h6>
                <form class="mt-1" action="/gestion" method="post">
                    <div class="form-group">
                        <label for="commandeArticle">Article</label>
                        <select class="form-control" name="commandeArticle" id="commandeArticle">
                            <?php
                                foreach ($articles as $article)
                                {
                                    echo '<option value="'. $article['id'] .'">' . $article['nom'] . '</option>';
                                }
                            ?>
                        </select>
                        <label for="quantite">Quantité</label>
                        <input type="text" class="form-control" name="quantite" id="quantite" placeholder="17" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Commander</button><span> Prix: €</span>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
<?php
require 'layout/footer.html';
?>
