    <?php
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
    if(isset($_POST['deconnexion']))
        {
            header('location:connexion.php');
        }
?>
<link rel="stylesheet" href="projet.css">
<div class="plan">
    <div class="plan-header">
        <div class="titre">
            <div class="avatar1">
                <img src="" alt="" id="avatar1" style="min-width: 4rem;min-height: 4rem; border-radius: 100%; border: solid 1px white; float: left; margin-left:-350px" >
            </div>
            <h3 style="color:white ;float:left; margin-right:200px">BIENVENUE SUR LA PLATEFORME DE JEU DE QUIZZ
                    JOUER ET TESTER VOTRE NIVEAU DE CULTURE GÉNÉRALE</h3>
        </div>
            <div class="deconnexion">
        <form action="" method="POST">
            <input type="submit" name ="deconnexion" value="deconnexion">
            </div>
        </form>
    </div>
    <div class="question">
                <div class="quizz">
                    <div class="result">
                        <input type="text" name="result">
                    </div>
                <div class="precedent">
                    <input type="submit" name="precedent" value="precedent">
                </div>
                <div class="suivant">
                    <input type="submit" name="suivant" valu="suivant">
                </div>
                </div>
                <div class="scor">
                    <nav>
                        <a href="niveau.php?top">Top Score</a>
                        <a href="niveau.php?myscore">Mon meilleur score</a>
                    </nav>
                    <div id="">
                        <table>
                        <?php
                        if(isset($_GET['top']))
                        {
                            $n=0;
                            foreach($scores as $cle => $score){
                            ?>
                            <tr>
                                <th><?= $joueurs[$cle]['prenom'].' '.$joueurs[$cle]['nom'] ?></th>
                                <td><?= $score ?> pts</td>
                            </tr>
                            <?php
                            $n++;
                            if($n==5){
                            break;
                            }
                            }
                        }else{
                            ?>
                            <tr>
                                <th><?= $joueurConnecte['prenom'].' '.$joueurConnecte['nom'] ?></th>
                                <td><?= $joueurConnecte['score'] ?> pts</td>
                            </tr>
                            <?php
                        }
                        ?>
                        </table>
                    </div>
                </div>
     </div>
    
</div>   