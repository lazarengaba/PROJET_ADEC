$(document).ready(function() {

    $('.enregistrerNotes').click(function() {
		$.post('ajax/notes/enregistrerNotes.php', function(data) {
			$('.containerPersonalisee').html("<br /><br /><br /><center><img src='images/ajax-loader (3).gif' /></center>");
			$('.containerPersonalisee').html(data);
		});
    });

    $('.relevesNotes').click(function() {
		$.post('ajax/notes/relevesNotes.php', function(data) {
			$('.containerPersonalisee').html("<br /><br /><br /><center><img src='images/ajax-loader (3).gif' /></center>");
			$('.containerPersonalisee').html(data);
		});
    });
    $('.rechercherNotes').click(function() {
		$.post('ajax/notes/rechercherNotes.php', function(data) {
			$('.containerPersonalisee').html("<br /><br /><br /><center><img src='images/ajax-loader (3).gif' /></center>");
			$('.containerPersonalisee').html(data);
		});
    });
    $('.impressionNotes').click(function() {
		$.post('ajax/notes/impressionNotes.php', function(data) {
			$('.containerPersonalisee').html("<br /><br /><br /><center><img src='images/ajax-loader (3).gif' /></center>");
			$('.containerPersonalisee').html(data);
		});
    });
    $('.aideNotes').click(function() {
		$.post('ajax/notes/aideNotes.php', function(data) {
			$('.containerPersonalisee').html("<br /><br /><br /><center><img src='images/ajax-loader (3).gif' /></center>");
			$('.containerPersonalisee').html(data);
		});
    });
    $('.AutresNotes').click(function() {
		$.post('ajax/notes/AutresNotes.php', function(data) {
			$('.containerPersonalisee').html("<br /><br /><br /><center><img src='images/ajax-loader (3).gif' /></center>");
			$('.containerPersonalisee').html(data);
		});
    });
    
});