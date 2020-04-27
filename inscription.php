<?php
require_once('fonctions.php');
$utilisateurs = recupJson('utilisateur');

$error = null;
$prenom = null;
$nom = null;
$login = null;
$password= null;
$cpassword= null;
if (isset($_POST['valider'])) 
    {
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $login = $_POST['login'];
        $password= $_POST['password'];
        $cpassword= $_POST['cpassword'];
        $img = $_FILES['avatar'];   
        if(!empty($prenom && $nom && $login && $password && $cpassword) && isset($img))
        {
            $exist = false;
            for($i=0; isset($utilisateurs[$i]); $i++)
            {
                if($login == $utilisateurs[$i]['login']){
                    $exist = true;
                    break;
                }
            }
            if(!$exist){
                if ($cpassword==$password) 
                {
                    if ($img['error']==0) {
                        $type=explode('/',$img['type'])[0];
                        $extension=explode('/',$img['type'])[1];
                        if ($type=='image' && in_array($extension, ['jpeg','png'])) 
                        {
                            $avatar=$login.'.'.$extension; //création du nom du fichier
                            $upload=move_uploaded_file($img['tmp_name'],'avatar/'.$avatar);
                            if ($upload) {
                                if(isset($_SESSION['admin']))
                                {
                                    $profil = 'admin';
                                }
                                else{
                                    $profil = 'joueur';
                                }
                                $utilisateurs[]=[
                                    'prenom' => $prenom,
                                    'nom' => $nom,
                                    'login' => $login,
                                    'password' => $password,
                                    'avatar' => $avatar,
                                    'profil' => $profil
                                ];
                                $users = json_encode($utilisateurs,JSON_PRETTY_PRINT);
                                file_put_contents('utilisateur.json',$users);
                                if($profil=='admin'){
                                    header('location:admin.php');
                                }else{
                                    header('location:connexion.php');
                                }
                            }
                            else {
                                $error="erreur lors de la soumission de l'avatar";
                            }
                        }
                        else {
                            $error = "L'avatar doit être une image d'extension JPEG ou PNG";
                        }
                    }
                    else{
                        $error='erreur sur le fichier';
                    }
                }
                else {
                    $error='les deux mots passe doivent être identiques';
                }
            }else{
                $error = "Login éxistant";
            }
        }
        else{
            $error = 'Tous les champs doivent être rempli.';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="projet.css">
</head>
<body>

    <div class="ensemble"></div>
    <div id="inscription">
        <form method="POST" enctype="multipart/form-data"> 
            <h2>S'INSCRIRE</h2>
            <h4>Pour tester votre niveeau de culture générale</h4>
            <hr>
            <div class="inscription">
            <p>Prénom</p>
            <input value="<?= $prenom ?>"  name="prenom">
            </div>
            <div class="inscription">
            <p>Nom</p>
            <input value="<?= $nom ?>" name="nom">
            </div>
            <div class="inscription">
            <p>login</p>            
            <input value="<?= $login ?>"  name="login">
            </div>
            <div class="inscription">
            <p>Password</p>
            <input type="password" name="password">
            </div>
            <div class="inscription">
            <p>confirmer password</p>
            
            <input type="password" name="cpassword">
            </div>
            <h3>Avatar</h3>
            <div class="choisir">
            <input type="file" onchange="previsualiser(this)" name="avatar">
            </div>
            <div class="compte">
            <input type="submit" name="valider" value="créer compte">
            </div>
            <p style="color:red"><?= $error ?></p>
        </form>
        <div class="avatar">
            <img src="" alt="" id="avatar">
            <H3>Avatar du Joueur</H3>
        </div>
    </div>
</body>
<script>
    function previsualiser(input)
    {
        if(input.files && input.files[0])
        {
            var image = new FileReader();
            image.onload = function(e){
                document.getElementById('avatar').src = e.target.result;
            }
            image.readAsDataURL(input.files[0]);
        }
    }
</script>
</html>