$(document).ready(function() {

    $('.afficherMatieres').click(function() {
		$.post('ajax/matieres/afficherMatieres.php', function(data) {
			$('.containerPersonalisee').html("<br /><br /><br /><center><img src='images/ajax-loader (3).gif' /></center>");
			$('.containerPersonalisee').html(data);
		});
    });

    $('.ajouterMatieres').click(function() {
		$.post('ajax/matieres/ajouterMatieres.php', function(data) {
			$('.containerPersonalisee').html("<br /><br /><br /><center><img src='images/ajax-loader (3).gif' /></center>");
			$('.containerPersonalisee').html(data);
		});
    });
    $('.modifierMatieres').click(function() {
		$.post('ajax/matieres/modifierMatieres.php', function(data) {
			$('.containerPersonalisee').html("<br /><br /><br /><center><img src='images/ajax-loader (3).gif' /></center>");
			$('.containerPersonalisee').html(data);
		});
    });
    $('.suppprimerMatieres').click(function() {
		$.post('ajax/matieres/suppprimerMatieres.php', function(data) {
			$('.containerPersonalisee').html("<br /><br /><br /><center><img src='images/ajax-loader (3).gif' /></center>");
			$('.containerPersonalisee').html(data);
		});
    });
    $('.aideMatieres').click(function() {
		$.post('ajax/matieres/aideMatieres.php', function(data) {
			$('.containerPersonalisee').html("<br /><br /><br /><center><img src='images/ajax-loader (3).gif' /></center>");
			$('.containerPersonalisee').html(data);
		});
    });
    $('.autresMatieres').click(function() {
		$.post('ajax/matieres/autresMatieres.php', function(data) {
			$('.containerPersonalisee').html("<br /><br /><br /><center><img src='images/ajax-loader (3).gif' /></center>");
			$('.containerPersonalisee').html(data);
		});
    });
    
});