$(document).ready(function() {

    $('.afficherEnseignants').click(function() {
		$.post('ajax/enseignants/afficherEnseignants.php', function(data) {
			$('.containerPersonalisee').html("<br /><br /><br /><center><img src='images/ajax-loader (3).gif' /></center>");
			$('.containerPersonalisee').html(data);
		});
    });

    $('.ajouterEnseignants').click(function() {
		$.post('ajax/enseignants/ajouterEnseignants.php', function(data) {
			$('.containerPersonalisee').html("<br /><br /><br /><center><img src='images/ajax-loader (3).gif' /></center>");
			$('.containerPersonalisee').html(data);
		});
    });
    $('.modifierEnseignants').click(function() {
		$.post('ajax/enseignants/modifierEnseignants.php', function(data) {
			$('.containerPersonalisee').html("<br /><br /><br /><center><img src='images/ajax-loader (3).gif' /></center>");
			$('.containerPersonalisee').html(data);
		});
    });
    $('.suppprimerEnseignants').click(function() {
		$.post('ajax/enseignants/suppprimerEnseignants.php', function(data) {
			$('.containerPersonalisee').html("<br /><br /><br /><center><img src='images/ajax-loader (3).gif' /></center>");
			$('.containerPersonalisee').html(data);
		});
    });
    $('.aideEnseignants').click(function() {
		$.post('ajax/enseignants/aideEnseignants.php', function(data) {
			$('.containerPersonalisee').html("<br /><br /><br /><center><img src='images/ajax-loader (3).gif' /></center>");
			$('.containerPersonalisee').html(data);
		});
    });
    $('.autresEnseignants').click(function() {
		$.post('ajax/enseignants/autresEnseignants.php', function(data) {
			$('.containerPersonalisee').html("<br /><br /><br /><center><img src='images/ajax-loader (3).gif' /></center>");
			$('.containerPersonalisee').html(data);
		});
    });
    
});