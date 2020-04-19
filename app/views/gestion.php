<?php
require '../app/controllers/homeController.php';
require 'layout/header.php';
$crsf_token = bin2hex(random_bytes(32));
$_SESSION['crsf_token'] = $crsf_token;
?>


<div class="container">
    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <div class="row">
            <div class="col-4">
                <h6 class="border-bottom border-gray pb-2 mb-0">Ajouter un service</h6>
                <form class="mt-1" action="/gestion" method="post">
                    <div class="form-group">
                        <input type="hidden" name="crsf_token" value="<?= $crsf_token ?>">
                        <label for="nService">Nom du service</label>
                        <input type="text" class="form-control" name="nService" id="nService" placeholder="Comptabilité..." required>
                        <label for="idService">Code du service</label>
                        <input type="text" class="form-control" name="idService" id="idService" placeholder="COMPTA" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Enregister</button>
                    </div>
                </form>
                <h6 class="border-bottom border-gray pb-2 mb-0">Les services</h6>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Code</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach ($services as $service)
                        {
                            echo '<tr>';
                            echo '<th scope="row">' . $service['id'] . '</th>';
                            echo '<td>' . $service['libelle'] . '</td>';
                            echo '<td>' . $service['COD'] . '</td>';
                        }
                    ?>
                    </tbody>
                </table>
                <h6 class="border-bottom border-gray mt-4 pb-2 mb-0">Attribution d'article</h6>
                <form class="mt-1" action="/gestion" method="post">
                    <div class="form-group">
                        <label for="fournisseur">Article</label>
                        <select class="form-control" name="fournisseurArticle" id="fournisseur">
                            <?php
                            foreach ($articles as $article)
                            {
                                echo '<option value="'. $article['id'] .'">' . $article['nom'] . '</option>';
                            }
                            ?>
                        </select>
                        <label for="fournisseur">Service</label>
                        <select class="form-control" name="fournisseurArticle" id="fournisseur">
                            <?php
                            foreach ($services as $service)
                            {
                                echo '<option value="'. $service['COD'] .'">' . $service['libelle'] . '</option>';
                            }
                            ?>
                        </select>
                        <label for="idService">Nombre de produit</label>
                        <input type="text" class="form-control" name="idService" id="idService" placeholder="5" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Atribuer</button>
                    </div>
                </form>
            </div>
            <div class="col-8">
                <h6 class="border-bottom border-gray pb-2 mb-0">Ajouter un fournisseurs</h6>
                <form class="mt-1" action="/gestion" method="post">
                    <div class="form-group">
                        <input type="hidden" name="crsf_token" value="<?= $crsf_token ?>">
                        <label for="nFourni">Nom du fournisseur</label>
                        <input type="text" class="form-control" name="nFourni" id="nFourni" placeholder="Housni le grossite" required>
                        <label for="telFourni">Numéro de téléphone du fournisseur</label>
                        <input type="text" class="form-control" name="telFourni" id="telFourni" placeholder="17" required>
                        <label for="adrFrouni">Adresse du fournisseur</label>
                        <input type="text" class="form-control" name="adrFourni" id="adrFrouni" placeholder="Lupinu" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Enregister</button>
                    </div>
                </form>
                <h6 class="border-bottom border-gray pb-2 mb-0">Les fournisseurs</h6>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Numéro de téléphone</th>
                        <th scope="col">Adresse</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach ($fournisseurs as $fournisseur)
                        {
                            echo '<tr>';
                            echo '<th scope="row">' . $fournisseur['id'] . '</th>';
                            echo '<td>' . $fournisseur['nom'] . '</td>';
                            echo '<td>' . $fournisseur['tel'] . '</td>';
                            echo '<td>' . $fournisseur['adresse'] . '</td>';
                        }
                    ?>
                    </tbody>
                </table>
                <hr class="my-3">
                <h6 class="border-bottom border-gray pb-2 mb-0">Ajouter un Article</h6>
                <form class="mt-1" action="/gestion" method="post">
                    <div class="form-group">
                        <input type="hidden" name="crsf_token" value="<?= $crsf_token ?>">
                        <label for="nFourni">Nom de l'article</label>
                        <input type="text" class="form-control" name="nArticle" id="nArticle" placeholder="AK-47" required>
                        <label for="telFourni">Prix</label>
                        <input type="text" class="form-control" name="prixArticle" id="prixArticle" placeholder="50€" required>
                        <div class="form-group">
                            <label for="fournisseur">Fournisseur</label>
                            <select class="form-control" name="fournisseurArticle" id="fournisseur">
                                <?php
                                    foreach ($fournisseurs as $fournisseur)
                                    {
                                         echo '<option value="'. $fournisseur['id'] .'">' . $fournisseur['nom'] . '</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Enregister</button>
                    </div>
                </form>
                <h6 class="border-bottom border-gray pb-2 mb-0">Les article</h6>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">prix</th>
                        <th scope="col">Fournisseur</th>
                        <th scope="col">Stock</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach ($articles as $article) {
                            echo '<tr>';
                            echo '<th scope="row">' . $article['id'] . '</th>';
                            echo '<td>' . $article['nom'] . '</td>';
                            echo '<td>' . $article['prix_unit'] . '€</td>';
                            echo '<td>';
                            foreach ($fournisseurs as $fournisseur)
                                if($fournisseur['id'] == $article['id_fournisseur'])
                                    echo $fournisseur['nom'];
                            echo '</td>';
                            echo '<td>' . $article['stock'] . '</td>';
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<script src="js/gestion.js"></script>
<?php
require 'layout/footer.html';
?>
