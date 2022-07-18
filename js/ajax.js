function dept(){
    var dpt=$('#departement').val();

    $('#listeNoms').val('');
    $('#code_postal').val('');
	$('#search_field').val('');

	$.ajax({
	  url: "/listeAnnuaire.php",
	  data: {dpt:dpt},
	  type: 'post',
	  dataType:'html',
	  success:function(data){
		$('#resultatRecherche').html(data);
	   }
  });
}

function code_postal(){
    var dpt=$('#code_postal').val();

    $('#departement').val('');
    $('#listeNoms').val('');
	$('#search_field').val('');


	$.ajax({
	  url: "/listeAnnuaire.php",
	  data: {dpt:dpt},
	  type: 'post',
	  dataType:'html',
	  success:function(data){
		$('#resultatRecherche').html(data);
	   }
  });
}

function region(select,nomname,reg){
	$('#departement').val('');
	$('#code_postal').val('');
	$('#listeNoms').val('');
	$('#search_field').val('');

	$.ajax({
	  url: "/listeAnnuaire.php",
	  data: {reg:reg},
	  type: 'post',
	  dataType:'html',
	  success:function(data){
		$('#resultatRecherche').html(data);
	   }
  });
}

function rechercheNom(){
	$('#departement').val('');
	$('#code_postal').val('');
	$('#search_field').val('');

    var name=$('#listeNoms').val();
	$.ajax({
	  url: "/listeAnnuaire.php",
	  data: {name:name},
	  type: 'post',
	  dataType:'html',
	  success:function(data){
		$('#resultatRecherche').html(data);
	   }
  });
}

function rechercheLibre(textToSearch){
	$('#departement').val('');
	$('#code_postal').val('');
	$('#listeNoms').val('');

	$.ajax({
		url: "/listeAnnuaire.php",
		data: {namelibre: textToSearch},
		type: 'post',
		dataType:'html',
		success:function(data){
			$('#resultatRecherche').html(data);
		}
	});
}

function infosLightBox(id){
	$.ajax({
	  url: "/infosAnnuaire.php",
	  data: {id:id},
	  type: 'post',
	  dataType:'html',
	  success:function(data){
	  	//if(window.location.href.toLowerCase().indexOf('chantier') > 0)
		{
			Swal.fire({
				html: data,
				showCloseButton: false,
				showConfirmButton: true,
				showCancelButton: false,
				confirmButtonColor: '#101B54',
			})
		}/*
	  	else
		{
			$('#lightbox-content').html(data);
			afficheLightbox();
		}*/
	   }
  });
}

function init_autocomplete()
{
	$('#search_field').autocomplete({
		source : listePersonnes,
		minLength: 2,
		select : function(event, ui)
		{
			rechercheLibre(ui.item.value);
		}
	});

	$(document).on('click', '.close-icon', function(){
		$('#search_field').val('');
		$('#resultatRecherche').html('');
	});
}
