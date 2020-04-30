<link rel="stylesheet" href="projet.css">
<div class="question">
    <h1>PARAMETRER VOTRE QUESTION</h1>
    <div class="liste">
        <form method="POST">
            <div class="quizzquestion">
                <h2>Question</h2>
                <input name="question" id="question"></textarea>
            </div>
            <div class="point">
                <h2>Nbre De Point</h2>
                <input type="number" min="1" name="point" id="nbre" style="width: 50px;height: 30;margin: 20px;">
            </div>
        <div>

            <div class="typereponse">
                <h2>Type De Reponse</h2>
                <select name="typedereponse" id="type" placeholder="Donner le type de reponse">
                    <option value=""><p>donner le type de reponse</p> </option>
                    <option value="choix_multiple">choix multiple</option>
                    <option value="choix_simple">choix simple</option>
                    <option value="reponse_texte">reponse texte</option>
                </select>
                <button type="button" hidden="" id="ajout" ></button>
                <label for="ajout" id="ajout">
                <img src="icone/ic-ajout-réponse.png" >
                </label>
            </div>
        </div>
            <div class="reponse" id="reponse">
               
            </div>

            <input type="submit" name="valider" value="Enregistrer" id="enregistrer">
        </form>
    </div>

</div>
<script type="text/javascript">
/* Variable Global i */
	var i = 0;
	/* fonction qui incremente le nombre de champs genere. */
	function increment(){
		i += 1; 
	}

	/* fonction qui reinitialise le nombre de champs genere. */
	function decrement(){
		i = 0; 
	}
/*definition du conteneur des reponses*/
	var reponse = document.getElementById("reponse");

	/*si on choisi ou on change d'option*/
	var a = document.getElementById('type');
	a.addEventListener("change",function(){
		reponse.innerHTML="";
		decrement();
		if (a.value!="") {
			NvelleReponse();
		}
	});
	/*si on clique sur le bouton + */
	var b = document.getElementById('ajout');
	b.addEventListener("click",function(){
			NvelleReponse()
	});

    	/*
	--------------------------------------------------------------------------
	Fonctions de generation de champs.
	--------------------------------------------------------------------------
	____________Inventaire des variables____________________

	=====   x est le type de question selectionne
	=====   valeur est le type de reponse
	=====   r est l'ensemble des elements d'une reponse
	=====   z est le label ou le nom de la reponse correspondante
	=====   y est le champ de texte de la reponse
	=====   retour permet de retour a la ligne 
	=====   error correspond aux messages d'erreur 
	=====   nb_reponse est le nombre de champ de reponse genere
	++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	*/
    function NvelleReponse(){
		var x = document.getElementById('type').value;
		if (x==""){
			alert("choisissez le type de reponse");
		}
		else{
			increment();
            var valeur = document.createElement("input");
			valeur.setAttribute("class","type_reponse");
			switch(x) {
				case "choix_simple":
				    valeur.setAttribute("type","radio");
				    valeur.setAttribute("name","radio");
				    break;
				case "reponse_texte":
				    valeur.setAttribute("type","radio");
				    valeur.setAttribute("name","radio");
				    valeur.setAttribute("checked","");
				    break;
				default:
				    valeur.setAttribute("type","checkbox");
				    valeur.setAttribute("name","check_list[]");
			}
			valeur.setAttribute("value", "reponse" + i);
            var r = document.createElement('span');//contenu ligne
            r.setAttribute("id", "id_" + i);
            var z = document.createElement('label');//titre
            z.setAttribute("for","reponse" + i);
			z.textContent="Reponse "+i+" ";
            var y = document.createElement("INPUT");//champ
            y.setAttribute("type", "text");
            y.setAttribute("name", "reponse" + i);
            var g = document.createElement("IMG");//bouton de suppression
			g.setAttribute("src", "./icone/ic-supprimer.png");
            g.setAttribute("onclick", "removeElement('reponse','id_" + i + "')");
            r.appendChild(z);
            r.appendChild(y);
            r.appendChild(valeur);
            if (x!='reponse_texte') {//pour ne pas pouvoir supprimer une reponse type texte
				r.appendChild(g);
			}
            r.innerHTML+="<br/>";
            if (x=='reponse_texte' && i>1) {
				return false;
			}
            reponse.appendChild(r);
        }
    }

    /*
	---------------------------------------------
	Foncion de suppression de reponse
	---------------------------------------------

	*/
	function removeElement(parentDiv, childDiv){
		if (childDiv == parentDiv){
			alert("Le parent ne peut pas etre supprime.");
		}
		else if (document.getElementById(childDiv)){
			var child = document.getElementById(childDiv);
			var parent = document.getElementById(parentDiv);
			parent.removeChild(child);
		}
		else{
			alert("ce div n'existe pas ou a ete supprime.");
			return false;
		}
	}

</script>

