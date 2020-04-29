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
    function NvelleReponse(){
		var x = document.getElementById('type').value;
		if (x==""){
			alert("choisissez le type de reponse");
		}
		else{
			increment();
            var r = document.createElement('span');
            var y = document.createElement("INPUT");
            y.setAttribute("type", "text");
            r.appendChild(y);
            r.innerHTML+="<br/>";
            reponse.appendChild(r);
        }
    }

</script>

