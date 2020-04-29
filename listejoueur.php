<?php
const NPARPAGE=5;

require_once('fonctions.php');
if(!isset($_SESSION['joueur'])){
    header('location:connexion.php');
}else{
    $joueurConnecte = $_SESSION['joueur'];
}
$utilisateurs = recupJson('utilisateur');
$joueurs = $scores = [];
foreach($utilisateurs as $cle => $valeur){
    if($valeur['profil']=='joueur')
    {
        $joueurs[] = $valeur;
        $scores[] = $valeur['score'];
    }
}
arsort($scores);
$joueursDecroissant = [];
foreach($scores as $cle => $score){
    $joueursDecroissant[] = $joueurs[$cle];
}
if(isset($_GET['page'])){
    $page=$_GET['page'];
}
else{
    $page=1;
}

$min = ($page-1)*NPARPAGE; $max = $min+NPARPAGE;
if ($page<1) 
{
    $page=1;
    header('location:listejoueur.php?page=1');
}

?>
<style>
table{
    width:100%;
    font-weight:bold
}
th{
    text-align:left;
    font-style:italic;
    font-size:x-large;
}
th,td{
    padding:.5em
}
</style>
<link rel="stylesheet" href="projet.css">
<h2>Liste Des Joueur Par Score</h2>
<div class="listej">
<table>
    <tr>
        <th>NOM</th>
        <th>Prénom</th>
        <th>Score</th>
    </tr>
    <?php
        for($i=$min; $i<$max; $i++){
            ?>
            <tr>
                <td><?= strtoupper($joueursDecroissant[$i]['nom']) ?></td>
                <td><?= ucfirst($joueursDecroissant[$i]['prenom']) ?></td>
                <td><?= $joueursDecroissant[$i]['score'] ?> pts</td>
            </tr>
            <?php
            }
    ?>
</table>
</div>
<form method="POST" id="suiv">
    <a href="listejoueur.php?page=<?= ($page-1) ?>">Précédent</a>
    <a href="listejoueur.php?page=<?= ($page+1) ?>">Suivant</a>
</form>
