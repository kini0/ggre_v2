// JavaScript Document
function deleteDoc(id,type,nom_fichier) {
	if(confirm("Êtes vous sûr de supprimer ce document ?"))
	{
		// id = id de l'article, q = quantite, prix = prix à l'unité
		var url = "functions/ajax.php?mode=delete&id_type="+id+"&type="+type+"&nom_fichier="+nom_fichier;
		alert(url);
		var req = new XMLHttpRequest();
		//Lancement de la requête
		req.open("GET",url,false); 
		req.send(null);
		if(type=="news") document.getElementById("doc").innerHTML = "";
		if(type=="observatoire") document.getElementById("doc").innerHTML = "";
		if(type=="trim1") document.getElementById("doc_trim1").innerHTML = "";
		if(type=="trim2") document.getElementById("doc_trim2").innerHTML = "";
		if(type=="trim3") document.getElementById("doc_trim3").innerHTML = "";
		if(type=="trim4") document.getElementById("doc_trim4").innerHTML = "";
		alert("Le document a bien été supprimée!");
	}
}

// Ouverture en pop-up - id = id du membre
function newpopup(id) {
	var largeur = 550;
	var hauteur = 440;
	var top=(screen.height-hauteur)/2; 
	var left=(screen.width-largeur)/2;
	var page = "edit_membre.php?id_membre="+id+"&popup=1#form-offre";
	window.open(page,"","top="+top+",left="+left+",width="+largeur+",height="+hauteur+",menubar=no,scrollbars=no,statusbar=no"); 
}

// Fermer la fenêtre pop et rafraîchir la fenêtre principale
function closepopup(){
	window.opener.location.reload();
    window.close();
}