<?php
require("loadpdo.php");

$req_categorie = $pdo->query("SELECT * FROM categorie"); //persistence
$categories = $req_categorie->fetchAll(); //persistence

$mysql_article = "SELECT * FROM article"; //persistence

if (isset($_GET["id_categorie"])) { //service
    $mysql_article .= " WHERE categorie=" . $_GET["id_categorie"]; //persistence
}

$req_articles = $pdo->prepare($mysql_article); //persistence
$req_articles->execute(); //persistence
$articles = $req_articles->fetchAll();  //persistence 

?>
<html> <!-- Présentation-->
<head>
    <link href="css/style.css" rel="stylesheet" />
</head>
<title></title>

<body>
    <nav>
        <span><a href="index.php"> Accueil</a></span> <!-- Présentation -->
        <?php foreach ($categories as $categorie) { ?>  <!-- Présentation -->
            <span class='nav-item'> <a href='?id_categorie=<?= $categorie['id'] ?>'> <?= $categorie['libelle'] ?> </a></span>
        <?php } ?>
    </nav>
    <div class="article">
        <?php if (empty($articles)) { ?> <!-- Présentation -->
            <p class="">Aucun enregistrement</p>
        <?php } else { ?>
            <?php foreach ($articles as $article) { ?>
                <div class='article-item'>
                    <b> <?= $article['titre'] ?> </b> : <?= $article['contenu'] ?>
                </div>
            <?php  } ?>
        <?php } ?>
    </div>
</body>

</html>